@extends('layouts.admin')
@section('title', 'Kelola Produk')

@section('content')
    <div class="container mt-4">
        <h2>Kelola Produk & Variannya</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @foreach ($products as $product)
            <div class="card mb-4">
                <div class="card-header">
                    <strong>{{ $product->title }}</strong>
                    <a href="{{ route('admin.products.edit', $product->id) }}"
                        class="btn btn-sm btn-warning float-right ml-2">Edit Produk</a>
                </div>
                <div class="card-body">
                    <p>{{ $product->description }}</p>
                    <h5>Varian:</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Varian</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product->variants as $variant)
                                <tr>
                                    <td>{{ $variant->name }}</td>
                                    <td>{{ $variant->stock }}</td>
                                    <td>
                                        <a href="{{ route('admin.variants.edit', $variant->id) }}"
                                            class="btn btn-sm btn-primary">Edit Varian</a>
                                    </td>
                                </tr>
                            @endforeach
                            @if($product->variants->isEmpty())
                                <tr>
                                    <td colspan="3">Tidak ada varian.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
@endsection