<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payments')->insert([
            [
                'id' => 1,
                'booking_id' => 1, // Ensure this booking exists in the `bookings` table
                'amount' => 100.50,
                'payment_method' => 'Credit Card',
                'status' => 'Completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'booking_id' => 2, // Ensure this booking exists in the `bookings` table
                'amount' => 50.00,
                'payment_method' => 'PayPal',
                'status' => 'Completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }
}
