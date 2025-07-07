<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;

Route::get('/get-variants/{productId}', [App\Http\Controllers\VariantController::class, 'getVariants']);

// Admin - Produk dan Varian
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');

    Route::get('/admin/variants/{variant}/edit', [App\Http\Controllers\VariantController::class, 'edit'])->name('admin.variants.edit');
    Route::put('/admin/variants/{variant}', [App\Http\Controllers\VariantController::class, 'update'])->name('admin.variants.update');
});


Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('produk.show');


// Rute untuk pengguna yang sudah login, agar tidak bisa mengakses halaman login atau register
Route::middleware('auth')->group(function () {
    // Setelah register, arahkan ke halaman dashboard
    Route::get('/register', function () {
        return redirect()->route('user.dashboard'); // Atau admin.dashboard jika admin yang login
    })->name('register');

    // Routing login
    Route::get('/login', function () {
        return redirect()->route('user.dashboard'); // Atau admin.dashboard jika admin yang login
    })->name('login');
});

// Rute login dan register untuk pengguna yang belum login (guest)
Route::middleware('guest')->group(function () {
    // Rute halaman register
    Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');

    // Rute halaman login
    Route::get('/login', function () {
        return view('auth.login'); // Pastikan file ini ada: resources/views/auth/login.blade.php
    })->name('login');

    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Public route
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Public welcome route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Review routes (PUBLIC - User membuat review)
Route::get('/review', [ReviewController::class, 'create'])->name('review');
Route::post('/review', [ReviewController::class, 'store'])->name('review.store');

// Profile route
Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth')->name('profile');

// Authenticated routes
Route::middleware('auth')->group(function () {

    // Dashboard routes
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Booking routes (USER)
    Route::get('/booking', [BookingController::class, 'create'])->name('booking');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

    // Booking routes (ADMIN)
    Route::get('/admin/booking', [BookingController::class, 'index'])->name('admin.booking.index');
    Route::get('/admin/booking/{id_booking}/edit', [BookingController::class, 'edit'])->name('admin.booking.edit');
    Route::put('/admin/booking/{id_booking}/update', [BookingController::class, 'update'])->name('admin.booking.update');
    Route::delete('/admin/booking/{id_booking}', [BookingController::class, 'destroy'])->name('admin.booking.delete');

    // User Management (ADMIN)
    Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/user/{id}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/admin/user/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/admin/user/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');

    // Review Management (ADMIN)
    Route::get('/admin/review', [ReviewController::class, 'index'])->name('admin.review.index');

    // Logout route
    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('home');
    })->name('logout');
});
