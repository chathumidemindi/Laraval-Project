<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\BusSeeder;
use Database\Seeders\RouteSeeder;
use Database\Seeders\BookingSeeder;
use Database\Seeders\PaymentSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            BusSeeder::class,
            RouteSeeder::class,
            BookingSeeder::class,
            PaymentSeeder::class,
            RolesSeeder::class,
        ]);
    }
}
