<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class timeAvailable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $time = [
        ['available_time' => '09:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['available_time' => '09:30', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['available_time' => '10:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['available_time' => '10:30', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['available_time' => '11:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['available_time' => '11:30', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['available_time' => '12:30', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['available_time' => '12:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['available_time' => '01:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['available_time' => '01:30', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['available_time' => '02:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['available_time' => '02:30', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['available_time' => '03:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['available_time' => '03:30', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['available_time' => '04:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['available_time' => '04:30', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['available_time' => '05:00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['available_time' => '05:30', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
       ];

       DB::table('time_available')->insert($time);
    }
}