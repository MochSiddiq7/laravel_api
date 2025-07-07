@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
    <div class="container mt-4">
        <h2>Edit Produk</h2>

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Nama Produk</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $product->title }}" required>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" rows="4"
                    required>{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="stock">Total Stok (opsional)</label>
                <input type="number" name="stock" id="stock" class="form-control" value="{{ $product->stock }}" min="0">
            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Kembali</a>
        </form>

        <hr>
        <h4>Daftar Varian Produk</h4>
        <ul class="list-group">
            @foreach ($product->variants as $variant)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $variant->name }} (Stok: {{ $variant->stock }})
                    <a href="{{ route('admin.variants.edit', $variant->id) }}" class="btn btn-sm btn-primary">Edit Varian</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection