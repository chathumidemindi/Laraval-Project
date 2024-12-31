<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusesTable extends Migration
{
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('bus_number')->unique(); // Unique bus identifier
            $table->integer('seating_capacity'); // Number of seats
            $table->string('type'); // Bus type (e.g., luxury)
            $table->string('status')->default('active'); // Status (default active)
            $table->timestamps(); // created_at & updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('buses');
    }
}
