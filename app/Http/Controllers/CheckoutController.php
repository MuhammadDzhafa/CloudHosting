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
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request, $hosting_plan_id = null)
    {
        try {
            // Cek parameter plan
            $planType = $request->query('plan');
            $orderId = $request->query('order_id');

            // Default specs untuk custom plan
            $defaultCustomSpecs = (object)[
                // RAM specs
                'min_RAM' => 4,
                'max_RAM' => 32,
                'multiplier_RAM' => 2,
                'price_RAM' => 50000, // Harga per unit RAM

                // CPU specs
                'min_CPU' => 1,
                'max_CPU' => 8,
                'multiplier_CPU' => 2,
                'price_CPU' => 75000, // Harga per unit CPU

                // Storage specs
                'min_storage' => 10,
                'max_storage' => 100,
                'step_storage' => 10,
                'price_storage' => 25000, // Harga per unit storage
            ];

            // Jika ini custom order, ambil spesifikasi dari session
            if ($planType === 'custom') {
                $customPlan = session('custom_plan');

                if ($customPlan) {
                    // Modifikasi default specs dengan data dari session
                    $defaultCustomSpecs = (object)[
                        // RAM specs
                        'min_RAM' => 4,
                        'max_RAM' => 32,
                        'multiplier_RAM' => 2,
                        'price_RAM' => 50000,
                        'current_RAM' => $customPlan['specs']['ram'],

                        // CPU specs
                        'min_CPU' => 1,
                        'max_CPU' => 8,
                        'multiplier_CPU' => 2,
                        'price_CPU' => 75000,
                        'current_CPU' => $customPlan['specs']['cpu'],

                        // Storage specs
                        'min_storage' => 10,
                        'max_storage' => 100,
                        'step_storage' => 10,
                        'price_storage' => 25000,
                        'current_storage' => $customPlan['specs']['storage'],

                        // Additional details
                        'ram_price' => $customPlan['details']['ram_price'],
                        'cpu_price' => $customPlan['details']['cpu_price'],
                        'storage_price' => $customPlan['details']['storage_price'],
                        'total_price' => $customPlan['total_price']
                    ];
                }
            }

            // Generate order ID
            $order_id = $orderId ?? uniqid('ORD-');
            $customPlans = HostingPlan::where('package_type', 'Custom')->pluck('hosting_plans_id');

            // Tambahkan pengambilan TLD
            $tlds = TLD::all(); // Ambil semua TLD
            $categories = TLD::select('category')
                ->distinct()
                ->whereNotNull('category')
                ->get();

            // Ambil addons
            $addons = Addon::where('domain_order_id', null)->get();

            // Query dasar untuk hosting plans
            $hostingPlansQuery = HostingPlan::whereNull('deleted_at')
                ->where('product_type', 'Cloud Hosting');

            // Default variabel
            $isCustomOrder = false;
            $isCardOrder = false;

            // Logika filtering hosting plans
            if ($planType === 'custom') {
                // Filter hanya untuk custom package
                $hostingPlans = $hostingPlansQuery
                    ->where('package_type', 'Custom')
                    ->get();

                $isCustomOrder = true;
            } elseif ($hosting_plan_id) {
                // Jika ada hosting_plan_id dari route
                $hostingPlans = $hostingPlansQuery
                    ->where('hosting_plans_id', $hosting_plan_id)
                    ->get();

                $isCardOrder = true;
            } else {
                // Tampilkan semua regular plan
                $hostingPlans = $hostingPlansQuery
                    ->where('package_type', 'Regular')
                    ->get();
            }

            // Validasi hosting plan
            if ($hostingPlans->isEmpty()) {
                throw new \Exception('Tidak ada hosting plan yang ditemukan');
            }

            // Ambil harga untuk hosting plans yang difilter
            $prices = Price::whereIn('hosting_plans_id', $hostingPlans->pluck('hosting_plans_id'))
                ->orderBy('hosting_plans_id')
                ->orderBy('duration')
                ->get();

            // Inisialisasi array spesifikasi dengan eager loading
            $specs = $hostingPlans->mapWithKeys(function ($plan) {
                $regularSpec = RegularMainSpec::where('hosting_plans_id', $plan->hosting_plans_id)->first();

                return [$plan->hosting_plans_id => [
                    'name' => $plan->name,
                    'specifications' => $regularSpec ? [
                        $regularSpec->storage . ' GB SSD Storage',
                        $regularSpec->RAM . ' GB RAM',
                        $regularSpec->CPU . ' Core CPU',
                        'Unlimited Domain',
                        'Free SSL'
                    ] : [$plan->name . ' Hosting Plan']
                ]];
            });

            // Ambil hosting plan pertama dari hasil filter
            $hostingPlan = $hostingPlans->first();

            // Set product info default
            $product_info = $hostingPlan ? $hostingPlan->product_type : 'Hosting Plan';

            // Urutkan harga berdasarkan durasi
            $prices = $prices->sortBy(function ($price) {
                $order = ['monthly', 'semi-annually', 'quarterly', 'annually', 'biennially'];
                return array_search($price->duration, $order) ?? PHP_INT_MAX;
            });

            // Tambahkan logging untuk debugging
            \Log::info('Hosting Plans Loaded', [
                'total_plans' => $hostingPlans->count(),
                'plan_type' => $planType,
                'is_custom_order' => $isCustomOrder,
                'is_card_order' => $isCardOrder,
                'order_id' => $order_id
            ]);

            // Return view dengan data
            return view('app.hosting-plans.checkout.index', [
                'prices' => $prices,
                'hostingPlans' => $hostingPlans,
                'hostingPlan' => $hostingPlan,
                'specs' => $specs,
                'customSpecs' => $defaultCustomSpecs, // Tambahkan custom specs
                'product_info' => $product_info,
                'isCustomOrder' => $isCustomOrder,
                'isCardOrder' => $isCardOrder,
                'orderId' => $orderId,
                'categories' => $categories,
                'tlds' => $tlds,
                'customPlans' => $customPlans,

                // Tambahkan order_id
                'order_id' => $order_id,
                'addons' => $addons,

                // Tambahan variabel opsional
                'hosting_plan_id' => $hosting_plan_id,
                'planType' => $planType,

                // Tambahkan default values untuk variabel yang mungkin digunakan di view
                'tld_name' => null,
                'domain_option_id' => null,
                'selectedTld' => null,
                'price' => 0,
            ]);
        } catch (\Exception $e) {
            // Logging error yang lebih komprehensif
            \Log::error('Error in hosting plan index', [
                'message' => $e->getMessage(),
                'plan_type' => $planType,
                'hosting_plan_id' => $hosting_plan_id,
                'trace' => $e->getTraceAsString()
            ]);

            // Redirect dengan pesan error yang informatif
            return redirect()->route('hosting.index')
                ->with('error', 'Gagal memuat hosting plan: ' . $e->getMessage());
        }
    }

    public function redirectToCheckout(Request $request, $hostingPlanId)
    {
        $hostingPlan = HostingPlan::findOrFail($hostingPlanId);

        // Simpan product_type dari database langsung
        $request->session()->put('product_info', $hostingPlan->product_type);
        $request->session()->put('hosting_plan_name', $hostingPlan->name);

        return redirect()->route('checkout', ['hosting_plan_id' => $hostingPlanId]);
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
                'dns_management' => 'nullable', // Ubah menjadi nullable
                'whois' => 'nullable', // Ubah menjadi nullable
                'domain_option_id' => 'nullable|numeric'
            ]);

            // Konversi input menjadi boolean dengan default true
            $dnsManagement = filter_var(
                $request->input('dns_management', true),
                FILTER_VALIDATE_BOOLEAN
            );
            $whoisProtection = filter_var(
                $request->input('whois', true),
                FILTER_VALIDATE_BOOLEAN
            );

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
                    ['domain_order_id' => $validatedData['order_id']],
                    [
                        'domain_name' => $validatedData['domain_name'],
                        'dns_management' => $dnsManagement, // Gunakan hasil konversi
                        'whois' => $whoisProtection, // Gunakan hasil konversi
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
                'dns_management' => $dnsManagement, // Gunakan hasil konversi
                'whois' => $whoisProtection, // Gunakan hasil konversi
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
            // Validasi input
            $validated = $request->validate([
                'street_address_1' => 'required|string|max:255',
                'street_address_2' => 'nullable|string|max:255',
                'company_name' => 'nullable|string|max:255',
                'city' => 'required|string|max:100',
                'country' => 'required|in:ID,SG,MY', // Sesuaikan dengan pilihan negara
                'state' => 'required|string|max:100',
                'post_code' => 'required|string|max:20|regex:/^\d+$/' // Hanya angka
            ], [
                // Custom error messages
                'street_address_1.required' => 'Street Address is required',
                'city.required' => 'City is required',
                'country.required' => 'Country is required',
                'state.required' => 'State is required',
                'post_code.required' => 'Post Code is required',
                'post_code.regex' => 'Post Code must be numeric'
            ]);

            // Buat atau update billing address
            $billingAddress = BillingAddress::updateOrCreate(
                ['user_id' => auth()->id()], // Sesuaikan dengan logika autentikasi
                [
                    'company_name' => $validated['company_name'] ?? null,
                    'street_address_1' => $validated['street_address_1'],
                    'street_address_2' => $validated['street_address_2'] ?? null,
                    'city' => $validated['city'],
                    'country' => $validated['country'],
                    'state' => $validated['state'],
                    'post_code' => $validated['post_code']
                ]
            );

            return response()->json([
                'success' => true,
                'message' => 'Billing Address saved successfully',
                'data' => $billingAddress
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Billing Address save error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Error saving Billing Address: ' . $e->getMessage()
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

            return response()->json([
                'success' => true,
                'message' => 'Data client berhasil disimpan',
                'redirect_url' => url('/checkout'),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function login_checkout(Request $request)
    {
        Log::info('Login attempt for email: ' . $request->input('email'));

        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ], [
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Email address must not exceed 255 characters.',
            'password.required' => 'Please enter your password.',
            'password.min' => 'Password must be at least 8 characters long.',
        ]);

        if ($validator->fails()) {
            Log::warning('Validation failed for login attempt.', $validator->errors()->toArray());

            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            if ($this->attemptLogin($request)) {
                $user = Auth::user();
                Log::info('Login successful for email: ' . $request->input('email'));

                return response()->json([
                    'success' => true,
                    'message' => 'Login successful',
                    'user' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        // Tambahkan field lain sesuai kebutuhan
                    ]
                ]);
            }

            Log::warning('Login failed for email: ' . $request->input('email'));

            return response()->json([
                'success' => false,
                'message' => 'Invalid email or password'
            ], 401);
        } catch (\Exception $e) {
            Log::error('Login Error: ' . $e->getMessage());
            Log::error('Login Error Trace: ' . $e->getTraceAsString());

            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred',
                'error_details' => $e->getMessage()
            ], 500);
        }
    }

    protected function attemptLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        Log::info('Attempting login with credentials: ', $credentials);

        return Auth::attempt(
            $credentials,
            $request->filled('remember')
        );
    }

    protected function sendFailedLoginResponse(Request $request, $validator = null)
    {
        if ($validator) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')], // Pesan kesalahan jika login gagal
        ]);
    }

    public function saveAddons(Request $request)
    {
        // Log input yang diterima
        \Log::info('Received addon request:', $request->all());

        try {
            // Validasi tanpa order_id
            $validated = $request->validate([
                'daily_backup' => 'required|in:0,1',
                'email_protection' => 'required|in:0,1',
                'price' => 'required|numeric|min:0',
                'domain_order_id' => 'nullable|string'
            ]);

            // Buat addon baru
            $addon = Addon::create([
                'daily_backup' => $request->input('daily_backup') == 1,
                'email_protection' => $request->input('email_protection') == 1,
                'price' => $request->input('price', 0),
                'active_date' => now(),
                'expired_date' => now()->addYear(),
                'domain_order_id' => $request->input('domain_order_id')
            ]);

            // Log addon yang disimpan
            \Log::info('Addon saved:', $addon->toArray());

            return response()->json([
                'success' => true,
                'message' => 'Addons saved successfully',
                'data' => $addon
            ]);
        } catch (\Exception $e) {
            // Log error detail
            \Log::error('Addon save error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Error saving addons: ' . $e->getMessage()
            ], 500);
        }
    }

    public function saveHostingDetails(Request $request)
    {
        try {
            Log::info('Received Hosting Details:', $request->all());

            // Validasi request
            $validated = $request->validate([
                'hosting_plans_id' => 'required|integer',
                'name' => 'nullable|string',
                'domain_name' => 'required|string',
                'plan_type' => 'required|string|in:regular,custom',
                'price' => 'required|integer',
                'billing_period' => 'required|string|in:monthly,quarterly,semi_annually,annually,biennially',
                'ram' => 'nullable|string',
                'cpu' => 'nullable|string',
                'storage' => 'nullable|string',
                'active_date' => 'required|date',
                'expired_date' => 'required|date|after:active_date',
            ]);

            // Ambil data dari hosting_plans berdasarkan hosting_plans_id
            $hostingPlan = HostingPlan::find($validated['hosting_plans_id']);

            if (!$hostingPlan) {
                return response()->json([
                    'success' => false,
                    'message' => 'Hosting plan not found',
                ], 404);
            }

            // Tentukan nama berdasarkan jenis plan
            $name = $validated['plan_type'] === 'custom'
                ? ($validated['name'] ?? 'Custom Hosting Plan')
                : $hostingPlan->name;

            // Simpan data ke tabel order_hosting_details
            $hostingDetails = OrderHostingDetail::create([
                'hosting_plans_id' => $hostingPlan->hosting_plans_id,
                'name' => $name,
                'domain_name' => $validated['domain_name'],
                'product_type' => $hostingPlan->product_type,
                'max_io' => $hostingPlan->max_io,
                'nproc' => $hostingPlan->nproc,
                'entry_process' => $hostingPlan->entry_process,
                'ssl' => $hostingPlan->ssl,
                'backup' => $hostingPlan->backup,
                'max_database' => $hostingPlan->max_database,
                'max_bandwidth' => $hostingPlan->max_bandwidth,
                'max_email_account' => $hostingPlan->max_email_account,
                'max_domain' => $hostingPlan->max_domain,
                'max_addon_domain' => $hostingPlan->max_addon_domain,
                'max_parked_domain' => $hostingPlan->max_parked_domain,
                'ram' => $validated['ram'] ?? $hostingPlan->description,
                'cpu' => $validated['cpu'] ?? $hostingPlan->description,
                'storage' => $validated['storage'] ?? $hostingPlan->description,
                'active_date' => $validated['active_date'],
                'expired_date' => $validated['expired_date'],
                'period' => $validated['billing_period'],
                'price' => $validated['price'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data saved successfully',
                'data' => $hostingDetails,
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error saving hosting details: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to save hosting details',
                'error' => $e->getMessage(),
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
