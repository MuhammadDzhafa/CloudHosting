<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('products.index');
    }

    public function create(){
        return view('products.create');
    }

    
    public function createGroup(){
        return view('groups.create');
    }
    // public function edit(Product $product)
    // {
    //     return view('products.edit', compact('product'));
    // }

    public function update(Request $request, Product $product)
    {
        // Validasi input
        $validated = $request->validate([
            // Definisikan aturan validasi sesuai kebutuhan
        ]);

        // Update produk
        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }
}
