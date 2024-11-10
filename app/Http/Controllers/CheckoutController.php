<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\TLD;
use App\Models\HostingPlan;
use App\Models\RegularMainSpec;
use App\Models\OrderDomainDetail;
use App\Models\OrderHostingDetail;
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
        $hostingPlan = null; // Initialize hostingPlan variable

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
                    ['value' => $regularSpec->RAM . ' GB RAM'],
                    ['value' => $regularSpec->CPU . ' Core CPU'],
                    ['value' => 'Unlimited Domain'],
                    ['value' => 'Free SSL']
                ];
            } elseif ($hostingPlan) {
                $specs = [
                    ['value' => $hostingPlan->storage . ' GB SSD Storage'],
                    ['value' => $hostingPlan->RAM . ' GB RAM'],
                    ['value' => $hostingPlan->CPU . ' Core CPU'],
                    ['value' => 'Unlimited Domain'],
                    ['value' => 'Free SSL']
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

        // Jika tidak ada hosting plan yang dipilih, ambil default hosting plan
        if (!$hostingPlan) {
            $hostingPlan = HostingPlan::first(); // atau logika lain untuk mendapatkan default plan
        }

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
            'hostingPlan' => $hostingPlan, // Pass hostingPlan ke view
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
                'dns_management' => 'required|in:true,false', // menerima true/false sebagai string
                'whois' => 'required|in:true,false', // menerima true/false sebagai string
                'domain_option_id' => 'nullable|numeric'
            ]);

            // Dapatkan user_id jika ada
            $userId = auth()->id(); // Ini bisa null jika pengguna tidak terautentikasi

            // Check if order exists
            $existingOrder = Order::where('order_id', $validatedData['order_id'])->first();

            if ($existingOrder) {
                // Update existing order price
                $existingOrder->update([
                    'total_price' => $validatedData['price']
                ]);

                // Update or create domain details
                $domainDetail = OrderDomainDetail::updateOrCreate(
                    ['order_id' => $validatedData['order_id']],
                    [
                        'domain_name' => $validatedData['domain_name'],
                        'dns_management' => (bool)$validatedData['dns_management'],
                        'whois' => (bool)$validatedData['whois'],
                        'price' => (int)$validatedData['price'],
                        'domain_option_id' => $validatedData['domain_option_id'],
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

            // Data untuk order baru
            $orderData = [
                'order_id' => $validatedData['order_id'],
                'status' => 'pending',
                'total_price' => (int)$validatedData['price'],
                'payment_method' => 'pending',
                'date_created' => now(),
            ];

            // Tambahkan user_id jika ada
            if ($userId) {
                $orderData['user_id'] = $userId;
            }

            // Buat order baru
            $order = Order::create($orderData);

            // Buat detail domain baru
            $domainDetail = OrderDomainDetail::create([
                'order_id' => $validatedData['order_id'],
                'domain_name' => $validatedData['domain_name'],
                'dns_management' => (bool)$validatedData['dns_management'],
                'whois' => (bool)$validatedData['whois'],
                'price' => (int)$validatedData['price'],
                'domain_option_id' => $validatedData['domain_option_id'],
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
            Log::info('Received billing address request:', [
                'data' => $request->all()
            ]);

            // Validasi data tanpa menggunakan user_id
            $billingData = $request->validate([
                'street_address_1' => 'required|string|max:255',
                'street_address_2' => 'nullable|string|max:255',
                'city' => 'required|string|max:100',
                'state' => 'required|string|max:100',
                'country' => 'required|string',
                'post_code' => 'required|string|max:20',
                'company_name' => 'nullable|string|max:255'
            ]);

            DB::beginTransaction();

            // Simpan alamat penagihan tanpa user_id
            $billingAddress = BillingAddress::create($billingData);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Billing address saved successfully',
                'data' => $billingAddress
            ]);
        } catch (ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
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

    // OrderHostingDetailController.php
    public function storeOrderHostingDetail(Request $request)
{
    try {
        DB::beginTransaction();

        // Jika product_type adalah 'Hosting Only', gunakan validasi dan logika yang berbeda
        if ($request->product_type === 'Hosting Only') {
            // Validasi minimal untuk Hosting Only
            $request->validate([
                'order_id' => 'required|string',
                'status' => 'required|string',
                'payment_method' => 'required|string',
                'date_created' => 'required',
                'hosting_plans_id' => 'required',
                'name' => 'required',
                'domain_name' => 'required',
                'product_type' => 'required',
                'package_type' => 'required'
            ]);

            // Cek apakah order sudah ada
            $order = Order::firstOrCreate(
                ['order_id' => $request->order_id],
                [
                    'status' => $request->status,
                    'payment_method' => $request->payment_method,
                    'date_created' => $request->date_created,
                ]
            );

            // Simpan data default untuk Hosting Only
            $orderHostingDetail = OrderHostingDetail::create([
                'order_id' => $request->order_id,
                'hosting_plans_id' => $request->hosting_plans_id,
                'name' => $request->name,
                'domain_name' => $request->domain_name,
                'product_type' => $request->product_type,
                'package_type' => $request->package_type,
                'max_io' => $request->max_io ?? 0,
                'nproc' => $request->nproc ?? 0,
                'entry_process' => $request->entry_process ?? 0,
                'ssl' => $request->ssl ?? 'No',
                'ram' => $request->ram ?? 0,
                'cpu' => $request->cpu ?? 0,
                'storage' => $request->storage ?? 0,
                'backup' => $request->backup ?? 'No',
                'max_database' => $request->max_database ?? '0',
                'max_bandwidth' => $request->max_bandwidth ?? '0',
                'max_email_account' => $request->max_email_account ?? '0',
                'max_domain' => $request->max_domain ?? '0',
                'max_addon_domain' => $request->max_addon_domain ?? '0',
                'max_parked_domain' => $request->max_parked_domain ?? '0',
                'ssh' => $request->ssh ?? 'No',
                'free_domain' => $request->free_domain ?? 'No',
                'active_date' => $request->active_date,
                'expired_date' => $request->expired_date,
                'periode' => $request->periode ?? 'monthly',
                'price' => $request->price ?? 0
            ]);
        } else {
            // Gunakan validasi dan logika yang sudah ada untuk tab lainnya
            $validated = $request->validate([
                'order_id' => 'required|string',
                'hosting_plans_id' => 'required|exists:hosting_plans,hosting_plans_id',
                'domain_name' => 'required|string',
                'product_type' => 'required|string',
                'package_type' => 'required|string',
                'max_io' => 'nullable|string',
                'nproc' => 'nullable|string',
                'entry_process' => 'nullable|string',
                'ssl' => 'required|string',
                'ram' => 'required|integer|min:1',
                'cpu' => 'required|integer|min:1',
                'storage' => 'required|integer|min:1',
                'backup' => 'required|string',
                'max_database' => 'required|string',
                'max_bandwidth' => 'required|string',
                'max_email_account' => 'required|string',
                'max_domain' => 'required|string',
                'max_addon_domain' => 'required|string',
                'max_parked_domain' => 'required|string',
                'ssh' => 'required|string',
                'free_domain' => 'required|string',
                'active_date' => 'required|date',
                'expired_date' => 'required|date|after:active_date',
                'periode' => 'required|string|in:monthly,quarterly,semi_annually,annually,biennially',
                'price' => 'required|integer'
            ]);

            $hostingPlan = HostingPlan::findOrFail($validated['hosting_plans_id']);

            // Pastikan order sudah ada
            $order = Order::firstOrCreate(
                ['order_id' => $validated['order_id']],
                [
                    'status' => 'pending', // Anda mungkin perlu menyesuaikan ini
                    'payment_method' => 'pending', // Anda mungkin perlu menyesuaikan ini
                    'date_created' => now(),
                ]
            );

            $orderHostingDetail = OrderHostingDetail::create([
                'order_id' => $validated['order_id'],
                'hosting_plans_id' => $validated['hosting_plans_id'],
                'name' => $hostingPlan->name,
                'domain_name' => $validated['domain_name'],
                'product_type' => $hostingPlan->product_type,
                'package_type' => $hostingPlan->package_type,
                'max_io' => $validated['max_io'] ?? $hostingPlan->max_io,
                'nproc' => $validated['nproc'] ?? $hostingPlan->nproc,
                'entry_process' => $validated['entry_process'] ?? $hostingPlan->entry_process,
                'ssl' => $validated['ssl'] ?? $hostingPlan->ssl,
                'ram' => $validated['ram'],
                'cpu' => $validated['cpu'],
                'storage' => $validated['storage'],
                'backup' => $validated['backup'] ?? $hostingPlan->backup,
                'max_database' => $validated['max_database'] ?? $hostingPlan->max_database,
                'max_bandwidth' => $validated['max_bandwidth'] ?? $hostingPlan->max_bandwidth,
                'max_email_account' => $validated['max_email_account'] ?? $hostingPlan->max_email_account,
                'max_domain' => $validated['max_domain'] ?? $hostingPlan->max_domain,
                'max_addon_domain' => $validated['max_addon_domain'] ?? $hostingPlan->max_addon_domain,
                'max_parked_domain' => $validated['max_parked_domain'] ?? $hostingPlan->max_parked_domain,
                'ssh' => $validated['ssh'] ?? $hostingPlan->ssh,
                'free_domain' => $validated['free_domain'] ?? $hostingPlan->free_domain,
                'active_date' => $validated['active_date'],
                'expired_date' => $validated['expired_date'],
                'periode' => $validated['period'],
                'price' => $validated['price']
            ]);
        }

        DB::commit();

        return response()->json([
            'message' => 'Data hosting berhasil disimpan!',
            'data' => $orderHostingDetail
        ], 200);
    } catch (\Illuminate\Validation\ValidationException $e) {
        DB::rollBack();
        return response()->json([
            'message' => 'Validasi gagal',
            'errors' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json([
            'message' => 'Terjadi kesalahan saat menyimpan data',
            'error' => $e->getMessage()
        ], 500);
    }
}

    /**
     * Validasi harga sesuai dengan periode billing yang dipilih
     */
    private function validatePrice($billingPeriod, $selectedPrice)
    {
        // Ambil data harga yang valid dari database atau config
        $validPrices = [
            'monthly' => [
                'price' => config('hosting.prices.monthly'),
                'discount' => config('hosting.discounts.monthly')
            ],
            'quarterly' => [
                'price' => config('hosting.prices.quarterly'),
                'discount' => config('hosting.discounts.quarterly')
            ],
            // Tambahkan periode lainnya sesuai kebutuhan
        ];

        if (!isset($validPrices[$billingPeriod])) {
            throw new \Exception('Periode billing tidak valid');
        }

        $expectedPrice = $validPrices[$billingPeriod]['price'];
        $discount = $validPrices[$billingPeriod]['discount'];
        $finalPrice = $expectedPrice - ($expectedPrice * ($discount / 100));

        if ($selectedPrice !== (int)$finalPrice) {
            throw new \Exception('Harga tidak sesuai dengan periode yang dipilih');
        }
    }
}
