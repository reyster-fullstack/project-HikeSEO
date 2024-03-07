<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = [
            ['Make' => 'Toyota', 'Model' => 'Corolla', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Make' => 'Honda', 'Model' => 'Civic', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Make' => 'Ford', 'Model' => 'Mustang', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Make' => 'Chevrolet', 'Model' => 'Camaro', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Make' => 'Tesla', 'Model' => 'Model S', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Make' => 'BMW', 'Model' => '3 Series', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Make' => 'Mercedes-Benz', 'Model' => 'C-Class', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Make' => 'Audi', 'Model' => 'A4', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Make' => 'Lexus', 'Model' => 'IS', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['Make' => 'Nissan', 'Model' => 'Altima', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('vehiclemakemodel')->insert($cars);
    }
}
