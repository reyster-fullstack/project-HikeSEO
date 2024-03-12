<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreventDateTime extends Model
{
    use HasFactory;
    protected $table = 'prevent_date_time';
    protected $fillable = ['prevent_date', 'prevent_time'];
}
