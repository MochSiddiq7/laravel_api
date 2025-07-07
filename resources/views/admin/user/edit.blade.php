<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
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
                        <h4>Edit User</h4>
                    </div>
                    <div class="card-body">

                        <!-- Display success message if any -->
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Form to edit user -->
                        <form method="POST" action="{{ route('admin.user.update', $user->id_user) }}">
                            @csrf
                            @method('PUT')

                            <!-- Email input -->
                            <div class="mb-3">
                                <label for="email" class="form-label"><strong>Email</strong></label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password input -->
                            <div class="mb-3">
                                <label for="password" class="form-label"><strong>Password</strong></label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Enter new password (optional)">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirm Password input -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label"><strong>Confirm
                                        Password</strong></label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Confirm new password (optional)">
                            </div>

                            <!-- Submit button -->
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Update User</button>
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
