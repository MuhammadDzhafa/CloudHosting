<?php

namespace App\Http\Controllers;

use App\Models\HostingPlan;
use App\Models\HostingGroup;
use Illuminate\Http\Request;
use App\Models\Price;
use App\Models\CustomMainSpec;
use App\Models\RegularMainSpec;



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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'hosting_group_id' => 'required|exists:hosting_groups,hosting_group_id', // Correct column name
            'product_type' => 'required|string',
            'package_type' => 'required|string',
            'description' => 'required|string',
        ]);

        // Create the hosting plan and store it in the database
        $hostingPlan = HostingPlan::create([
            'name' => $request->name,
            'hosting_group_id' => $request->hosting_group_id, // Correct field name
            'product_type' => $request->product_type,
            'package_type' => $request->package_type,
            'description' => $request->description,
            'max_io' => '0',
            'nproc' => '0',
            'entry_process' => '0',
            'ssl' => 'Free',
            'backup' => 'Weekly',
            'max_database' => 'Unlimited',
            'max_bandwidth' => 'Unlimited',
            'max_email_account' => 'Unlimited',
            'max_ftp_account' => 'Unlimited',
            'max_domain' => 'Unlimited',
            'max_addon_domain' => 'Unlimited',
            'max_parked_domain' => 'Unlimited',
            'ssh' => 'No',
            'free_domain' => 'No',
            'best_seller' => false
        ]);

        // Create regular or custom spec based on package type
        if ($request->package_type === 'Regular') {
            RegularMainSpec::create([
                'hosting_plans_id' => $hostingPlan->hosting_plans_id,
                'RAM' => 0,
                'storage' => 0,
                'CPU' => 0,
            ]);
        } elseif ($request->package_type === 'Custom') {
            CustomMainSpec::create([
                'hosting_plans_id' => $hostingPlan->hosting_plans_id,
                'min_RAM' => 0,
                'max_RAM' => 0,
                'multiplier_RAM' => 0,
                'price_RAM' => 0,
                'min_storage' => 0,
                'max_storage' => 0,
                'step_storage' => 0,
                'price_storage' => 0,
                'min_CPU' => 0,
                'max_CPU' => 0,
                'multiplier_CPU' => 0,
                'price_CPU' => 0,
            ]);
        }

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
        $hostingGroups = HostingGroup::all();
        $hostingGroupName = $hostingPlan->hostingGroup->name;
        $hostingGroupId = $hostingPlan->hostingGroup->hosting_group_id;
        $customSpec = CustomMainSpec::where('hosting_plans_id', $hostingPlan->hosting_plans_id)->first();
        $regularSpec = RegularMainSpec::where('hosting_plans_id', $hostingPlan->hosting_plans_id)->first();

        // Mengambil data harga dari tabel 'price' berdasarkan hosting_plans_id
        $prices = Price::where('hosting_plans_id', $hostingPlan->hosting_plans_id)
            ->get()
            ->keyBy('duration'); // Mengindeks data berdasarkan 'duration'

        return view('app.admin.hosting-plans.edit', ['hostingPlan' => $hostingPlan, 'hostingGroupId' => $hostingGroupId, 'hostingGroups' => $hostingGroups, 'hostingGroupName' => $hostingGroupName, 'prices' => $prices, 'regularSpec' => $regularSpec, 'customSpec' => $customSpec]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'hosting_group_id' => 'required|exists:hosting_groups,hosting_group_id',
            'product_type' => 'required|string|max:50',
            'package_type' => 'required|string|max:50',
            'description' => 'required|string',
            'best_seller' => 'required|string',
        ]);

        if ($request->package_type === 'Regular') {
            $request->validate([
                'regular_spec.max_io' => 'required|string',
                'regular_spec.nproc' => 'required|string',
                'regular_spec.entry_process' => 'required|string',
                'regular_spec.ssl' => 'required|string',
                'regular_spec.backup' => 'required|string',
                'regular_spec.max_database' => 'required|string',
                'regular_spec.max_bandwidth' => 'required|string',
                'regular_spec.max_email_account' => 'required|string',
                'regular_spec.max_ftp_account' => 'required|string',
                'regular_spec.max_domain' => 'required|string',
                'regular_spec.max_addon_domain' => 'required|string',
                'regular_spec.max_parked_domain' => 'required|string',
                'regular_spec.ssh' => 'required|string',
                'regular_spec.free_domain' => 'required|string',
                'prices' => 'nullable|array',
                'prices.*.price' => 'nullable|integer',
                'prices.*.discount' => 'nullable|integer|min:0|max:100',
                'prices.*.price_after' => 'nullable|integer',
            ]);
        } elseif ($request->package_type === 'Custom') {
            $request->validate([
                'custom_spec.max_io' => 'required|string',
                'custom_spec.nproc' => 'required|string',
                'custom_spec.entry_process' => 'required|string',
                'custom_spec.ssl' => 'required|string',
                'custom_spec.backup' => 'required|string',
                'custom_spec.max_database' => 'required|string',
                'custom_spec.max_bandwidth' => 'required|string',
                'custom_spec.max_email_account' => 'required|string',
                'custom_spec.max_ftp_account' => 'required|string',
                'custom_spec.max_domain' => 'required|string',
                'custom_spec.max_addon_domain' => 'required|string',
                'custom_spec.max_parked_domain' => 'required|string',
                'custom_spec.ssh' => 'required|string',
                'custom_spec.free_domain' => 'required|string',
            ]);
        }

        if ($request->package_type === 'Regular') {
            $request->validate([
                'regular_main_spec' => 'nullable|array',
                'regular_main_spec.RAM' => 'nullable|integer',
                'regular_main_spec.storage' => 'nullable|integer',
                'regular_main_spec.CPU' => 'nullable|integer',
            ]);
        } elseif ($request->package_type === 'Custom') {
            $request->validate([
                'custom_main_spec' => 'nullable|array',
                'custom_main_spec.min_RAM' => 'nullable|integer',
                'custom_main_spec.max_RAM' => 'nullable|integer',
                'custom_main_spec.multiplier_RAM' => 'nullable|integer',
                'custom_main_spec.price_RAM' => 'nullable|integer',
                'custom_main_spec.min_storage' => 'nullable|integer',
                'custom_main_spec.max_storage' => 'nullable|integer',
                'custom_main_spec.step_storage' => 'nullable|integer',
                'custom_main_spec.price_storage' => 'nullable|integer',
                'custom_main_spec.min_CPU' => 'nullable|integer',
                'custom_main_spec.max_CPU' => 'nullable|integer',
                'custom_main_spec.multiplier_CPU' => 'nullable|integer',
                'custom_main_spec.price_CPU' => 'nullable|integer',
            ]);
        }

        // Find the hosting plan by ID
        $hostingPlan = HostingPlan::findOrFail($id);
        // $hostingPlan->update($request->all());

        // Update the hosting plan with the request data
        $hostingPlan->update([
            'name' => $request->name,
            'hosting_group_id' => $request->hosting_group_id,
            'product_type' => $request->product_type,
            'package_type' => $request->package_type,
            'description' => $request->description,
            'best_seller' => $request->input('best_seller')
        ]);

        if ($request->package_type === 'Regular') {
            $hostingPlan->update([
                'max_io' => $request->input('regular_spec.max_io'),
                'nproc' => $request->input('regular_spec.nproc'),
                'entry_process' => $request->input('regular_spec.entry_process'),
                'ssl' => $request->input('regular_spec.ssl'),
                'backup' => $request->input('regular_spec.backup'),
                'max_database' => $request->input('regular_spec.max_database'),
                'max_bandwidth' => $request->input('regular_spec.max_bandwidth'),
                'max_email_account' => $request->input('regular_spec.max_email_account'),
                'max_ftp_account' => $request->input('regular_spec.max_ftp_account'),
                'max_domain' => $request->input('regular_spec.max_domain'),
                'max_addon_domain' => $request->input('regular_spec.max_addon_domain'),
                'max_parked_domain' => $request->input('regular_spec.max_parked_domain'),
                'ssh' => $request->input('regular_spec.ssh'),
                'free_domain' => $request->input('regular_spec.free_domain'),
            ]);
        } elseif ($request->package_type === 'Custom') {
            $hostingPlan->update([
                'max_io' => $request->input('custom_spec.max_io'),
                'nproc' => $request->input('custom_spec.nproc'),
                'entry_process' => $request->input('custom_spec.entry_process'),
                'ssl' => $request->input('custom_spec.ssl'),
                'backup' => $request->input('custom_spec.backup'),
                'max_database' => $request->input('custom_spec.max_database'),
                'max_bandwidth' => $request->input('custom_spec.max_bandwidth'),
                'max_email_account' => $request->input('custom_spec.max_email_account'),
                'max_ftp_account' => $request->input('custom_spec.max_ftp_account'),
                'max_domain' => $request->input('custom_spec.max_domain'),
                'max_addon_domain' => $request->input('custom_spec.max_addon_domain'),
                'max_parked_domain' => $request->input('custom_spec.max_parked_domain'),
                'ssh' => $request->input('custom_spec.ssh'),
                'free_domain' => $request->input('custom_spec.free_domain'),
            ]);
        }

        // Handle the prices update or create
        if (is_array($request->prices)) {
            foreach ($request->prices as $duration => $priceData) {
                Price::updateOrCreate(
                    [
                        'hosting_plans_id' => $hostingPlan->hosting_plans_id,
                        'duration' => $duration,
                    ],
                    [
                        'price' => $priceData['price'] ?? 0,
                        'discount' => $priceData['discount'] ?? 0,
                        'price_after' => $priceData['price_after'] ?? 0,
                    ]
                );
            }
        }

        if ($request->package_type === 'Regular') {
            // Proses untuk tipe Regular
            $regularSpec = RegularMainSpec::updateOrCreate(
                ['hosting_plans_id' => $hostingPlan->hosting_plans_id],
                [
                    'RAM' => $request->input('regular_main_spec.RAM', 0),
                    'storage' => $request->input('regular_main_spec.storage', 0),
                    'CPU' => $request->input('regular_main_spec.CPU', 0),
                ]
            );
        } elseif ($request->package_type === 'Custom') {
            // Proses untuk tipe Custom
            $customSpec = CustomMainSpec::updateOrCreate(
                ['hosting_plans_id' => $hostingPlan->hosting_plans_id],
                [
                    'min_RAM' => $request->input('custom_main_spec.min_RAM', 0),
                    'max_RAM' => $request->input('custom_main_spec.max_RAM', 0),
                    'multiplier_RAM' => $request->input('custom_main_spec.multiplier_RAM', 0),
                    'price_RAM' => $request->input('custom_main_spec.price_RAM', 0),
                    'min_storage' => $request->input('custom_main_spec.min_storage', 0),
                    'max_storage' => $request->input('custom_main_spec.max_storage', 0),
                    'step_storage' => $request->input('custom_main_spec.step_storage', 0),
                    'price_storage' => $request->input('custom_main_spec.price_storage', 0),
                    'min_CPU' => $request->input('custom_main_spec.min_CPU', 0),
                    'max_CPU' => $request->input('custom_main_spec.max_CPU', 0),
                    'multiplier_CPU' => $request->input('custom_main_spec.multiplier_CPU', 0),
                    'price_CPU' => $request->input('custom_main_spec.price_CPU', 0),
                ]
            );
        }


        // Redirect or return a response
        return redirect()->route('hosting-plans.index')->with('success', 'Hosting Plan updated successfully.');
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
