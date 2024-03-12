<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimeAvailableController extends Controller
{
    public function index()
    {
        $times = TimeAvailable::all();
        return response()->json($times);
    }
}
