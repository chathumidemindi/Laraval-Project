<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bookings')->insert([
            [
                'id' => 1,
                'bus_id' => 1, // Ensure this bus exists in the `buses` table
                'route_id' => 1, // Ensure this route exists in the `routes` table
                'user_id' => 1, // Ensure this user exists in the `users` table
                'seats_booked' => 2,
                'booking_time' => now(),
                'status' => 'Booked',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'bus_id' => 2, // Ensure this bus exists in the `buses` table
                'route_id' => 2, // Ensure this route exists in the `routes` table
                'user_id' => 2, // Ensure this user exists in the `users` table
                'seats_booked' => 1,
                'booking_time' => now(),
                'status' => 'Booked',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
