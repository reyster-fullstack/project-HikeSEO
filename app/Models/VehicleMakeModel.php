<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleMakeModel extends Model
{
    protected $table = 'vehiclemakemodel';

    protected $fillable = ['id', 'make', 'model'];
}
