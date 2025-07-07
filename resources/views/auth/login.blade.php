<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
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

        .login-container {
            max-width: 400px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #333;
            font-weight: bold;
        }

        .login-container img {
            max-width: 200px;
            width: 100%;
            margin-bottom: 20px;
        }

        .form-control {
            margin-bottom: 15px;
            border-radius: 0.5rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            border-radius: 0.5rem;
            font-size: 16px;
            background-color: #ff6600;
            border: none;
        }

        .btn-primary:hover {
            background-color: #e65c00;
        }

        .alert-danger {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .register-link {
            margin-top: 15px;
            font-size: 16px;
        }

        .register-link a {
            color: #007bff;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <img src="{{ asset('images/1.png') }}" alt="Logo or Image">
        <h2>Login</h2>

        @if ($errors->has('error'))
            <div class="alert alert-danger">
                {{ $errors->first('error') }}
            </div>
        @endif

        <form id="login-form" method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" class="form-control" placeholder="Masukkan Email" value="{{ old('email') }}" required>
            <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <div class="register-link">
            Tidak punya akun? <a href="{{ route('register') }}" >Buat akun</a>
        </div>
    </div>
</body>

</html>
