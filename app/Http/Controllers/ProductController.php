<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Product;
=======
>>>>>>> 57f2d7277b8d0952113036ba683daf36e0167099
use Illuminate\Http\Request;

class ProductController extends Controller
{
<<<<<<< HEAD
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // Validasi input
        $validated = $request->validate([
            // Definisikan aturan validasi sesuai kebutuhan
        ]);

        // Update produk
        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
=======
    function index(){
        return view('app.hosting-plans.products.index');
>>>>>>> 57f2d7277b8d0952113036ba683daf36e0167099
    }
}
