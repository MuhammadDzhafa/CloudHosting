<?php

namespace App\Http\Controllers;

use App\Models\HostingPlan;
use App\Models\HostingGroup;
use Illuminate\Http\Request;
use App\Models\Price;

class HostingPlanController extends Controller
{
    public function index()
    {
        // $hostingPlans = HostingPlan::withTrashed()->get();
        $hostingPlans = HostingPlan::all();
        $hostingGroups = HostingGroup::all();
        return view('app.admin.hosting-plans.index', ['hostingPlans' => $hostingPlans, 'hostingGroups' => $hostingGroups]);
    }

    public function create()
    {
        return view('app.admin.hosting-plans.create');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string',
    //         'hosting_group_id' => 'required|exists:hosting_groups,hostinggroup_id',
    //         'type' => 'required|string',
    //         'description' => 'required|string',
    //     ]);

    //     // Create the hosting plan and store it in the database
    //     $hostingPlan = HostingPlan::create([
    //         'name' => $request->name,
    //         'hosting_group_id' => $request->hosting_group_id,
    //         'type' => $request->type,
    //         'description' => $request->description,
    //         'RAM' => '0',
    //         'storage' => '0',
    //         'CPU' => '0',
    //         'max_io' => '0',
    //         'nproc' => '0',
    //         'entry_process' => '0',
    //         'ssl' => 'free',
    //         'backup' => 'weekly',
    //         'max_database' => 'Unlimited',
    //         'max_bandwidth' => 'Unlimited',
    //         'max_email_account' => 'Unlimited',
    //         'max_ftp_account' => 'Unlimited',
    //         'max_domain' => 'Unlimited',
    //         'max_addon_domain' => 'Unlimited',
    //         'max_parked_domain' => 'Unlimited',
    //         'ssh' => 'No',
    //         'free_domain' => 'No',
    //     ]);

    //     $hostingPlan->save();

    //     // Redirect to the edit page of the newly created hosting plan
    //     return redirect()->route('hosting-plans.edit', $hostingPlan->hosting_plans_id)->with('success', 'Hosting plan created successfully.');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'hosting_group_id' => 'required|exists:hosting_groups,hosting_group_id', // Correct column name
            'type' => 'required|string',
            'description' => 'required|string',
        ]);

        // Create the hosting plan and store it in the database
        $hostingPlan = HostingPlan::create([
            'name' => $request->name,
            'hosting_group_id' => $request->hosting_group_id, // Correct field name
            'type' => $request->type,
            'description' => $request->description,
            'RAM' => '0',
            'storage' => '0',
            'CPU' => '0',
            'max_io' => '0',
            'nproc' => '0',
            'entry_process' => '0',
            'ssl' => 'free',
            'backup' => 'weekly',
            'max_database' => 'Unlimited',
            'max_bandwidth' => 'Unlimited',
            'max_email_account' => 'Unlimited',
            'max_ftp_account' => 'Unlimited',
            'max_domain' => 'Unlimited',
            'max_addon_domain' => 'Unlimited',
            'max_parked_domain' => 'Unlimited',
            'ssh' => 'No',
            'free_domain' => 'No',
        ]);

        $hostingPlan->save();

        // Redirect to the edit page of the newly created hosting plan
        return redirect()->route('hosting-plans.edit', $hostingPlan->hosting_plans_id)->with('success', 'Hosting plan created successfully.');
    }



    public function show($id)
    {
        $hostingPlan = HostingPlan::findOrFail($id);
        return view('app.admin.hosting-plans.show', ['hostingPlan' => $hostingPlan]);
    }

    public function edit($id)
    {
        $hostingPlan = HostingPlan::findOrFail($id);

        // Mengambil data harga dari tabel 'price' berdasarkan hosting_plans_id
        $prices = Price::where('hosting_plans_id', $hostingPlan->hosting_plans_id)
            ->get()
            ->keyBy('duration'); // Mengindeks data berdasarkan 'duration'

        return view('app.admin.hosting-plans.edit', ['hostingPlan' => $hostingPlan, 'prices' => $prices]);

        // $hostingPlan = HostingPlan::where('hosting_plans_id', $id)->firstOrFail();
        // return view('app.admin.hosting-plans.edit', ['hostingPlan' => $hostingPlan]);
    }

    public function update(Request $request, $id)
    {

        // Validate the request inputs for hosting plan
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
            // 'max_database' => 'required|string',
            // 'max_bandwidth' => 'required|string',
            // 'max_email_account' => 'required|string',
            // 'max_ftp_account' => 'required|string',
            // 'max_domain' => 'required|string',
            // 'max_addon_domain' => 'required|string',
            // 'max_parked_domain' => 'required|string',
            // 'ssh' => 'required|string',
            // 'free_domain' => 'required|string',
            'prices' => 'nullable|array',
            'prices.*.price' => 'nullable|integer',
            'prices.*.discount' => 'nullable|integer|min:0|max:100',
            'prices.*.price_after' => 'nullable|integer',
        ]);

        // Find the hosting plan by ID
        $hostingPlan = HostingPlan::findOrFail($id);
        $hostingPlan->update($request->all());

        // Update the hosting plan with the request data
        $hostingPlan->update([
            // dd($request->all()),
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
            // 'max_database' => $request->max_database,
            // 'max_bandwidth' => $request->max_bandwidth,
            // 'max_email_account' => $request->max_email_account,
            // 'max_ftp_account' => $request->max_ftp_account,
            // 'max_domain' => $request->max_domain,
            // 'max_addon_domain' => $request->max_addon_domain,
            // 'max_parked_domain' => $request->max_parked_domain,
            // 'ssh' => $request->ssh,
            // 'free_domain' => $request->free_domain,
        ]);

        if (is_array($request->prices)) {
            foreach ($request->prices as $duration => $priceData) {
                Price::updateOrCreate(
                    [
                        'hosting_plans_id' => $hostingPlan->hosting_plans_id,
                        'duration' => $duration,
                    ],
                    [
                        'price' => $priceData['price'],
                        'discount' => $priceData['discount'] ?? null,
                        'price_after' => $priceData['price_after'],
                    ]
                );
            }
        }

        // Redirect or return a response
        return redirect()->route('hosting-plans.edit', $hostingPlan->hosting_plans_id)->with('success', 'Hosting plan created successfully.');
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
