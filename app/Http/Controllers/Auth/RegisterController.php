<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        \Log::info('Register attempt', ['request' => $request->all()]);
    
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);

    if ($validator->fails()) {
        \Log::error('Registration validation failed', ['errors' => $validator->errors()]);
        return response()->json(['errors' => $validator->errors()], 422);
    }

    try {
        // Registration logic here
        // Don't forget to hash the password before saving it to the database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Optionally, log the user in and return a suitable response
        // Auth::login($user);

        return response()->json(['message' => 'Registration successful', 'user' => $user], 201);
        }
     catch (\Exception $e) {
            \Log::error('Registration error', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Registration failed'], 500);
        }
    }

}
