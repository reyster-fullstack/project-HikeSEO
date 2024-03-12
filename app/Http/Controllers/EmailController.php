<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminEmail;

class EmailController extends Controller
{
    public function store(Request $request)
    {
        \Log::debug('Store method called', $request->all());
        $request->validate([
            'email' => 'required|email',
        ]);

        // Store the email in the database
        $email = new Email();
        $email->email = $request->email;
        $email->save();

        // Return a response
        return response()->json(['message' => 'Email saved successfully!'], 200);
    }
}
