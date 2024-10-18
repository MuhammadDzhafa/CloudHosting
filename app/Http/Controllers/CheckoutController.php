<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TLD;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve the 'tld_name' query parameter
        $tld_name = $request->query('tld_name');
        $tlds = TLD::all();
        $categories = Tld::select('category')->distinct()->get();

        return view('app.hosting-plans.checkout.index', [
            'tld_name' => $tld_name,
            'tlds' => $tlds,
            'categories' => $categories,
        ]);
    }
}
