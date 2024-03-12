<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VehicleMakeModelController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TimeAvailableController;
use App\Http\Controllers\PreventDateTimeController;
use App\Http\Controllers\EmailController;
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
Route::post('/prevent', [PreventController::class, 'preventtimedate']);

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



Route::get('/available-times', [TimeAvailableController::class, 'index']);



Route::post('/prevent-date-time', [PreventDateTimeController::class, 'store']);


Route::get('/booking', [BookingController::class, 'getBookings']);



Route::post('/emails', [EmailController::class, 'store']);
