<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Variant;

class VariantController extends Controller
{
    public function getVariants($productId)
    {
        // Ambil semua varian berdasarkan product_id
        $variants = \App\Models\Variant::where('product_id', $productId)->get();
    
        // Ubah jadi array agar JS bisa akses dengan mudah
        $result = $variants->map(function ($variant) {
            return [
                'id' => $variant->id,
                'name' => $variant->name,
                'stock' => $variant->stock,
            ];
        });
    
        return response()->json($result);
    }
        public function edit($id)
    {
        $variant = Variant::findOrFail($id);
        return view('admin.variant.edit', compact('variant'));
    }


    public function update(Request $request, $id)
    {
        $variant = \App\Models\Variant::findOrFail($id);
        $variant->update([
            'name' => $request->name,
            'stock' => $request->stock,
        ]);
        return redirect()->route('admin.products.index')->with('success', 'Varian diperbarui.');
    }

}
