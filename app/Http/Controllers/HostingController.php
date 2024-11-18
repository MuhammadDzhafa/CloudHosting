<?php

namespace App\Http\Controllers;

use App\Models\Testimonial; // Import the Testimonial model
use App\Models\HostingPlan; // Import the Hosting Plan model
use App\Models\HostingGroup; // Import the Hosting Group model
use App\Models\Faq;
use App\Models\CustomMainSpec;
use App\Models\Article; // Import the Article model
use App\Models\TLD; // Import the Article model
use Illuminate\View\View; // Import the View class
use App\Models\RegularMainSpec;
use App\Models\TransferDomain;

use Illuminate\Http\Request;

class HostingController extends Controller
{

    public function index(Request $request): View
    {
        // Retrieve all TLDs and distinct categories for filters
        $tlds = Tld::all();
        $categories = Tld::select('category')->distinct()->get();

        // Retrieve testimonials, hosting groups, articles, and hosting plans with relationships
        $testimonials = Testimonial::all();
        $hostingGroups = HostingGroup::all();
        $articles = Article::latest()->take(5)->get();

        // Get hosting plans with related groups and prices
        $hostingPlans = HostingPlan::with(['hostingGroup', 'prices'])->get();

        // Retrieve regular specs associated with hosting plans
        $regularSpec = RegularMainSpec::whereIn('hosting_plans_id', $hostingPlans->pluck('hosting_plans_id'))->get()->keyBy('hosting_plans_id');
        // dd($regularSpec);
        $specs = CustomMainSpec::first();

        // Sort hosting plans by the 'monthly' price
        $sortedHostingPlans = $hostingPlans->sortBy(function ($plan) {
            return optional($plan->prices->where('duration', 'monthly')->first())->price_after;
        });

        // Return the view with all the necessary data
        return view('app.hosting-plans.landing-page.index', [
            'testimonials' => $testimonials,
            'articles' => $articles,
            'tlds' => $tlds,
            'categories' => $categories,
            'hostingPlans' => $sortedHostingPlans,
            'hostingGroups' => $hostingGroups,
            'regularSpec' => $regularSpec,
            'specs' => $specs,
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input yang diterima
        $request->validate([
            'nama_domain' => 'required|string|max:255',
            'price' => 'required|integer', // Validasi agar price adalah integer
            'epp_code' => 'required|string|max:255',
        ]);

        // Simpan data ke dalam tabel transfer_domains
        TransferDomain::create([
            'nama_domain' => $request->input('nama_domain'),
            'price' => $request->input('price'),  // Pastikan harga disimpan sebagai integer
            'epp_code' => $request->input('epp_code'),
        ]);

        // Mengembalikan response sukses
        return response()->json(['success' => true, 'message' => 'Domain transfer data saved successfully.']);
    }

    public function tampilan3()
    {
        return view('layouts.auth.recovery.passwordrecovery.tampilan3');
    }

    // public function checkout()
    // {
    //     $tlds = TLD::all(); // Ambil semua data TLD
    //     dd($tlds); // Debug, pastikan data muncul
    //     return view('app.hosting-plans.checkout.step1', [
    //         'tlds' => $tlds, // Kirim data ke view
    //     ]);
    // }

    public function server()
    {
        return view('app.hosting-plans.server-status.index');
    }

    public function finalcheckout()
    {
        return view('app.hosting-plans.checkout.invoice');
    }

    public function finalserver()
    {
        return view('app.hosting-plans.server-status.invoice');
    }

    public function cloud()
    {
        $faqs = Faq::all()->groupBy('category');
        $testimonials = Testimonial::select('testimonial_text', 'picture', 'occupation', 'domain_web', 'facebook', 'instagram')->get();

        $hostingGroups = HostingGroup::all();
        $hostingPlans = HostingPlan::with(['hostingGroup', 'prices'])->get();
        $regularSpec = RegularMainSpec::whereIn('hosting_plans_id', $hostingPlans->pluck('hosting_plans_id'))->get()->keyBy('hosting_plans_id');

        // Define the custom order of the hosting plans
        $specs = CustomMainSpec::first();

        $sortedHostingPlans = $hostingPlans->sortBy(function ($plan) {
            return optional($plan->prices->where('duration', 'monthly')->first())->price_after;
        });

        // Return the landing page view with testimonials and sorted hosting plans
        return view('app.hosting-plans.pricing.cloud-hosting.index', [
            'testimonials' => $testimonials,
            'hostingPlans' => $sortedHostingPlans,
            'hostingGroups' => $hostingGroups,
            'faqs' => $faqs,
            'specs' => $specs,
            'regularSpec' => $regularSpec,
        ]);
    }

    public function wordpress()
    {
        $hostingGroups = HostingGroup::all();
        $faqs = Faq::all()->groupBy('category');
        $hostingPlans = HostingPlan::with(['hostingGroup', 'prices'])->get();
        $testimonials = Testimonial::select('testimonial_text', 'picture', 'occupation', 'domain_web', 'facebook', 'instagram')->get();
        $regularSpec = RegularMainSpec::whereIn('hosting_plans_id', $hostingPlans->pluck('hosting_plans_id'))->get()->keyBy('hosting_plans_id');

        $sortedHostingPlans = $hostingPlans->sortBy(function ($plan) {
            return optional($plan->prices->where('duration', 'monthly')->first())->price_after;
        });

        // Return the landing page view with testimonials and sorted hosting plans
        return view('app.hosting-plans.pricing.wordpress-hosting.index', [
            'testimonials' => $testimonials,
            'hostingPlans' => $sortedHostingPlans,
            'hostingGroups' => $hostingGroups,
            'regularSpec' => $regularSpec,
            'faqs' => $faqs
        ]);
    }

    public function product()
    {
        return view('app.admin.products.index');
    }

    public function edit()
    {
        return view('app.admin.products.edit');
    }

    public function faq()
    {
        return view('app.admin.faqs.index');
    }

    public function about()
    {
        return view('app.hosting-plans.about.index');
    }

    public function domain()
    {
        $faqs = Faq::all()->groupBy('category');
        $tlds = Tld::all();
        $categories = Tld::select('category')->distinct()->get();
        $testimonials = Testimonial::select('testimonial_text', 'picture', 'occupation', 'domain_web', 'facebook', 'instagram')->get();

        return view('app.hosting-plans.pricing.domain.index', [
            'testimonials' => $testimonials,
            'faqs' => $faqs,
            'tlds' => $tlds,
            'categories' => $categories,
        ]);
    }

    public function privacy()
    {
        return view('app.hosting-plans.privacy-policy.index');
    }

    public function termsConditions()
    {
        return view('app.hosting-plans.terms-conditions.index');
    }

    public function admin()
    {
        return view('app.admin.dashboard.index');
    }

    public function client()
    {
        $articles = Article::all();
        // dd($articles);

        return view('app.hosting-plans.dashboard.index', compact('articles'));
    }
}
