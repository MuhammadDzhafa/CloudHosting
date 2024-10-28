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
use App\Models\BillingAddress; // Tambahkan ini
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Price;

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
            'order_id' => $order_id,  // Tambahkan ini
            'domain_option_id' => $domain_option_id,  // Tambahkan ini
            'price' => $price,  // Tambahkan ini
            'selectedTld' => $selectedTld,
            'product_info' => $productInfo,
            'prices' => $prices,
        ]);
    }

    // Tambahkan method baru untuk menyimpan detail domain
    public function saveDomainDetails(Request $request)
    {
        try {
            DB::beginTransaction();

            Log::info('Data yang diterima:', $request->all());

            // Create/find a temporary billing address
            $billingAddress = BillingAddress::firstOrCreate(
                ['email' => 'default@example.com'],
                [
                    'first_name' => 'Default',
                    'last_name' => 'User',
                    'street_address_1' => 'Default Address',
                    'city' => 'Default City',
                    'state' => 'Default State',
                    'country' => 'ID',
                    'post_code' => '12345',
                    'phone' => '1234567890'
                ]
            );

            Log::info('Alamat tagihan dibuat/ditemukan:', $billingAddress->toArray());

            // Create a new order
            $order = Order::create([
                'order_id' => $request->order_id,
                'status' => 'pending',
                'total_price' => (int)$request->price,
                'payment_method' => 'pending',
                'date_created' => now(),
                'billing_address_id' => $billingAddress->billing_id
            ]);

            Log::info('Pesanan dibuat:', $order->toArray());

            // Create a new domain detail for the order
            $orderDomainDetail = OrderDomainDetail::create([
                'order_id' => $request->order_id,
                'domain_name' => $request->domain_name,
                'dns_management' => $request->dns_management === 'yes',
                'whois' => $request->whois === 'yes',
                'price' => (int)$request->price,
                'domain_option_id' => $request->filled('domain_option_id') ? $request->domain_option_id : null,
                'active_date' => now(),
                'expired_date' => now()->addYear()
            ]);

            Log::info('Detail domain dibuat:', $orderDomainDetail->toArray());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Detail domain berhasil disimpan',
                'data' => [
                    'order' => $order,
                    'domain_detail' => $orderDomainDetail
                ]
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Terjadi kesalahan saat menyimpan detail domain: ' . $e->getMessage());
            Log::error('Trace stack: ' . $e->getTraceAsString());

            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan detail domain: ' . $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ], 500);
        }
    }

    // Method baru untuk update billing address nanti di step 5
    public function saveBillingAddress(Request $request)
    {
        try {
            // Validasi request
            $validated = $request->validate([
                'order_id' => 'required|string|exists:orders,order_id',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'street_address_1' => 'required|string|max:255',
                'street_address_2' => 'nullable|string|max:255',
                'city' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'post_code' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
                'company_name' => 'nullable|string|max:255'
            ]);

            DB::beginTransaction();

            // Buat billing address baru
            $billingAddress = BillingAddress::create($validated);

            // Update order dengan billing address yang baru
            Order::where('order_id', $request->order_id)
                ->update(['billing_address_id' => $billingAddress->billing_id]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Data alamat penagihan berhasil disimpan',
                'data' => $billingAddress
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error menyimpan alamat penagihan: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan alamat penagihan: ' . $e->getMessage()
            ], 500);
        }
    }
}
