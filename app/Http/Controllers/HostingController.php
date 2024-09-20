<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HostingController extends Controller
{
    public function index()
    {
        return view('app.hosting-plans.landing-page.index');
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