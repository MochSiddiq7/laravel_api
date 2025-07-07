@extends('layouts.admin')

@section('title', 'Edit Varian')

@section('content')
    <div class="container mt-4">
        <h2>Edit Varian Produk</h2>

        <form action="{{ route('admin.variants.update', $variant->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama Varian</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $variant->name }}" required>
            </div>

            <div class="form-group">
                <label for="stock">Stok</label>
                <input type="number" name="stock" id="stock" class="form-control" value="{{ $variant->stock }}" min="0"
                    required>
            </div>

            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Kembali ke Produk</a>
        </form>
    </div>
@endsection