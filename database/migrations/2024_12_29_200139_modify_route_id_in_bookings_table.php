<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Drop the foreign key constraint first
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['route_id']); // Ensure this matches the correct foreign key name
        });

        // Modify the route_id column
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('route_id')->nullable()->change();
        });

        // Re-add the foreign key constraint
        Schema::table('bookings', function (Blueprint $table) {
            $table->foreign('route_id')
                  ->references('id')
                  ->on('routes')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Rollback changes
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['route_id']);
        });

        Schema::table('bookings', function (Blueprint $table) {
            $table->bigInteger('route_id')->nullable(false)->change();
        });

        Schema::table('bookings', function (Blueprint $table) {
            $table->foreign('route_id')
                  ->references('id')
                  ->on('routes')
                  ->onDelete('cascade');
        });
    }
};
