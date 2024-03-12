<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\PreventDateTimeController;

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

Route::get('/admin', function () {
    return view('adminDashboard');
});

Route::get('/send-mail', [TestController::class, 'index']);

// Correct way to define login route in web.php
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/booking', [BookingController::class, 'store']);
Route::get('/vehicles', [BookingController::class, 'index']);
Route::post('/bookings', [BookingController::class, 'store']);

Route::post('/register', [RegisterController::class, 'register']);



Route::post('/prevent-date-time', [PreventDateTimeController::class, 'store']);

