<?php

namespace App\Http\Controllers;

use App\Models\RegularMainSpec;
use App\Models\HostingPlan;
use Illuminate\Http\Request;

class RegularMainSpecController extends Controller
{
    public function index()
    {
        // Mendapatkan semua data RegularMainSpec
        $regularMainSpecs = RegularMainSpec::with('hostingPlan')->get();
        return view('app.admin.hosting-plans.index', ['regularMainSpecs' => $regularMainSpecs]);

    }

    public function create()
    {
        // Mendapatkan semua HostingPlan untuk dropdown pilihan di form create
        $hostingPlans = HostingPlan::all();
        return view('regular-main-spec.create', compact('hostingPlans'));
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'hosting_plans_id' => 'required|exists:hosting_plans,hosting_plans_id',
            'RAM' => 'nullable|integer|min:0', // Ubah menjadi nullable
            'storage' => 'nullable|integer|min:0', // Ubah menjadi nullable
            'CPU' => 'nullable|integer|min:0', // Ubah menjadi nullable
        ]);
    
        // Menyimpan data RegularMainSpec baru ke database
        $regularMainSpec = RegularMainSpec::create([
            'hosting_plans_id' => $request->hosting_plans_id,
            'RAM' => $request->RAM ?? 0, // Set default 0 jika tidak ada
            'storage' => $request->storage ?? 0, // Set default 0 jika tidak ada
            'CPU' => $request->CPU ?? 0, // Set default 0 jika tidak ada
        ]);

        // Menyimpan data RegularMainSpec baru ke database
        RegularMainSpec::create($request->all());

        return redirect()->route('hosting-plans.edit')->with('success', 'Regular Main Spec created successfully.');
    }

    public function show($id)
    {
        // Menampilkan detail RegularMainSpec berdasarkan ID
        $regularMainSpec = RegularMainSpec::with('hostingPlan')->findOrFail($id);
        return view('regular-main-spec.show', compact('regularMainSpec'));
    }

    public function edit($id)
    {
        // Mendapatkan data RegularMainSpec berdasarkan ID untuk form edit
        $regularMainSpec = RegularMainSpec::findOrFail($id);
        $hostingPlans = HostingPlan::all(); // Untuk dropdown pilihan hosting plan

        return view('regular-main-spec.edit', compact('regularMainSpec', 'hostingPlans'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input dari form edit
        $request->validate([
            'hosting_plans_id' => 'required|exists:hosting_plans,hosting_plans_id',
            'RAM' => 'required|integer|min:1',
            'storage' => 'required|integer|min:1',
            'CPU' => 'required|integer|min:1',
        ]);

        // Update data RegularMainSpec
        $regularMainSpec = RegularMainSpec::findOrFail($id);
        $regularMainSpec->update($request->all());

        return redirect()->route('regular-main-spec.index')->with('success', 'Regular Main Spec updated successfully.');
    }

    public function destroy($id)
    {
        // Hapus data RegularMainSpec berdasarkan ID
        $regularMainSpec = RegularMainSpec::findOrFail($id);
        $regularMainSpec->delete();

        return redirect()->route('regular-main-spec.index')->with('success', 'Regular Main Spec deleted successfully.');
    }
}
