<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>keto</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Local Bootstrap fallback (optional) -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

    <!-- Fancybox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

    <style>
        /* Navbar link animation on hover */
        .navbar-nav .nav-item {
            position: relative;
            overflow: hidden;
        }

        .navbar-nav .nav-item .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-item .nav-link::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            background-color: #ff5733; /* Animation color */
            left: 0;
            bottom: 0;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .navbar-nav .nav-item:hover .nav-link::after {
            transform: translateX(0);
        }

        /* Navbar link color change when clicked */
        .navbar-nav .nav-item .nav-link.clicked {
            color: #ff5733; /* Color after clicked */
        }
    </style>
</head>

<body class="main-layout">
    <!-- Loader -->
    <div class="loader_bg">
        <img src="{{ asset('images/loading.gif') }}" alt="Loading..." />
    </div>
    <!-- End loader -->

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

    <!-- Content -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class=" col-md-4">
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
                                    © 2024 All Rights Reserved. Design by <a href="https://html.design/"> Mahasiswa Umsida</a>
                                    <br><br>
                                    Distributed by <a href="https://themewagon.com/" target="_blank">Deky Rifandi</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer -->

    <!-- jQuery (local or CDN) -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Optional Bootstrap JS and jQuery -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
