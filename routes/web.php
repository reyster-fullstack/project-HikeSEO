<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/registration', function () {
    return view('welcome');
});

Route::get('/booking', function () {
    return view('booking');
});

// Correct way to define login route in web.php
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/vehicles', [BookingController::class, 'index']);
Route::post('/bookings', [BookingController::class, 'store']);

Route::post('/register', [RegisterController::class, 'register']);