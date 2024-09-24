<?php

namespace App\Http\Controllers;

use App\Models\HostingGroup;
use Illuminate\Http\Request;

class HostingGroupController extends Controller
{
    public function index()
    {
        $hostingGroups = HostingGroup::all(); // Ambil semua data
        return view('app.admin.products.index', compact('hostingGroups'));
    }

    public function create()
    {
        return view('app.admin.products.create'); // Tampilkan form untuk membuat hosting group
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        HostingGroup::create($request->all()); // Simpan data baru
        return redirect()->route('product')->with('success', 'Hosting Group created successfully.');
    }

    public function edit($id)
    {
        $hostingGroup = HostingGroup::findOrFail($id); // Find the hosting group
        return view('product', compact('hostingGroup')); // Correct view for editing
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $hostingGroup = HostingGroup::findOrFail($id);
        $hostingGroup->update($request->all()); // Perbarui data
        return redirect()->route('product')->with('success', 'Hosting Group updated successfully.');
    }

    public function destroy($id)
    {
        $hostingGroup = HostingGroup::findOrFail($id);
        $hostingGroup->delete(); // Hapus data
        return redirect()->route('product')->with('success', 'Hosting Group deleted successfully.');
    }
}
