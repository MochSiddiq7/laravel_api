<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: orange;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .register-container {
            max-width: 400px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            text-align: center;
        }

        .register-container h2 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #333;
            font-weight: bold;
        }

        .register-container img {
            max-width: 200px;
            width: 100%;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 0.5rem;
            margin-bottom: 15px;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            border-radius: 0.5rem;
            background-color: #ff6600;
            border: none;
        }

        .btn-primary:hover {
            background-color: #e65c00;
        }

        .alert {
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="register-container">
        <img src="{{ asset('images/1.png') }}" alt="Logo or Image">
        <h2>Register</h2>

        {{-- Tampilkan error jika ada --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Flash success message --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }} <a href="{{ route('login') }}">Login sekarang</a>.
            </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}">
            @csrf
            <input type="text" class="form-control" name="username" placeholder="Masukkan Username"
                value="{{ old('username') }}" required>
            <input type="email" class="form-control" name="email" placeholder="Masukkan Email"
                value="{{ old('email') }}" required>
            <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password"
                required> {{-- Tambahkan ini --}}
            <input type="text" class="form-control" name="address" placeholder="Masukkan Alamat"
                value="{{ old('address') }}" required>
            <input type="tel" class="form-control" name="phone" placeholder="Masukkan No Telpon"
                value="{{ old('phone') }}" required>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>

    </div>

</body>

</html>