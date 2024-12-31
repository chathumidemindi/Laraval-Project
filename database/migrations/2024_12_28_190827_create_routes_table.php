<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->unsignedBigInteger('bus_id'); // Foreign Key to buses table
            $table->string('origin'); // Starting point of the route
            $table->string('destination'); // Endpoint of the route
            $table->time('departure_time'); // Departure time
            $table->time('arrival_time'); // Arrival time
            $table->decimal('price', 8, 2); // Price of the ticket
            $table->timestamps(); // created_at & updated_at

            // Foreign Key Constraint
            $table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('routes');
    }
}

