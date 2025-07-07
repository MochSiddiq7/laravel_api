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
            border-radius: 12px;
            text-align: center;
        }
        .login-container img { max-width: 200px; margin-bottom: 20px; }
        .form-control { margin-bottom: 15px; border-radius: 0.5rem; }
        .btn-primary { width: 100%; padding: 12px; background-color: #ff6600; }
    </style>
</head>
<body>
<div class="login-container">
    <img src="{{ asset('images/1.png') }}" alt="Logo">
    <h2>Login</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ url('/login') }}" method="POST">
        @csrf
        <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
        <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <div class="register-link mt-3">
        Tidak punya akun? <a href="{{ url('/register') }}">Buat akun</a>
    </div>
</div>
</body>
</html>
