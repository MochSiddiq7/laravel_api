<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input email dan password
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba login menggunakan Auth::attempt()
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Ambil user yang login

            // Redirect berdasarkan role pengguna
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('user.dashboard');
        }

        // Jika login gagal
        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        // Buat user baru
        User::create([
            'nama' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'alamat' => $request->address,
            'no_telp' => $request->phone,
            'role' => 'user', // Default role
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

}
