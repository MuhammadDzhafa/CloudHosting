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
        $order_id = uniqid('ORD-'); // Generate order_id

        // Ambil data TLD berdasarkan tld_name
        $selectedTld = TLD::where('tld_name', $tld_name)->first();
        $domain_option_id = $selectedTld ? $selectedTld->id : null;

        $productInfo = $request->query('product_info');
        $prices = Price::where('hosting_plans_id', $hostingPlanId)->get();
        $addons = Addon::where('domain_order_id', null)->get();

        if ($hostingPlanId) {
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

        // Set spesifikasi default jika tidak ada spesifikasi yang diatur
        if (empty($specs)) {
            $specs = [
                ['value' => '2 GB SSD Storage'],
                ['value' => '2 GB RAM'],
                ['value' => '1 Core CPU'],
                ['value' => 'Unlimited Domain'],
                ['value' => 'Free SSL']
            ];
        }

        // Hitung harga berdasarkan TLD atau logika lainnya
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

            // Dapatkan user_id jika ada
            $userId = auth()->id(); // Ini bisa null jika pengguna tidak terautentikasi

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

            $orderData = [
                'order_id' => $request->order_id,
                'status' => 'pending',
                'total_price' => (int)$request->price,
                'payment_method' => 'pending',
                'date_created' => now(),
            ];

            // Hanya masukkan user_id jika ada
            if ($userId) {
                $orderData['user_id'] = $userId; // Ini akan menambahkan user_id jika pengguna terautentikasi
            }

            // Buat order baru
            $order = Order::create($orderData);


            // Buat detail domain baru
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
        // Log request untuk debugging
        Log::info('Received billing address request:', [
            'data' => $request->all()
        ]);

        // Tambahkan user_id ke request
        $request->merge(['user_id' => auth()->id()]);

        // Validasi input
        $billingData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'street_address_1' => 'required|string|max:255',
            'street_address_2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string',
            'post_code' => 'required|string|max:20',
            'company_name' => 'nullable|string|max:255'
        ]);

        DB::beginTransaction();

        // Gunakan updateOrCreate untuk menghindari duplikasi
        $billingAddress = BillingAddress::updateOrCreate(
            ['user_id' => auth()->id()], // Kondisi pencarian
            $billingData // Data yang akan di-update atau create
        );

        DB::commit();

        Log::info('Billing address saved successfully:', [
            'billing_address' => $billingAddress->toArray()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Billing address saved successfully',
            'data' => $billingAddress
        ]);

    } catch (ValidationException $e) {
        DB::rollBack();
        Log::error('Validation failed:', [
            'errors' => $e->errors()
        ]);
        return response()->json([
            'success' => false,
            'message' => 'Validation failed',
            'errors' => $e->errors()
        ], 422);

    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Failed to save billing address:', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);

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
        // Log request data sebelum validasi
        Log::info('Raw addon request:', [
            'data' => $request->all()
        ]);

        // Validasi input dengan aturan yang lebih spesifik
        $validated = $request->validate([
            'order_id' => 'required|string',
            'daily_backup' => 'required|in:0,1,true,false',  // Terima berbagai format boolean
            'email_protection' => 'required|in:0,1,true,false',  // Terima berbagai format boolean
            'price' => 'required|integer|min:0',
            'domain_order_id' => 'nullable|string|exists:order_domain_details,domain_order_id',
        ]);

        try {
            DB::beginTransaction();

            // Konversi nilai boolean secara eksplisit
            $addon = Addon::updateOrCreate(
                ['domain_order_id' => $request->input('domain_order_id')],
                [
                    'daily_backup' => filter_var($request->input('daily_backup'), FILTER_VALIDATE_BOOLEAN),
                    'email_protection' => filter_var($request->input('email_protection'), FILTER_VALIDATE_BOOLEAN),
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
                'message' => 'Failed to save addons: ' . $e->getMessage()
            ], 500);
        }
    }
}
