<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function fetch()
    {
        $user = Auth::user();
        // Assuming you want to include related data, such as posts, you can load them here.
        // $user->load('posts'); // Uncomment if you have such relations and eager load them.

        // Use UserResource to control the output of the user data.
        return new UserResource($user);
    }

    /**
     * Logout the user (Revoke the token).
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }

    public function show(Request $request)
    {
        return $request->user(); // Returns authenticated user's details
    }
}
