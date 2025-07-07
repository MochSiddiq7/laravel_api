@extends('layouts.admin')

@section('title', 'Daftar Booking')

@section('content')
    <div class="container mt-4">
        <h2>Daftar Booking</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tipe Motor</th>
                    <th>Plat Nomor</th>
                    <th>Jam Booking</th>
                    <th>Paket Servis</th>
                    <th>Nama Teknisi</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Harga Total</th>
                    <th>Email Pembooking</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id_booking }}</td>
                        <td>{{ $booking->tipe_motor }}</td>
                        <td>{{ $booking->plat_motor }}</td>
                        <td>{{ $booking->jam_service }}</td>
                        <td>{{ $booking->paket_service ?? '-' }}</td>
                        <td>{{ $booking->nama_teknisi }}</td>
                        <td>{{ $booking->status }}</td>
                        <td>{{ $booking->keterangan }}</td>

                        <td>
                            @php
                                // Ambil dari controller jika disediakan
                                $hargaPaket = $paketHarga[$booking->paket_service] ?? 0;
                                $hargaVarian = $booking->variants->sum('price');
                                $totalHarga = $hargaPaket + $hargaVarian;
                            @endphp

                            <strong>Rp{{ number_format($totalHarga, 0, ',', '.') }}</strong><br>
                            <small class="text-muted">
                                (Paket: Rp{{ number_format($hargaPaket, 0, ',', '.') }},
                                Produk: Rp{{ number_format($hargaVarian, 0, ',', '.') }})
                            </small>

                            @if($booking->variants->count())
                                <ul class="mt-2 ps-3 text-start">
                                    @foreach($booking->variants as $variant)
                                        <li>
                                            <strong>{{ $variant->name }}</strong>
                                            <br>Produk: <em>{{ $variant->product->title ?? '-' }}</em>
                                            <br>Harga: Rp{{ number_format($variant->price, 0, ',', '.') }}
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="text-muted"><em>Tidak ada varian produk</em></div>
                            @endif
                        </td>

                        <td>{{ $booking->user->email ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.booking.edit', $booking->id_booking) }}"
                                class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.booking.delete', $booking->id_booking) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="text-center">Tidak ada data booking.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection