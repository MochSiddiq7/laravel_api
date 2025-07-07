<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Variant;
use App\Models\Product;

class BookingController extends Controller
{
    public function profile()
    {
        $bookings = Booking::with(['variants.product'])
            ->where('user_id', auth()->id())
            ->get();

        // Kirim harga paket ke view
        $paketHarga = [
            'Paket A' => 85000,
            'Paket B' => 110000,
            'Paket C' => 160000,
        ];

        return view('user.profile', compact('bookings', 'paketHarga'));
    }

    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $products = Product::all();
        $variants = [];

        return view('user.booking.create', compact('products', 'variants'));
    }

    public function store(Request $request)
    {
        // Definisikan harga paket
        $paketHarga = [
            'Paket A' => 85000,
            'Paket B' => 110000,
            'Paket C' => 160000,
        ];
    
        // Ambil harga paket dari input user (jika tidak ada, dianggap 0)
        $hargaPaket = $paketHarga[$request->paketServis] ?? 0;
    
        // 🔍 DEBUG di sini!
       
    
        // Total harga varian produk
        $totalHargaVarian = 0;
        if ($request->has('variant_ids')) {
            foreach ($request->variant_ids as $variantId) {
                $variant = Variant::find($variantId);
                if ($variant) {
                    $totalHargaVarian += $variant->price;
                }
            }
        }
    
        // Total keseluruhan
        $totalHarga = $hargaPaket + $totalHargaVarian;
    
        // Validasi, simpan booking, dll...
    
    
        $request->validate([
            'tipeMotor' => 'required|string',
            'platNomor' => 'required|string',
            'jamBooking' => 'required|date',
            'paketServis' => 'nullable|string',
            'namaTeknisi' => 'required|string',
            'variant_ids' => 'array',
            'variant_ids.*' => 'exists:variants,id',
        ]);

        $booking = Booking::create([
            'tipe_motor' => $request->tipeMotor,
            'plat_motor' => $request->platNomor,
            'jam_service' => $request->jamBooking,
            'paket_service' => $request->paketServis,
            'nama_teknisi' => $request->namaTeknisi,
            'status' => 'pending',
            'user_id' => auth()->id(),
            'keterangan' => $request->keterangan,
            'harga' => $totalHarga,
        ]);

        if ($request->has('variant_ids')) {
            foreach ($request->variant_ids as $variantId) {
                $variant = Variant::find($variantId);
                if (!$variant || $variant->stock <= 0) {
                    return back()->with('error', 'Stok varian tidak mencukupi atau tidak ditemukan.');
                }

                $variant->decrement('stock');
                $booking->variants()->attach($variant->id);
            }
        }

        return redirect()->route('booking')->with('success', 'Booking berhasil!');
    }

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $bookings = Booking::with(['user', 'variants'])->get();

        // ⬅️ Tambahkan ini
        $paketHarga = [
            'Paket A' => 85000,
            'Paket B' => 110000,
            'Paket C' => 160000,
        ];

        return view('admin.booking.index', compact('bookings', 'paketHarga'));
    }



    public function edit($id_booking)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $booking = Booking::where('id_booking', $id_booking)->firstOrFail();
        return view('admin.booking.edit', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $hargaBersih = preg_replace('/[^\d]/', '', $request->input('harga'));
        $booking->harga = (int) $hargaBersih;

        $booking->status = $request->input('status');
        $booking->keterangan = $request->input('keterangan');
        $booking->save();

        return redirect()->route('admin.booking.index')->with('success', 'Status booking berhasil diperbarui!');
    }

    public function destroy($id_booking)
    {
        $booking = Booking::where('id_booking', $id_booking)->firstOrFail();
        $booking->delete();

        return redirect()->route('admin.booking.index')->with('success', 'Booking berhasil dihapus');
    }
}
