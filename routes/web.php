<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;

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

// Correct way to define login route in web.php
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/vehicles', [BookingController::class, 'index']);
Route::post('/bookings', [BookingController::class, 'store']);

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/send-test-email', function () {
    $recipient = 'reysterjoshua@fullstack.ph'; // Change this to your test recipient
    Mail::to($recipient)->send(new TestEmail());

    return 'Test email sent.';
});