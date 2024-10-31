<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\TLD;
use App\Models\HostingPlan;
use App\Models\RegularMainSpec;
use App\Models\OrderDomainDetail;
use App\Models\Order;
use App\Models\BillingAddress;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Price;
use App\Models\User;
use App\Models\Role;
use App\Models\Addon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request): View
    {
        $tld_name = $tld_name ?? $request->query('tld_name');
        $tlds = TLD::all();
        $categories = Tld::select('category')->distinct()->get();

        $hostingPlanId = $request->query('hosting_plan_id');
        $specs = [];

        // Generate order_id (bisa disesuaikan dengan logika bisnis Anda)
        $order_id = uniqid('ORD-');  // Contoh generate order_id sederhana

        // Ambil data TLD berdasarkan tld_name
        $selectedTld = TLD::where('tld_name', $tld_name)->first();

        // Ambil domain_option_id dari TLD yang dipilih
        $domain_option_id = $selectedTld ? $selectedTld->id : null;

        $productInfo = $request->query('product_info');
        $prices = Price::where('hosting_plans_id', $hostingPlanId)->get();
        $addons = Addon::where('order_id', null)->get();

        if ($hostingPlanId) {
            // Load hosting plan with its relationships
            $hostingPlan = HostingPlan::with(['prices'])->find($hostingPlanId);
            $regularSpec = RegularMainSpec::where('hosting_plans_id', $hostingPlanId)->first();

            if ($hostingPlan && $regularSpec) {
                $specs = [
                    ['value' => $regularSpec->storage . ' GB SSD Storage'],
                    ['value' => $regularSpec->RAM . ' RAM'],
                    ['value' => $regularSpec->CPU . ' Core CPU'],
                    ['value' => ($regularSpec->max_domain == -1 ? 'Unlimited' : $regularSpec->max_domain) . ' Domain'],
                    ['value' => ($regularSpec->ssl ? 'Free SSL' : 'SSL')]
                ];
            } else {
                $specs = [
                    ['value' => $hostingPlan->storage . ' GB SSD Storage'],
                    ['value' => $hostingPlan->RAM . ' RAM'],
                    ['value' => $hostingPlan->CPU . ' Core CPU'],
                    ['value' => ($hostingPlan->max_domain == -1 ? 'Unlimited' : $hostingPlan->max_domain) . ' Domain'],
                    ['value' => ($hostingPlan->ssl ? 'Free SSL' : 'SSL')]
                ];
            }
        }

        if ($request->query('plan') === 'custom' && session()->has('custom_plan')) {
            $customPlan = session('custom_plan');
            $specs = [
                ['value' => $customPlan['specs']['storage'] . ' GB SSD Storage'],
                ['value' => $customPlan['specs']['ram'] . ' GB RAM'],
                ['value' => $customPlan['specs']['cpu'] . ' Core CPU'],
                ['value' => 'Unlimited Domain'],
                ['value' => 'Free SSL']
            ];

            $productInfo = 'Custom Hosting Plan';
            $price = $customPlan['total_price'];
            $order_id = $customPlan['order_id'];
        }

        if (empty($specs)) {
            $specs = [
                ['value' => '2 GB SSD Storage'],
                ['value' => '2 RAM'],
                ['value' => '1 Core CPU'],
                ['value' => 'Unlimited Domain'],
                ['value' => 'Free SSL']
            ];
        }

        // Hitung price berdasarkan TLD atau logika bisnis lainnya
        $price = $selectedTld ? $selectedTld->price : 0;

        return view('app.hosting-plans.checkout.index', [
            'tld_name' => $tld_name,
            'tlds' => $tlds,
            'categories' => $categories,
            'specs' => $specs,
            'order_id' => $order_id,
            'domain_option_id' => $domain_option_id,
            'price' => $price,
            'selectedTld' => $selectedTld,
            'product_info' => $productInfo,
            'prices' => $prices,
            'addons' => $addons,
        ]);
    }

    // Tambahkan method baru untuk menyimpan detail domain
    public function saveDomainDetails(Request $request)
    {
        try {
            DB::beginTransaction();

            // Log incoming data
            Log::info('Data domain yang diterima:', $request->all());

            // Validate the request
            $validatedData = $request->validate([
                'order_id' => 'required|string',
                'domain_name' => 'required|string',
                'price' => 'required|numeric',
                'dns_management' => 'required|in:yes,no',
                'whois' => 'required|in:yes,no',
                'domain_option_id' => 'nullable|numeric'
            ]);

            // Check if order exists
            $existingOrder = Order::where('order_id', $request->order_id)->first();

            if ($existingOrder) {
                // Update existing order price
                $existingOrder->update([
                    'total_price' => $request->price
                ]);

                // Update or create domain details
                $domainDetail = OrderDomainDetail::updateOrCreate(
                    ['order_id' => $request->order_id],
                    [
                        'domain_name' => $request->domain_name,
                        'dns_management' => $request->dns_management === 'yes',
                        'whois' => $request->whois === 'yes',
                        'price' => (int)$request->price,
                        'domain_option_id' => $request->domain_option_id,
                        'active_date' => now(),
                        'expired_date' => now()->addYear()
                    ]
                );

                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => 'Detail domain berhasil diperbarui',
                    'data' => [
                        'order' => $existingOrder->fresh(),
                        'domain_detail' => $domainDetail
                    ]
                ]);
            }

            // If no existing order, create new billing address and order
            $billingAddress = BillingAddress::create([
                'street_address_1' => 'Default Address',
                'city' => 'Default City',
                'state' => 'Default State',
                'country' => 'ID',
                'post_code' => '12345',
                'company_name' => 'Default Company'  // Optional
            ]);

            // Create new order
            $order = Order::create([
                'order_id' => $request->order_id,
                'status' => 'pending',
                'total_price' => (int)$request->price,
                'payment_method' => 'pending',
                'date_created' => now(),
                'billing_address_id' => $billingAddress->billing_id
            ]);

            // Create new domain detail
            $domainDetail = OrderDomainDetail::create([
                'order_id' => $request->order_id,
                'domain_name' => $request->domain_name,
                'dns_management' => $request->dns_management === 'yes',
                'whois' => $request->whois === 'yes',
                'price' => (int)$request->price,
                'domain_option_id' => $request->domain_option_id,
                'active_date' => now(),
                'expired_date' => now()->addYear()
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Detail domain berhasil disimpan',
                'data' => [
                    'order' => $order->fresh(),
                    'domain_detail' => $domainDetail
                ]
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error saat menyimpan detail domain: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());

            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan detail domain: ' . $e->getMessage()
            ], 500);
        }
    }

    // Method baru untuk update billing address nanti di step 5
    public function saveBillingAddress(Request $request)
    {
        try {
            $billingData = $request->validate([
                'street_address_1' => 'required|string',
                'street_address_2' => 'nullable|string',
                'city' => 'required|string',
                'state' => 'required|string',
                'country' => 'required|string',
                'post_code' => 'required|string',
                'company_name' => 'nullable|string'
            ]);

            // Buat atau update billing address
            $billingAddress = BillingAddress::create($billingData);

            return response()->json([
                'success' => true,
                'message' => 'Billing address saved successfully',
                'data' => $billingAddress
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to save billing address: ' . $e->getMessage()
            ], 500);
        }
    }

    public function saveCustomPlan(Request $request)
    {
        try {
            DB::beginTransaction();

            // Generate order ID
            $orderId = 'CUSTOM-' . uniqid();

            // Check if order already exists
            while (Order::where('order_id', $orderId)->exists()) {
                $orderId = 'CUSTOM-' . uniqid();
            }

            // Create temporary billing address
            $billingAddress = BillingAddress::create([
                'street_address_1' => 'Default Address',
                'city' => 'Default City',
                'state' => 'Default State',
                'country' => 'ID',
                'post_code' => '12345',
                'company_name' => 'Default Company'  // Optional
            ]);

            // Create order
            $order = Order::create([
                'order_id' => $orderId,
                'status' => 'pending',
                'total_price' => $request->total_price,
                'payment_method' => 'pending',
                'date_created' => now(),
                'billing_address_id' => $billingAddress->billing_id
            ]);

            // Store custom plan data in session
            session([
                'custom_plan' => [
                    'order_id' => $orderId,
                    'specs' => [
                        'ram' => $request->specs['ram'],
                        'cpu' => $request->specs['cpu'],
                        'storage' => $request->specs['storage']
                    ],
                    'details' => [
                        'ram_price' => $request->specs['details']['ram_price'],
                        'cpu_price' => $request->specs['details']['cpu_price'],
                        'storage_price' => $request->specs['details']['storage_price']
                    ],
                    'total_price' => $request->total_price
                ]
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Custom plan saved successfully',
                'data' => [
                    'order_id' => $orderId,
                    'redirect_url' => url('/checkout') . '?plan=custom&order_id=' . $orderId
                ]
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error saving custom plan: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());

            return response()->json([
                'success' => false,
                'message' => 'Failed to save custom plan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function saveClientData(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'required|string',
        ]);

        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'phone' => $validatedData['phone'],
            ]);

            $role = Role::where('name', 'client')->first();
            if ($role) {
                $user->roles()->attach($role);
            }

            // Login user setelah registrasi
            Auth::login($user);

            DB::commit();

            return redirect('/checkout');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data');
        }
    }

    public function saveAddons(Request $request)
    {
        Log::info('Received addon request:', [
            'all_data' => $request->all(),
            'order_id' => $request->input('order_id'),
            'daily_backup' => $request->input('daily_backup'),
            'email_protection' => $request->input('email_protection'),
            'price' => $request->input('price'),
        ]);

        try {
            DB::beginTransaction();

            // Validasi apakah order ada
            $order = Order::where('order_id', $request->input('order_id'))->first();
            if (!$order) {
                Log::error('Order not found:', ['order_id' => $request->input('order_id')]);
                throw new \Exception('Order not found');
            }

            // Update atau buat addon
            $addon = Addon::updateOrCreate(
                ['order_id' => $request->input('order_id')],
                [
                    'daily_backup' => $request->boolean('daily_backup'),
                    'email_protection' => $request->boolean('email_protection'),
                    'price' => $request->input('price', 0),
                    'active_date' => now(),
                    'expired_date' => now()->addYear()
                ]
            );

            DB::commit();

            Log::info('Addon saved successfully:', ['addon' => $addon->toArray()]);

            return response()->json([
                'success' => true,
                'message' => 'Addons saved successfully',
                'data' => $addon
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to save addon:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to save addons'
            ], 500);
        }
    }
}
