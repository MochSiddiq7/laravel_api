<?php

// app/Http/Controllers/UserDashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        // Menampilkan view dashboard untuk user
        return view('user_dashboard');
    }
}
