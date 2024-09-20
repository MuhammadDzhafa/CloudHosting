<?php

namespace App\Http\Controllers;

use App\Models\HostingPlan;
use Illuminate\Http\Request;

class HostingPlanController extends Controller
{
    public function index()
    {
        $hostingPlans = HostingPlan::all();
        return view('app.admin.hosting-plans.index', ['hostingPlans' => $hostingPlans]);
    }

    public function create()
    {
        return view('hosting-plans.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'group_id' => 'required',
            'name' => 'required',
            'max_domain' => 'required',
            'max_addon_domain' => 'required',
            'max_email_account' => 'required',
            'max_database' => 'required',
            'max_io' => 'required',
            'nproc' => 'required',
            'entry_process' => 'required',
            'max_bandwidth' => 'required',
            'ssl' => 'required',
            'backup' => 'required',
            'RAM' => 'required',
            'storage' => 'required',
            'CPU' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);

        HostingPlan::create($validatedData);
        return redirect()->route('hosting-plans.index')->with('success', 'Hosting Plan created successfully.');
    }

    public function show($id)
    {
        $hostingPlan = HostingPlan::findOrFail($id);
        return view('app.admin.hosting-plans.show', ['hostingPlan' => $hostingPlan]);
    }

    public function edit($id)
    {
        $hostingPlan = HostingPlan::findOrFail($id);
        return view('hosting-plans.edit', ['hostingPlan' => $hostingPlan]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'group_id' => 'required',
            'name' => 'required',
            'max_domain' => 'required',
            'max_addon_domain' => 'required',
            'max_email_account' => 'required',
            'max_database' => 'required',
            'max_io' => 'required',
            'nproc' => 'required',
            'entry_process' => 'required',
            'max_bandwidth' => 'required',
            'ssl' => 'required',
            'backup' => 'required',
            'RAM' => 'required',
            'storage' => 'required',
            'CPU' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);

        $hostingPlan = HostingPlan::findOrFail($id);
        $hostingPlan->update($validatedData);
        return redirect()->route('hosting-plans.index')->with('success', 'Hosting Plan updated successfully.');
    }

    public function destroy($id)
    {
        $hostingPlan = HostingPlan::findOrFail($id);
        $hostingPlan->delete();
        return redirect()->route('hosting-plans.index')->with('success', 'Hosting Plan deleted successfully.');
    }
}
