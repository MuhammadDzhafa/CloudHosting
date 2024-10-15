<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs; // Pastikan model ini ada

class ContactUsController extends Controller
{
    // Menampilkan daftar kontak
    public function index()
    {
        $contacts = ContactUs::all(); // Mengambil semua data kontak
        return view('app.admin.contact-us.index', compact('contacts'));
    }

    // Menampilkan form untuk membuat kontak baru
    public function create()
    {
        return view('app.admin.contact-us.create');
    }

    // Menyimpan kontak baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Simpan data ke database
        ContactUs::create($request->all());

        // Return response JSON
        return response()->json(['success' => true, 'message' => 'Message sent successfully']);
    }


    // Menampilkan form untuk mengedit kontak
    public function edit($id)
    {
        // Menggunakan contact_us_id sebagai kunci utama
        $contact = ContactUs::findOrFail($id);
        return view('app.admin.contact-us.edit', compact('contact')); // Mengirimkan data kontak ke view
    }

    // Memperbarui kontak di database
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Mengupdate kontak
        $contact = ContactUs::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('contact-us.index')->with('success', 'Contact updated successfully.');
    }

    // Menghapus kontak
    public function destroy($id)
    {
        // Menghapus kontak berdasarkan contact_us_id
        $contact = ContactUs::findOrFail($id);
        $contact->delete();

        return redirect()->route('contact-us.index')->with('success', 'Contact deleted successfully.');
    }
}
