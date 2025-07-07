<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Status Booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            padding: 50px;
        }

        .card {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .btn {
            min-width: 120px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Edit Status Booking</h4>
                    </div>
                    <div class="card-body">

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Periksa kembali inputan:</strong>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.booking.update', $booking->id_booking) }}"
                            onsubmit="return confirm('Yakin ingin memperbarui status booking ini?');">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label"><strong>Motor</strong></label>
                                <input type="text" class="form-control" value="{{ $booking->tipe_motor }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><strong>Plat</strong></label>
                                <input type="text" class="form-control" value="{{ $booking->plat_motor }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><strong>Harga</strong></label>
                                <input type="text" name="harga" class="form-control" value="Rp. {{ $booking->harga }}"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><strong>Status</strong></label>
                                <select name="status" class="form-select" required>
                                    <option value="Menunggu" {{ $booking->status == 'Menunggu' ? 'selected' : '' }}>
                                        Menunggu</option>
                                    <option value="Sedang Dikerjakan" {{ $booking->status == 'Sedang Dikerjakan' ? 'selected' : '' }}>Sedang Dikerjakan</option>
                                    <option value="Selesai" {{ $booking->status == 'Selesai' ? 'selected' : '' }}>Selesai
                                    </option>
                                    <option value="Batal" {{ $booking->status == 'Batal' ? 'selected' : '' }}>Batal
                                    </option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label"><strong>Keterangan</strong></label>
                                <textarea name="keterangan" class="form-control"
                                    rows="3">{{ $booking->keterangan }}</textarea>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.booking.index') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Update Status</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional Bootstrap JS Bundle (if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>