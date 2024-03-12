<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeAvailable extends Model
{
    use HasFactory;

    protected $table = 'time_available';
    protected $fillable = ['available_time'];
}
