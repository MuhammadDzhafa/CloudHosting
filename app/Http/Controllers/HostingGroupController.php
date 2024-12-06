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
        // Count how many hosting groups already exist
        $existingGroupCount = HostingGroup::count();

        // Check if there are already 3 groups, and prevent creating a new one if true
        if ($existingGroupCount >= 2) {
            // Ini adalah contoh pesan error
            return redirect()->back()->with('error', 'You can only create a maximum of 2 hosting groups.');
        }

        // Validate the group name input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create the new hosting group
        HostingGroup::create($request->all());

        // Ini adalah contoh pesan success
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

    public function checkHostingGroupCount()
    {
        $count = HostingGroup::count();
        return response()->json(['count' => $count]);
    }
}
