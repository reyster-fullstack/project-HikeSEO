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
            'booked_date' => 'required',
            'booked_time' => 'required',
            'booking_date' => 'required|date',
            'vehicle_models' => 'nullable',
            'vehicle_make' => 'nullable',
            
        ]);

        // Create and save the booking
        $booking = new Booking($validated);
        $booking->save();

        Mail::to($request->email)->send(new BookingConfirmation($booking));
        Mail::to('feweji5372@hisotyr.com')->send(new BookingConfirmation($booking));

        
        

        return response()->json(['message' => 'Booking successfully created'], 201);
    }

    public function getBookings(Request $request)
    {
        $date = $request->query('date');

        if ($date) {
            // Assuming 'booking_date' is the column name in your bookings table where the dates are stored
            // and that it's stored in 'YYYY-MM-DD' format or similar.
            $bookings = Booking::whereDate('booking_date', '=', $date)->get();
        } else {
            // If no specific date is provided, fetch all bookings or handle accordingly
            $bookings = Booking::all();
        }

        return response()->json($bookings);
    }
}
