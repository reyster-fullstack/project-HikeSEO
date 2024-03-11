<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PreventController extends Controller
{
    public function preventtimedate(Request $request)
    {
        \Log::debug('Store method called', $request->all());
        $validated = $request->validate([
            'prevent_date' => 'required',
            'prevent_time' => 'required',
            
        ]);

        // Create and save the booking
        $prevent = new Prevent($validated);
        $prevent->save();

        
        

        return response()->json(['message' => 'Booking successfully created'], 201);
    }
}
