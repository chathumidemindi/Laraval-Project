<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->unsignedBigInteger('bus_id'); // Foreign Key to buses table
            $table->unsignedBigInteger('user_id'); // Foreign Key to users table
            $table->integer('seats_booked'); // Number of seats booked
            $table->dateTime('booking_time'); // Booking date and time
            $table->string('status')->default('pending'); // Booking status
            $table->timestamps(); // created_at & updated_at

            // Foreign Key Constraints
            $table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
