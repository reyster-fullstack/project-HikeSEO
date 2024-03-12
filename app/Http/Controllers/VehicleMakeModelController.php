<?php

namespace App\Http\Controllers;

use App\Models\VehicleMakeModel;

class VehicleMakeModelController extends Controller
{
    public function index()
    {
        $vehicles = VehicleMakeModel::all();
        return response()->json($vehicles);
    }
}
