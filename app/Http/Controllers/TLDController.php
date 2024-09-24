<?php

namespace App\Http\Controllers;

//import model client
use App\Models\TLD;

use Illuminate\Http\Request;

class TLDController extends Controller
{
    // Menampilkan daftar TLD
    public function index()
    {
        $tlds = Tld::all();
        return view('app.admin.tlds.index', compact('tlds'));
    }

    // Menampilkan form untuk menambahkan TLD baru
    public function create()
    {
        return view('app.admin.tlds.create');
    }

    // Menyimpan TLD baru ke database
    public function store(Request $request)
    {     
        $tlds = new Tld();
        $tlds->tld_name = $request->input('tld_name');
        $tlds->tld_price = $request->input('tld_price');
        $tlds->save();

        return redirect()->route('app.admin.tlds.index')->with('success', 'TLD created successfully.');
    }

    // Menampilkan detail TLD
    public function show(Tld $tld)
    {
        return view('tlds.show', compact('tld'));
    }

    // Menampilkan form untuk mengedit TLD
    public function edit(Tld $tld)
    {
        return view('app.admin.tlds.edit', compact('tld'));
    }

    // Memperbarui TLD di database
    public function update(Request $request, Tld $tld)
    {
        $request->validate([
            'tld_name' => 'required|string|max:255',
            'tld_price' => 'required|numeric|between:0,99999999.99',
        ]);

        $tld->update([
            'tld_name' => $request->tld_name,
            'tld_price' => $request->tld_price,
        ]);

        return redirect()->route('app.admin.tlds.index')->with('success', 'TLD updated successfully.');
    }

    // Menghapus TLD dari database
    public function destroy(Tld $tld)
    {
        $tld->delete();
        return redirect()->route('app.admin.tlds.index')->with('success', 'TLD deleted successfully.');
    }
}
