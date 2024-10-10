<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve the 'tld_name' query parameter
        $tld_name = $request->query('tld_name');

        return view('app.hosting-plans.checkout.index', ['tld_name' => $tld_name]);
    }
}
