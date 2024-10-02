<?php

namespace App\Http\Controllers;

use App\Models\Testimonial; // Import the Testimonial model
use App\Models\HostingPlan; // Import the Hosting Plan model
use App\Models\HostingGroup; // Import the Hosting Group model
use Illuminate\View\View; // Import the View class

use Illuminate\Http\Request;

class HostingController extends Controller
{

    public function index(): View
    {
        // Fetch the testimonials data
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
        return view('app.hosting-plans.landing-page.index', [
            'testimonials' => $testimonials,
            'hostingPlans' => $sortedHostingPlans,
            'hostingGroups' => $hostingGroups
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

    public function pricing()
    {
        return view('app.hosting-plans.pricing.index');
    }

    public function product()
    {
        return view('app.admin.products.index');
    }

    public function edit()
    {
        return view('app.admin.products.edit');
    }

    public function about()
    {
        return view('app.hosting-plans.about.index');
    }
}
