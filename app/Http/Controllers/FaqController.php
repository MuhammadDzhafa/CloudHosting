<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        // Ambil semua FAQ dan kelompokkan berdasarkan kategori
        $faqs = Faq::all()->groupBy('category');

        // dd($faqs);
        // Kirimkan data ke view
        return view('app.hosting-plans.faq.index', compact('faqs'));
    }


    public function create()
    {
        return view('faqs.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category' => 'required|string|max:100',
        ]);

        // Simpan FAQ ke database
        Faq::create($request->all());
        return redirect()->route('faqs.index')->with('success', 'FAQ created successfully.');
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('faqs.edit', compact('faq'));
    }


    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category' => 'required|string|max:100',
        ]);

        // Update FAQ di database
        $faq = Faq::findOrFail($id);
        $faq->update($request->all());
        return redirect()->route('faqs.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy($id)
    {
        // Hapus FAQ dari database
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return redirect()->route('faqs.index')->with('success', 'FAQ deleted successfully.');
    }

    public function faqs()
    {
        // Ambil semua FAQ dan kelompokkan berdasarkan kategori
        $faqs = Faq::all()->groupBy('category');

        // dd($faqs);
        // Kirimkan data ke view
        return view('app.admin.faqs.index', compact('faqs'));
    }
}
