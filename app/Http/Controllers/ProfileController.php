<?php

// app/Http/Controllers/ProfileController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class ProfileController extends Controller
{
    public function show()
    {
        // Ambil booking beserta varian-nya
        $bookings = Booking::with('variants.product')->where('user_id', auth()->id())->get();


        return view('profile', compact('bookings'));
    }

}


