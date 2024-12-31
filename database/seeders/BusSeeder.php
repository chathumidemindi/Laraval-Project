<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bus;
use App\Models\Route;

class BusSeeder extends Seeder
{
    public function run()
    {
        // Delete buses first (child table)
        Bus::truncate();

        // Then delete routes if needed (parent table)
        Route::truncate();

        // Now insert new records into buses
        Bus::create([
            'name' => 'Express 101',
            'seating_capacity' => 40,
            'type' => 'Luxury',
            'status' => 'Available',
            'route_id' => 1,
        ]);

        Bus::create([
            'name' => 'Super Express 202',
            'seating_capacity' => 45,
            'type' => 'AC',
            'status' => 'Available',
            'route_id' => 2,
        ]);

        Bus::create([
            'name' => 'City Bus 303',
            'seating_capacity' => 30,
            'type' => 'Non-AC',
            'status' => 'Available',
            'route_id' => 3,
        ]);

        Bus::create([
            'name' => 'Hill Explorer 404',
            'seating_capacity' => 35,
            'type' => 'Luxury',
            'status' => 'Available',
            'route_id' => 4,
        ]);
    }
}
