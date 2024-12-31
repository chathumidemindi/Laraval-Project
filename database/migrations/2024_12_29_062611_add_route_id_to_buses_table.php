<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // In the generated migration file
public function up()
{
    Schema::table('buses', function (Blueprint $table) {
        $table->unsignedBigInteger('route_id')->nullable();  // Add the route_id column
        $table->foreign('route_id')->references('id')->on('routes')->onDelete('set null');  // Set up foreign key constraint
    });
}

public function down()
{
    Schema::table('buses', function (Blueprint $table) {
        $table->dropForeign(['route_id']);  // Drop the foreign key constraint
        $table->dropColumn('route_id');  // Drop the route_id column
    });
}

    }
;
