<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function show($slug)
    {
        // Ambil produk berdasarkan slug, dan ambil variannya sekaligus
        $product = Product::with('variants')->where('slug', $slug)->first();

        // Jika tidak ditemukan, tampilkan 404
        if (!$product) {
            abort(404);
        }

        // Tampilkan ke view
        return view('produk.show', compact('product'));
    }
    public function index()
    {
        $products = \App\Models\Product::with('variants')->get();
        return view('admin.product.index', compact('products'));
    }

    public function edit($id)
    {
        $product = \App\Models\Product::with('variants')->findOrFail($id);
        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = \App\Models\Product::findOrFail($id);
        $product->update($request->only(['title', 'description', 'stock'])); // tambah kalau ada
        return redirect()->route('admin.products.index')->with('success', 'Produk diperbarui.');
    }

}


