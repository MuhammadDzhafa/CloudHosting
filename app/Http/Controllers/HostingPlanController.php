<?php

namespace App\Http\Controllers;

use App\Models\HostingPlan;
use Illuminate\Http\Request;

class HostingPlanController extends Controller
{
    public function index()
    {
        // $hostingPlans = HostingPlan::withTrashed()->get();
        $hostingPlans = HostingPlan::get();
        return view('app.admin.hosting-plans.index', ['hostingPlans' => $hostingPlans]);
    }

    public function create()
    {
        return view('app.admin.hosting-plans.create');
    }

    public function store(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required|string',
            'group_id' => 'required|integer',
            'type' => 'required|in:Regular Hosting,Custom Hosting',
            'description' => 'required|string',
            'RAM' => 'required|integer',
            'storage' => 'required|integer',
            'CPU' => 'required|string',
            'max_io' => 'required|integer',
            'nproc' => 'required|integer',
            'entry_process' => 'required|integer',
            'ssl' => 'required|boolean',
            'backup' => 'required|string',
            'max_database' => 'required|integer',
            'max_bandwidth' => 'required|integer',
            'max_email_account' => 'required|integer',
            'max_ftp_account' => 'required|integer',
            'max_domain' => 'required|integer',
            'max_addon_domain' => 'required|integer',
            'max_parked_domain' => 'required|integer',
            'ssh' => 'required|boolean',
            'free_domain' => 'required|boolean',
        ]);

        // Create and save the new hosting plan
        $hostingPlan = new HostingPlan([
            'name' => $request->input('name'),
            'group_id' => $request->input('group_id'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'RAM' => $request->input('RAM'),
            'storage' => $request->input('storage'),
            'CPU' => $request->input('CPU'),
            'max_io' => $request->input('max_io'),
            'nproc' => $request->input('nproc'),
            'entry_process' => $request->input('entry_process'),
            'ssl' => $request->input('ssl'),
            'backup' => $request->input('backup'),
            'max_database' => $request->input('max_database'),
            'max_bandwidth' => $request->input('max_bandwidth'),
            'max_email_account' => $request->input('max_email_account'),
            'max_ftp_account' => $request->input('max_ftp_account'),
            'max_domain' => $request->input('max_domain'),
            'max_addon_domain' => $request->input('max_addon_domain'),
            'max_parked_domain' => $request->input('max_parked_domain'),
            'ssh' => $request->input('ssh'),
            'free_domain' => $request->input('free_domain'),
        ]);

        $hostingPlan = HostingPlan::create($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('hosting-plans.index')->with('success', 'Hosting plan created successfully.');
    }


    public function show($id)
    {
        $hostingPlan = HostingPlan::findOrFail($id);
        return view('app.admin.hosting-plans.show', ['hostingPlan' => $hostingPlan]);
    }

    public function edit($id)
    {
        $hostingPlan = HostingPlan::findOrFail($id);
        return view('app.admin.hosting-plans.edit', ['hostingPlan' => $hostingPlan]);

        // $hostingPlan = HostingPlan::where('hosting_plans_id', $id)->firstOrFail();
        // return view('app.admin.hosting-plans.edit', ['hostingPlan' => $hostingPlan]);
    }

    public function update(Request $request, $id)
    {
        // Validate the request inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'group_id' => 'required|integer',
            'type' => 'required|string|max:50',
            'description' => 'required|string',
            'RAM' => 'required|string',
            'storage' => 'required|string',
            'CPU' => 'required|string',
            'max_io' => 'required|string',
            'nproc' => 'required|string',
            'entry_process' => 'required|string',
            'ssl' => 'required|string',
            'backup' => 'required|string',
            'max_database' => 'required|string',
            // 'max_bandwidth' => 'required|string',
            // 'max_email_account' => 'required|string',
            // 'max_ftp_account' => 'required|string',
            // 'max_domain' => 'required|string',
            // 'max_addon_domain' => 'required|string',
            // 'max_parked_domain' => 'required|string',
            // 'ssh' => 'required|string',
            // 'free_domain' => 'required|string',
        ]);

        // Find the hosting plan by ID
        $hostingPlan = HostingPlan::findOrFail($id);

        // Update the hosting plan with the request data
        $hostingPlan->update([
            'name' => $request->name,
            'group_id' => $request->group_id,
            'type' => $request->type,
            'description' => $request->description,
            'RAM' => $request->RAM,
            'storage' => $request->storage,
            'CPU' => $request->CPU,
            'max_io' => $request->max_io,
            'nproc' => $request->nproc,
            'entry_process' => $request->entry_process,
            'ssl' => $request->ssl,
            'backup' => $request->backup,
            'max_database' => $request->max_database,
            // 'max_bandwidth' => $request->max_bandwidth,
            // 'max_email_account' => $request->max_email_account,
            // 'max_ftp_account' => $request->max_ftp_account,
            // 'max_domain' => $request->max_domain,
            // 'max_addon_domain' => $request->max_addon_domain,
            // 'max_parked_domain' => $request->max_parked_domain,
            // 'ssh' => $request->ssh,
            // 'free_domain' => $request->free_domain,
        ]);

        // Redirect or return a response
        return redirect()->route('hosting-plans.index')->with('success', 'Hosting plan updated successfully.');
    }

    public function destroy($id)
    {
        $hostingPlan = HostingPlan::findOrFail($id);
        $hostingPlan->delete(); // Ini sekarang melakukan soft delete
        return redirect()->route('hosting-plans.index')->with('success', 'Hosting Plan deleted successfully.');
    }

    public function restore($id)
    {
        $hostingPlan = HostingPlan::withTrashed()->findOrFail($id);
        $hostingPlan->restore();
        return redirect()->route('hosting-plans.index')->with('success', 'Hosting Plan restored successfully.');
    }
}
