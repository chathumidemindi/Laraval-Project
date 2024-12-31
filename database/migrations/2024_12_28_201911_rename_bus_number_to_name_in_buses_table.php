<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameBusNumberToNameInBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Rename bus_number column to name
        Schema::table('buses', function (Blueprint $table) {
            $table->renameColumn('bus_number', 'name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Reverse the column rename from name back to bus_number
        Schema::table('buses', function (Blueprint $table) {
            $table->renameColumn('name', 'bus_number');
        });
    }
}
