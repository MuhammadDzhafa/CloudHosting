<?php

namespace App\Http\Controllers;

use App\Models\HostingGroup;
use Illuminate\Http\Request;

class HostingGroupController extends Controller
{
    public function index()
    {
        $hostingGroups = HostingGroup::all();
        return view('app.admin.hosting-plans.index', ['hostingGroups' => $hostingGroups]);
    }

    public function create()
    {
        return view('app.admin.hosting-plans.create'); // Tampilkan form untuk membuat hosting group
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        HostingGroup::create($request->all()); // Simpan data baru
        return redirect()->route('hosting-plans.index')->with('success', 'Hosting Group created successfully.');
        return redirect()->route('hosting-plans.index')->with('success', 'Hosting Group created successfully.');
    }

    public function edit($id)
    {
        // $hostingGroup = HostingGroup::where('hosting_Group_id', $id)->firstOrFail();
        $hostingGroup = HostingGroup::findOrFail($id); // Find the hosting group
        return view('hosting-plans', compact('hostingGroup')); // Correct view for editing
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $hostingGroup = HostingGroup::findOrFail($id);
        $hostingGroup->update($request->all()); // Perbarui data
        return redirect()->route('hosting-plans.index')->with('success', 'Hosting Group updated successfully.');
    }

    public function destroy($id)
    {
        $hostingGroup = HostingGroup::findOrFail($id);
        $hostingGroup->hostingPlans()->delete();
        $hostingGroup->delete(); // Hapus data
        return redirect()->route('hosting-plans.index')->with('success', 'Hosting Plan deleted successfully.');
    }
}
