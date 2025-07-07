@extends('layouts.admin')

@section('title', 'Data Review')

@section('content')
    <div class="container mt-4">
        <h2>Data Review</h2>

        <table class="table table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Keluhan</th>
                    <th>Bintang</th>
                    <th>Nama Teknisi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reviews as $index => $review)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $review->keluhan }}</td>
                        <td 
                            class="
                                @if($review->bintang <= 2)
                                    text-white bg-danger
                                @elseif($review->bintang == 3)
                                    text-dark bg-warning
                                @else
                                    text-white bg-success
                                @endif
                            "
                        >
                            {{ $review->bintang }}
                        </td>
                        <td>{{ $review->nama_teknisi }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data review.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
