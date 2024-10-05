<?php

namespace App\Http\Controllers;

use App\Models\CustomMainSpec;
use App\Models\HostingPlan;
use Illuminate\Http\Request;

class CustomMainSpecController extends Controller
{
    public function index()
    {
        // Mendapatkan semua data CustomMainSpec beserta relasi hostingPlan
        $customMainSpecs = CustomMainSpec::with('hostingPlan')->get();

        return view('app.admin.hosting-plans.index', ['customMainSpecs' => $customMainSpecs]);

    }

    public function create()
    {
        // Mendapatkan semua HostingPlan untuk dropdown pilihan di form create
        $hostingPlans = HostingPlan::all();
        return view('custom-main-spec.create', compact('hostingPlans'));
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'hosting_plans_id' => 'required|exists:hosting_plans,hosting_plans_id',
            'min_RAM' => 'required|integer|min:1',
            'max_RAM' => 'required|integer|min:1',
            'multiplier_RAM' => 'required|numeric|min:1',
            'price_RAM' => 'required|numeric|min:0',
            'min_storage' => 'required|integer|min:1',
            'max_storage' => 'required|integer|min:1',
            'multiplier_storage' => 'required|numeric|min:1',
            'price_storage' => 'required|numeric|min:0',
            'min_CPU' => 'required|integer|min:1',
            'max_CPU' => 'required|integer|min:1',
            'step_CPU' => 'required|numeric|min:1',
            'price_CPU' => 'required|numeric|min:0',
        ]);

        // Menyimpan data CustomMainSpec baru ke database
        CustomMainSpec::create($request->all());

        return redirect()->route('custom-main-spec.index')->with('success', 'Custom Main Spec created successfully.');
    }

    public function show($id)
    {
        // Menampilkan detail CustomMainSpec berdasarkan ID
        $customMainSpec = CustomMainSpec::with('hostingPlan')->findOrFail($id);
        return view('custom-main-spec.show', compact('customMainSpec'));
    }

    public function edit($id)
    {
        // Mendapatkan data CustomMainSpec berdasarkan ID untuk form edit
        $customMainSpec = CustomMainSpec::findOrFail($id);
        $hostingPlans = HostingPlan::all(); // Untuk dropdown pilihan hosting plan

        return view('custom-main-spec.edit', compact('customMainSpec', 'hostingPlans'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input dari form edit
        $request->validate([
            'hosting_plans_id' => 'required|exists:hosting_plans,hosting_plans_id',
            'min_RAM' => 'required|integer|min:1',
            'max_RAM' => 'required|integer|min:1',
            'multiplier_RAM' => 'required|numeric|min:1',
            'price_RAM' => 'required|numeric|min:0',
            'min_storage' => 'required|integer|min:1',
            'max_storage' => 'required|integer|min:1',
            'multiplier_storage' => 'required|numeric|min:1',
            'price_storage' => 'required|numeric|min:0',
            'min_CPU' => 'required|integer|min:1',
            'max_CPU' => 'required|integer|min:1',
            'step_CPU' => 'required|numeric|min:1',
            'price_CPU' => 'required|numeric|min:0',
        ]);

        // Update data CustomMainSpec
        $customMainSpec = CustomMainSpec::findOrFail($id);
        $customMainSpec->update($request->all());

        return redirect()->route('custom-main-spec.index')->with('success', 'Custom Main Spec updated successfully.');
    }

    public function destroy($id)
    {
        // Hapus data CustomMainSpec berdasarkan ID
        $customMainSpec = CustomMainSpec::findOrFail($id);
        $customMainSpec->delete();

        return redirect()->route('custom-main-spec.index')->with('success', 'Custom Main Spec deleted successfully.');
    }
}
