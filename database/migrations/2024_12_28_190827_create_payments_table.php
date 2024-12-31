<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->unsignedBigInteger('booking_id'); // Foreign Key to bookings table
            $table->decimal('amount', 8, 2); // Payment amount
            $table->string('payment_method'); // Payment method (e.g., card, cash)
            $table->string('status')->default('pending'); // Payment status
            $table->timestamps(); // created_at & updated_at

            // Foreign Key Constraint
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
