<?php

namespace App\Http\Controllers;

use App\Models\Testimonial; // Import the Testimonial model
use Illuminate\View\View; // Import the View class

use Illuminate\Http\Request;

class HostingController extends Controller
{

    public function index(): View
    {
        // Fetch the testimonials data
        $testimonials = Testimonial::select('testimonial_text', 'picture', 'occupation', 'domain_web', 'facebook', 'instagram')->get();

        // Return the landing page view with testimonials
        return view('app.hosting-plans.landing-page.index', ['testimonials' => $testimonials]);
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
}