<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Store a newly created contact message in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Simpan data ke database menggunakan model ContactUs
        ContactUs::create($validatedData);

        // Redirect atau berikan respons sukses
        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
