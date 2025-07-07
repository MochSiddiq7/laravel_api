<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function create()
    {
        return view('review.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaTeknisi' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'keluhan' => 'required|string',
        ]);

        Review::create([
            'nama_teknisi' => $request->namaTeknisi,
            'bintang' => $request->rating,
            'keluhan' => $request->keluhan,
        ]);

        return redirect()->route('review')->with('success', 'Review berhasil disimpan!');
    }

    public function index()
    {
        $reviews = Review::all();
        return view('admin.review.index', compact('reviews'));
    }
}


