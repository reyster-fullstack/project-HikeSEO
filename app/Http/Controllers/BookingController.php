<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VehicleMakeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;
use App\Models\Booking;



class BookingController extends Controller
{
    public function index()
    {
        $vehicleMakeModels = VehicleMakeModel::all(['id', 'make', 'model']);
        return response()->json($vehicleMakeModels);
    }

    public function store(Request $request)
    {
        \Log::debug('Store method called', $request->all());
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'vehicle_model' => 'required',
            'booking_date' => 'required|date',
        ]);

        // Create and save the booking
        $booking = new Booking($validated);
        $booking->save();

        return response()->json(['message' => 'Booking successfully created'], 201);
    }
}
