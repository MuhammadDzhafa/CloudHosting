<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    // Display a listing of the prices
    public function index()
    {
        $prices = Price::withTrashed()->get(); // Include soft deleted records
        return view('prices.index', compact('prices'));
    }

    // Show the form for creating a new price
    public function create()
    {
        return view('prices.create');
    }

    // Store a newly created price in storage
    public function store(Request $request)
    {
        $request->validate([
            'price' => 'required|integer',
            'discount' => 'nullable|integer',
            'price_after' => 'required|integer',
            'hosting_plans_id' => 'required|exists:hosting_plans,hostingplan_id',
            'duration' => 'required|string',
        ]);

        Price::create($request->all());

        return redirect()->route('prices.index')->with('success', 'Price created successfully.');
    }

    // Show the form for editing the specified price
    public function edit(Price $price)
    {
        return view('prices.edit', compact('price'));
    }

    // Update the specified price in storage
    public function update(Request $request, Price $price)
    {
        $request->validate([
            'price' => 'required|integer',
            'discount' => 'nullable|integer',
            'price_after' => 'required|integer',
            'hosting_plans_id' => 'required|exists:hosting_plans,hostingplan_id',
            'duration' => 'required|string'
        ]);

        $price->update($request->all());

        return redirect()->route('prices.index')->with('success', 'Price updated successfully.');
    }

    // Remove the specified price from storage (soft delete)
    public function destroy(Price $price)
    {
        $price->delete(); // Soft delete the price record

        return response()->json(['success' => true]);
    }

    // Restore a soft deleted price
    public function restore($id)
    {
        $price = Price::withTrashed()->findOrFail($id);
        $price->restore(); // Restore the price record

        return redirect()->route('prices.index')->with('success', 'Price restored successfully.');
    }
}
