<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking; // Tambahkan jika ada model form_booking
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan daftar user
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.user.index', compact('users'));
    }

    // Form edit user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    // Update data user
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->email = $request->email;

        // Hanya update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'User berhasil diperbarui.');
    }

    // Hapus user
// Jangan lupa import model FormBooking di atas:
// use App\Models\FormBooking;

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'admin') {
            return redirect()->route('admin.user.index')->with('error', 'Tidak dapat menghapus akun admin.');
        }

        // Cek apakah user masih punya booking
        $bookingCount = Booking::where('user_id', $user->id_user)->count();


        if ($bookingCount > 0) {
            return redirect()->route('admin.user.index')
                ->with('error', 'User memiliki booking terkait. Harap hapus booking terlebih dahulu sebelum menghapus user.');
        }

        // Jika tidak ada booking, hapus user
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus.');
    }



}
