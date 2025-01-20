<?php

namespace App\Http\Controllers;

// Import model TLD
use App\Models\TLD;

use Illuminate\Http\Request;

class TLDController extends Controller
{
    // Menampilkan daftar TLD
    public function index()
    {
        $tlds = TLD::all(); // Pastikan menggunakan huruf kapital untuk model
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
        $tld = new TLD(); // Pastikan menggunakan huruf kapital
        $tld->tld_name = $request->input('tld_name');
        $tld->tld_price = $request->input('tld_price');
        $tld->category = $request->input('category');

        $tld->save();

        return redirect()->route('app.admin.tlds.index')->with('success', 'TLD created successfully.');
    }

    // Menampilkan detail TLD
    public function show(TLD $tld) // Pastikan menggunakan huruf kapital
    {
        return view('tlds.show', compact('tld'));
    }

    // Menampilkan form untuk mengedit TLD
    public function edit(TLD $tld) // Pastikan menggunakan huruf kapital
    {
        // Tidak perlu melakukan pencarian lagi, karena $tld sudah di-inject oleh Laravel
        return view('app.admin.tlds.edit', compact('tld'));
    }

    // Memperbarui TLD di database
    public function update(Request $request, $id) {
        $tld = TLD::findOrFail($id);
    
        $validated = $request->validate([
            'tld_name' => 'required|string|max:255',
            'tld_price' => 'required|numeric',
            'category' => 'nullable|string|max:255',
        ]);
    
        $tld->update($validated);
    
        return redirect()->route('app.admin.tlds.index')->with('success', 'TLD updated successfully');
    }
    

    // Menghapus TLD dari database
    public function destroy(TLD $tld) // Pastikan menggunakan huruf kapital
    {
        $tld->delete();
        return redirect()->route('app.admin.tlds.index')->with('success', 'TLD deleted successfully.');
    }

    // Menangani order
    public function order(Request $request)
    {
        // Validasi input
        $request->validate([
            'tld_name' => 'required|string',
            'tld_price' => 'required|numeric',
        ]);

        // Simpan data TLD ke dalam database
        $tld = new TLD();
        $tld->tld_name = $request->input('tld_name');
        $tld->tld_price = $request->input('tld_price');
        $tld->save();

        // Kembalikan respons JSON
        return response()->json(['success' => true, 'tld_id' => $tld->id]); // Tambahkan ID TLD yang baru disimpan
    }
}
