<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VehicleMakeModelController;
use App\Http\Controllers\BookingController;
// Ensure you have included UserController and UserDataController if you're using them

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Authentication
Route::post('/login', [AuthController::class, 'login'])->middleware(['web']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

// Other routes
Route::get('/vehicles', [VehicleMakeModelController::class, 'index']);
Route::post('/booking', [BookingController::class, 'store']);

// Example user data routes (ensure controllers exist and are implemented)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user-data', [UserDataController::class, 'fetch']); // Ensure UserDataController exists
    Route::get('/user', [UserController::class, 'show']); // Ensure UserController exists
});



Route::get('/send-mail-test', function () {
    Mail::raw('This is a test email.', function ($message) {
        $message->to('reysterjoshua@fullstack.ph')->subject('Test Email');
    });

    return 'Test email sent.';
});