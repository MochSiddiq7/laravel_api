<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string',
            'email'   => 'required|email',
            'phone'   => 'nullable|string',
            'message' => 'required|string',
        ]);

        $details = [
            'title'   => 'Pesan dari Formulir Kontak',
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'message' => $request->message,
        ];

        // Kirim email ke alamat tujuan
        Mail::to('admin@example.com')->send(new \App\Mail\ContactMail($details));

        return back()->with('success', 'Pesan Anda berhasil dikirim!');
    }
}
