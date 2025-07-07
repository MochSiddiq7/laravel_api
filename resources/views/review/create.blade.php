@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Review Form</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="form-container">
            <form method="POST" action="{{ route('review.store') }}">
                @csrf

                <!-- Technician's Name -->
                <div class="mb-3">
                    <label for="namaTeknisi" class="form-label">Nama Teknisi</label>
                    <input type="text" class="form-control" id="namaTeknisi" name="namaTeknisi"
                        placeholder="Enter technician's name" required>
                </div>

                <!-- Star Rating -->
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <div class="stars">
                        @for($i = 1; $i <= 5; $i++)
                            <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}">
                            <label for="star{{ $i }}">★</label>
                        @endfor
                    </div>
                </div>

                <!-- Complaint -->
                <div class="mb-3">
                    <label for="keluhan" class="form-label">Keluhan</label>
                    <textarea class="form-control" id="keluhan" name="keluhan" rows="4" placeholder="Enter your complaint"
                        required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit Review</button>
            </form>
        </div>
    </div>
@endsection