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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
    media="screen">

  <!-- HTML5 Shiv & Respond.js for IE8 support -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!-- body -->

<body class="main-layout">
  <!-- loader  -->
  <div class="loader_bg">
    <img src="{{ asset('images/loading.gif') }}" alt="Loading..." />
  </div>
  <!-- end loader -->
  <!-- header -->
  <header>
    <!-- header inner -->
    <div class="header">
      <div class="container">
        <div class="row">
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
            <div class="full">
              <div class="center-desk">
                <div class="logo">
                  <div style="position: relative; height: 150px;">
                    <img src="{{ asset('images/1.png') }}" alt="#" width="140" height="1000"
                      style="position: absolute; top: -40px; object-fit: fill;" />
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Navbar -->
          <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

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
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- end header inner -->
  <!-- end header -->
  <!-- banner -->
  <section class="banner_main">
    <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="first-slide" src="{{ asset('images/2.jpg') }}" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="second-slide" src="{{ asset('images/3.jpg') }}" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="third-slide" src="{{ asset('images/4.jpg') }}" alt="Third slide">
        </div>
      </div>
    </div>

    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <div class="booking_ocline">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <div class="book_room text-center">
              <h1>Lakukan Reservasi</h1>
              <p class="mb-3">Klik tombol di bawah untuk melanjutkan ke halaman reservasi servis kendaraan Anda.</p>
              <a href="{{ route('booking') }}" class="btn btn-primary book_btn">Reservasi</a>
            </div>
          </div>
        </div>
      </div>
    </div>




  </section>

  <!-- end banner -->
  <!-- about -->
  <div class="about">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5">
          <div class="titlepage">
            <section id="about-us" style="font-family: Arial, sans-serif; line-height: 1.6; margin: 20px; color: #333;">
              <div
                style="max-width: 800px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border-radius: 20px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                <h2 style="text-align: center; color: #000000; margin-bottom: 15px;">Tentang Kami</h2>
                <p>
                  <strong>Sumber Jaya Rejeki Motor</strong> adalah perusahaan yang bergerak di bidang
                  otomotif, khususnya
                  dalam penjualan,
                  servis, dan penyediaan suku cadang kendaraan bermotor. Kami berkomitmen untuk memberikan
                  pelayanan terbaik
                  kepada pelanggan dengan
                  menghadirkan produk berkualitas tinggi dan layanan yang andal.
                </p>
                <p>
                  Berdiri dengan visi untuk menjadi mitra terpercaya bagi kebutuhan otomotif masyarakat, kami
                  senantiasa
                  menghadirkan
                  solusi yang inovatif, ramah lingkungan, dan sesuai dengan perkembangan teknologi terkini.
                  Dengan tim
                  profesional yang
                  berpengalaman, <strong> Sumber Jaya Rejeki Motor</strong> siap memberikan pengalaman
                  terbaik dalam setiap
                  transaksi dan pelayanan.
                </p>
              </div>
            </section>

          </div>
        </div>
        <div class="col-md-7">
          <div class="about_img">
            <figure><img src="{{ asset('images/5.jpg') }}" /></figure>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end about -->
  <!-- our_room -->
  <div class="our_room">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="titlepage">
            <h2>Produk Kita</h2>
            <p>Berikut merupakan produk yang kami punya</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-6">
          <a href="{{ route('produk.show', ['slug' => 'varian-oli']) }}" style="text-decoration:none; color: inherit;">
            <div id="serv_hover" class="room">
              <div class="room_img">
                <figure><img src="{{ asset('images/11.png') }}" alt="Varian Oli" /></figure>
              </div>
              <div class="bed_room">
                <h3>Varian Oli</h3>
                <p>Oli mesin motor tersedia dalam berbagai jenis, seperti oli mineral, oli semi-sintetik, dan oli
                  sintetik, yang dapat dipilih sesuai dengan kebutuhan mesin motor dan rekomendasi pabrikan.</p>
              </div>
            </div>
          </a>
        </div>

        <div class="col-md-4 col-sm-6">
          <a href="{{ route('produk.show', ['slug' => 'suku-cadang']) }}" style="text-decoration:none; color: inherit;">
            <div id="serv_hover" class="room">
              <div class="room_img">
                <figure><img src="{{ asset('images/18.jpg') }}" alt="Suku Cadang" /></figure>
              </div>
              <div class="bed_room">
                <h3>Suku Cadang</h3>
                <p>Tersedia dalam berbagai merek dan ukuran yang sesuai dengan tipe motor, seperti suku cadang original
                  (OEM) dan suku cadang aftermarket.</p>
              </div>
            </div>
          </a>
        </div>

        <div class="col-md-4 col-sm-6">
          <a href="{{ route('produk.show', ['slug' => 'varian-ban']) }}" style="text-decoration:none; color: inherit;">
            <div id="serv_hover" class="room">
              <div class="room_img">
                <figure><img src="{{ asset('images/13.png') }}" alt="Varian Ban" /></figure>
              </div>
              <div class="bed_room">
                <h3>Varian Ban</h3>
                <p>Tersedia berbagai jenis ban motor, seperti ban tubeless (tanpa ban dalam), ban biasa (dengan ban
                  dalam), serta ban untuk tipe motor tertentu, seperti ban sport, touring, atau ban off-road.</p>
              </div>
            </div>
          </a>
        </div>

        <div class="col-md-4 col-sm-6">
          <a href="{{ route('produk.show', ['slug' => 'aksesoris-motor']) }}"
            style="text-decoration:none; color: inherit;">
            <div id="serv_hover" class="room">
              <div class="room_img">
                <figure><img src="{{ asset('images/14.jpg') }}" alt="Aksesoris Motor" /></figure>
              </div>
              <div class="bed_room">
                <h3>Aksesoris Motor</h3>
                <p>Kaca spion bisa berupa model standar atau custom dengan desain berbeda. Jok motor tersedia dalam
                  berbagai bahan dan ukuran, seperti jok berbahan kulit atau busa empuk untuk kenyamanan lebih.</p>
              </div>
            </div>
          </a>
        </div>

        <div class="col-md-4 col-sm-6">
          <a href="{{ route('produk.show', ['slug' => 'cairan-pendingin']) }}"
            style="text-decoration:none; color: inherit;">
            <div id="serv_hover" class="room">
              <div class="room_img">
                <figure><img src="{{ asset('images/21.jpg') }}" alt="Cairan Pendingin" /></figure>
              </div>
              <div class="bed_room">
                <h3>Cairan Pendingin</h3>
                <p>Ada dua jenis utama cairan pendingin, yaitu cairan pendingin berbahan dasar air dan campuran air
                  dengan bahan kimia yang bisa lebih tahan lama dan efektif dalam mengatur suhu mesin.</p>
              </div>
            </div>
          </a>
        </div>

        <div class="col-md-4 col-sm-6">
          <a href="{{ route('produk.show', ['slug' => 'alat-perawatan-motor']) }}"
            style="text-decoration:none; color: inherit;">
            <div id="serv_hover" class="room">
              <div class="room_img">
                <figure><img src="{{ asset('images/20.jpeg') }}" alt="Alat Perawatan Motor" /></figure>
              </div>
              <div class="bed_room">
                <h3>Alat Perawatan Motor</h3>
                <p>Beberapa alat perawatan motor termasuk sikat untuk membersihkan bagian-bagian kecil motor, lap
                  microfiber untuk mengeringkan dan membersihkan permukaan, serta pembersih roda dan mesin.</p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>



  <div class="blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="titlepage">
            <h2>Varian Servis</h2>
            <p>Berikut merupakan halaman servis</p>
          </div>
        </div>
      </div>
      <div class="row">
        @php
        $services = [
        [
        'image' => 'images/21.png',
        'title' => 'Paket Servis A',
        'description' => 'Servis ini mencakup: <br> 
          • <strong>CVT Cleaning</strong> – Pembersihan transmisi CVT agar performa tetap optimal. <br> 
          • <strong>Injection Cleaner</strong> – Membersihkan injektor bahan bakar untuk efisiensi pembakaran yang lebih baik.',
        'price' => 'RP.85.000', // CVT Cleaning (50rb) + Injection Cleaner (35rb)
        ],
        [
        'image' => 'images/23.png',
        'title' => 'Paket Servis B',
        'description' => 'Servis ini mencakup: <br> 
          • <strong>CVT Cleaning</strong> <br> 
          • <strong>Injection Cleaner</strong> <br> 
          • <strong>Oli Gearbox</strong> – Penggantian oli gearbox untuk kelancaran perpindahan gigi.',
        'price' => 'RP.110.000', // Tambah Oli Gearbox (25rb)
        ],
        [
        'image' => 'images/22.png',
        'title' => 'Paket Servis C',
        'description' => 'Servis ini mencakup: <br> 
          • <strong>CVT Cleaning</strong> <br> 
          • <strong>Injection Cleaner</strong> <br> 
          • <strong>Oli Gearbox</strong> <br> 
          • <strong>Throttle Cleaning</strong> – Membersihkan katup throttle agar respons gas lebih halus. <br>
          • <strong>Oil Filter</strong> – Penggantian filter oli untuk menjaga kebersihan oli mesin.',
        'price' => 'RP.160.000', // Tambah Throttle Cleaning (30rb) + Oil Filter (20rb)
        ],
        ];

      @endphp

        @foreach ($services as $service)
        <div class="col-md-4">
        <div class="blog_box">
        <div class="blog_img">
          <figure style="text-align: center;">
          <img src="{{ asset($service['image']) }}" alt="#"
          style="width: 100%; max-width: 100%; height: auto; display: block; margin: 0 auto;" />
          </figure>
        </div>
        <div class="blog_room">
          <h3>{{ $service['title'] }}</h3>
          <p>{!! $service['description'] !!}</p>
          <p><Strong>{!! $service['price'] !!}</Strong></p>

        </div>
        </div>
        </div>
    @endforeach
      </div>
    </div>
  </div>

  <!-- end blog -->
  <!--  contact -->
  <div class="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="titlepage">
            <h2>Lokasi Kami</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="map_main">
            <div class="map-responsive">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.33123456789!2d112.1234567!3d-7.1234567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb1234567890%3A0x123456789abcdef!2sNama+Lokasi!5e0!3m2!1sid!2sid!4v1612345678901!5m2!1sid!2sid"
                width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""
                loading="lazy" referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- end contact -->
  <!--  footer -->
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
            <h3>Oue Social Media </h3>

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
  </footer>
  <!-- end footer -->
  <!-- Javascript files-->
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <!-- <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script> --> <!-- Optional: use only one version -->

  <!-- Bootstrap Bundle (local) -->
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

  <!-- Custom Scrollbar -->
  <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

  <!-- Custom Script -->
  <script src="{{ asset('js/custom.js') }}"></script>

  <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

</body>

</html>