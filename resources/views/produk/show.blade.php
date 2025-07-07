@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-3">{{ $product->title }}</h1>
        <p>{{ $product->description }}</p>

        <hr>

        @if ($product->variants->isNotEmpty())
            <h4>Varian Produk</h4>
            <div class="row">
                @foreach ($product->variants as $variant)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm product-card">
                            <img src="{{ asset($variant->image) }}" class="card-img-top product-image" alt="{{ $variant->name }}">
                            <div class="card-body">
                                <h5 class="card-title"><strong>{{ $variant->name }}</strong></h5>
                                <p class="card-text">{{ $variant->description }}</p>
                                <p class="card-text text-success fw-bold">
                                    Rp {{ number_format($variant->price, 0, ',', '.') }}
                                </p>
                                @php
                                    $stock = $variant->stock ?? 0;
                                @endphp

                                <div class="border rounded text-center py-2 mt-2" style="font-weight: bold; color: #333;">
                                    <i class="bi bi-box-seam me-1"></i> Stok: {{ $stock }}
                                </div>

                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        @else
            <p><em>Belum ada varian untuk produk ini.</em></p>
        @endif

        <a href="{{ url('/user/dashboard') }}" class="btn btn-secondary mt-4">← Kembali ke Katalog</a>
    </div>
@endsection