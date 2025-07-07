<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .profile-container {
            max-width: 1000px;
            margin: 40px auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #ff6600;
            padding-bottom: 20px;
        }

        .profile-header img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid #ff6600;
            padding: 3px;
            margin-right: 25px;
        }

        .profile-header h2 {
            margin: 0;
            font-size: 32px;
            font-weight: 600;
            color: #333;
        }

        .table-container {
            margin-top: 40px;
        }

        .table {
            font-size: 16px;
            color: #555;
            width: 100%;
            table-layout: auto;
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
            padding: 12px;
        }

        .table th {
            background-color: #ff6600;
            color: #fff;
            font-weight: 600;
        }

        .table-striped tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .table-bordered {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }

        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #ff6600;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
        }

        .btn-back:hover {
            background-color: #e65c00;
        }

        /* Make the table scrollable for smaller screens */
        .table-responsive {
            overflow-x: auto;
        }

        /* Additional styles for color coding status */
        .status-pending {
            background-color: #ffcc00;
            /* Yellow for pending */
            color: #fff;
        }

        .status-completed {
            background-color: #28a745;
            /* Green for completed */
            color: #fff;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <!-- Logo Section -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/1.png') }}" alt="MyApp Logo" width="150" height="150">
            </a>

            <!-- Navbar Toggler for Mobile -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('booking') }}">Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('review') }}">Review</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <!-- Logout Form -->
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link" style="cursor: pointer;">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="profile-container">
        <div class="profile-header">
            <!-- Display user profile image (using default image) -->
            <img src="{{ asset('images/profile.jpg') }}" alt="Profile Image">
            <h2>Welcome, {{ auth()->user()->nama }}!</h2> <!-- Display logged-in user name -->
        </div>

        <div class="table-container">
            <!-- Make the table scrollable on smaller screens -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Service</th>
                            <th>Varian Produk</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Harga</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $paketHarga = [
                                'Paket A' => 85000,
                                'Paket B' => 110000,
                                'Paket C' => 160000,
                            ];
                        @endphp
                        @php
                            $paketDescriptions = [
                                'Paket A' => '
                                                                                            <ul class="mb-0 text-start">
                                                                                                <li>CVT Cleaning</li>
                                                                                                <li>Injection Cleaner</li>
                                                                                            </ul>',
                                'Paket B' => '
                                                                                            <ul class="mb-0 text-start">
                                                                                                <li>CVT Cleaning</li>
                                                                                                <li>Injection Cleaner</li>
                                                                                                <li>Oli Gearbox</li>
                                                                                            </ul>',
                                'Paket C' => '
                                                                                            <ul class="mb-0 text-start">
                                                                                                <li>CVT Cleaning</li>
                                                                                                <li>Injection Cleaner</li>
                                                                                                <li>Oli Gearbox</li>
                                                                                                <li>Throttle Cleaning</li>
                                                                                                <li>Oil Filter</li>
                                                                                            </ul>',
                            ];

                        @endphp

                        @forelse ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->id_booking }}</td>
                                <td>
                                    <strong>{{ $booking->paket_service }}</strong><br>
                                    {!! $paketDescriptions[$booking->paket_service] ?? 'Tidak ada pemesanan paket servis.' !!}
                                </td>

                                <td>
                                    @if ($booking->variants->count() > 0)
                                        <ul class="list-unstyled mb-0 text-start">
                                            @foreach ($booking->variants as $variant)
                                                <li>
                                                    <strong>{{ $variant->name }}</strong> -
                                                    Produk: <em>{{ $variant->product->title ?? '-' }}</em> <br>
                                                    Harga: <span
                                                        class="text-success">Rp{{ number_format($variant->price, 0, ',', '.') }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        Tidak ada pemesanan produk/varian
                                    @endif
                                </td>
                                <td>{{ $booking->jam_service }}</td>
                                <td class="{{ $booking->status == 'Selesai' ? 'status-completed' : 'status-pending' }}">
                                    {{ $booking->status }}
                                </td>
                                <td>
                                    @php
                                        $hargaPaket = $paketHarga[$booking->paket_service] ?? 0;
                                        $hargaVarian = $booking->variants->sum('price');
                                        $totalHarga = $hargaPaket + $hargaVarian;
                                    @endphp

                                    <strong>Rp{{ number_format($totalHarga, 0, ',', '.') }}</strong><br>
                                    <small class="text-muted">
                                        (Paket: Rp{{ number_format($hargaPaket, 0, ',', '.') }},
                                        Produk: Rp{{ number_format($hargaVarian, 0, ',', '.') }})
                                    </small>
                                </td>
                                <td>{{ $booking->keterangan }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Tidak ada data booking</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>

        <a href="{{ auth()->user()->hasRole('admin') ? route('admin.dashboard') : route('user.dashboard') }}"
            class="btn-back">Back to Dashboard</a>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>


    <!-- Footer -->
    <footer class="footer" style="background-color: black; color: white;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>Contact US</h3>
                    <ul class="conta">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> FPR7+4H4, Jl. Anggur, Kalitengah, Kec.
                            Tanggulangin, Kabupaten Sidoarjo, Jawa Timur 61272</li>
                        <li><i class="fa fa-mobile" aria-hidden="true"></i> 0896-1083-4267</li>
                        <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#"> sprjm90@gmail.com</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Menu Link</h3>
                    <ul class="link_menu">
                        <li class="nav-item {{ Request::routeIs('user.dashboard') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item {{ Request::routeIs('booking') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('booking') }}">Booking</a>
                        </li>
                        <li class="nav-item {{ Request::routeIs('review') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('review') }}">Review</a>
                        </li>
                        <li class="nav-item {{ Request::routeIs('profile') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('profile') }}">Profile</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Our Social Media </h3>
                    <ul class="social_icon">
                        <li><a href="https://www.instagram.com/srjm_team/"><i class="fa fa-instagram"
                                    aria-hidden="true">@srjm_team</i></a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <p>
                                © 2024 All Rights Reserved. Design by <a href="https://html.design/"> Mahasiswa
                                    Umsida</a>
                                <br><br>
                                Distributed by <a href="https://themewagon.com/" target="_blank">Deky Rifandi</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- jQuery (local or CDN) -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Optional Bootstrap JS and jQuery -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

</body>

</html>