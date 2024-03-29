<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'email',
        'name',
        'phone',
        'vehicle_model',
        'booked_date',
        'booked_time',
        'booking_date',
    ];

    protected $table = 'booking';
}
