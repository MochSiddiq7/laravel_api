@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Review Form</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('review.store') }}">
            @csrf

            <div class="mb-3">
                <label for="namaTeknisi" class="form-label">Nama Teknisi</label>
                <input type="text" class="form-control" id="namaTeknisi" name="namaTeknisi" required>
            </div>

            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <div class="stars">
                    @for($i = 1; $i <= 5; $i++)
                        <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" required>
                        <label for="star{{ $i }}">★</label>
                    @endfor
                </div>
            </div>

            <div class="mb-3">
                <label for="keluhan" class="form-label">Keluhan</label>
                <textarea class="form-control" id="keluhan" name="keluhan" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit Review</button>
        </form>
    </div>
@endsection
