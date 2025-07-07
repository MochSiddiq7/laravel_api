<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Review;
use App\Models\User;

class AdminController extends Controller
{
    public function index() 
    {
        // This could be your dashboard logic or a simple redirect to the dashboard method
        return redirect()->route('admin.dashboard');
    }

    public function dashboard()
    {
        // Check if the user is logged in and has admin role
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('login')->withErrors(['email' => 'You are not authorized to access the admin dashboard.']);
        }

        // Fetch data for bookings, reviews, and users
        $bookings = Booking::all();
        $reviews = Review::all();
        $users = User::all();

        // Return the view with the necessary data
        return view('admin.dashboard', compact('bookings', 'reviews', 'users'));
    }
}
