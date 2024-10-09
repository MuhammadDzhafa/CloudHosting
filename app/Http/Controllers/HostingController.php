<?php

namespace App\Http\Controllers;

use App\Models\Testimonial; // Import the Testimonial model
use App\Models\HostingPlan; // Import the Hosting Plan model
use App\Models\HostingGroup; // Import the Hosting Group model
use App\Models\Article; // Import the Article model
use App\Models\TLD; // Import the Article model
use App\Models\Faq;
use Illuminate\View\View; // Import the View class

use Illuminate\Http\Request;

class HostingController extends Controller
{

    public function index(Request $request): View
    {
        // Retrieve all TLDs and distinct categories for filters
        $tlds = Tld::all(); // You can use paginate() if pagination is needed
        $categories = Tld::select('category')->distinct()->get();
        // dd($categories);

        // Retrieve testimonials, hosting groups, articles, and hosting plans with relationships
        $testimonials = Testimonial::all();
        $hostingGroups = HostingGroup::all();
        $articles = Article::latest()->take(5)->get();
        
        // Eager load hosting plans with related groups and prices
        $hostingPlans = HostingPlan::with(['hostingGroup', 'prices'])->get();

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
        ]);
    }


    public function tampilan3()
    {
        return view('layouts.auth.recovery.passwordrecovery.tampilan3');
    }

    public function checkout()
    {
        return view('app.hosting-plans.checkout.index');
    }

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

        // Define the custom order of the hosting plans
        $hostingPlanOrder = ['Strato', 'Alto', 'Cirrus'];

        $sortedHostingPlans = $hostingPlans->sortBy(function ($hostingPlan) use ($hostingPlanOrder) {
            foreach ($hostingPlanOrder as $key => $name) {
                // Check if the plan name contains one of the keywords
                if (str_contains($hostingPlan->name, $name)) {
                    return $key; // Return the index based on the keyword
                }
            }
            return count($hostingPlanOrder); // Default to end of the list if no match
        });

        // Return the landing page view with testimonials and sorted hosting plans
        return view('app.hosting-plans.pricing.cloud-hosting.index', [
            'testimonials' => $testimonials,
            'hostingPlans' => $sortedHostingPlans,
            'hostingGroups' => $hostingGroups,
            'faqs' => $faqs
        ]);
    }

    public function wordpress()
    {
        $hostingGroups = HostingGroup::all();
        $hostingPlans = HostingPlan::with(['hostingGroup', 'prices'])->get();

        // Define the custom order of the hosting plans
        $hostingPlanOrder = ['Strato', 'Alto', 'Cirrus'];

        $sortedHostingPlans = $hostingPlans->sortBy(function ($hostingPlan) use ($hostingPlanOrder) {
            foreach ($hostingPlanOrder as $key => $name) {
                // Check if the plan name contains one of the keywords
                if (str_contains($hostingPlan->name, $name)) {
                    return $key; // Return the index based on the keyword
                }
            }
            return count($hostingPlanOrder); // Default to end of the list if no match
        });

        // Return the landing page view with testimonials and sorted hosting plans
        return view('app.hosting-plans.pricing.wordpress-hosting.index', [
            'hostingPlans' => $sortedHostingPlans,
            'hostingGroups' => $hostingGroups
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
        return view('app.hosting-plans.faq.index');
    }

    public function about()
    {
        return view('app.hosting-plans.about.index');
    }

    public function domain()
    {
        $faqs = Faq::all()->groupBy('category');
        $testimonials = Testimonial::select('testimonial_text', 'picture', 'occupation', 'domain_web', 'facebook', 'instagram')->get();

        return view('app.hosting-plans.pricing.domain.index', [
            'testimonials' => $testimonials,
            'faqs' => $faqs,
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
}
