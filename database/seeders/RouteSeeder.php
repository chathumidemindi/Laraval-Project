<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;  // Import the Seeder class
use App\Models\Route;  // Import the Route modelphp 


class RouteSeeder extends Seeder
{
    public function run()
    {
        Route::create([
            'bus_id' => 1,
            'origin' => 'Colombo',
            'destination' => 'Galle',
            'departure_time' => '06:00:00',
            'arrival_time' => '09:00:00',
            'price' => 500.00,
        ]);

        Route::create([
            'bus_id' => 2,
            'origin' => 'Colombo',
            'destination' => 'Kandy',
            'departure_time' => '07:30:00',
            'arrival_time' => '10:30:00',
            'price' => 600.00,
        ]);

        Route::create([
            'bus_id' => 3,
            'origin' => 'Colombo',
            'destination' => 'Nuwara Eliya',
            'departure_time' => '08:00:00',
            'arrival_time' => '11:30:00',
            'price' => 800.00,
        ]);

        Route::create([
            'bus_id' => 4,
            'origin' => 'Colombo',
            'destination' => 'Negombo',
            'departure_time' => '09:00:00',
            'arrival_time' => '10:00:00',
            'price' => 300.00,
        ]);

        Route::create([
            'bus_id' => 1,
            'origin' => 'Galle',
            'destination' => 'Colombo',
            'departure_time' => '10:30:00',
            'arrival_time' => '13:00:00',
            'price' => 500.00,
        ]);

        Route::create([
            'bus_id' => 2,
            'origin' => 'Kandy',
            'destination' => 'Colombo',
            'departure_time' => '15:00:00',
            'arrival_time' => '18:00:00',
            'price' => 600.00,
        ]);

        Route::create([
            'bus_id' => 3,
            'origin' => 'Nuwara Eliya',
            'destination' => 'Colombo',
            'departure_time' => '16:00:00',
            'arrival_time' => '19:30:00',
            'price' => 800.00,
        ]);

        Route::create([
            'bus_id' => 4,
            'origin' => 'Negombo',
            'destination' => 'Colombo',
            'departure_time' => '07:00:00',
            'arrival_time' => '08:00:00',
            'price' => 300.00,
        ]);
    }
}

