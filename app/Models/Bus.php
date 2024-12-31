<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Add this import
use Illuminate\Database\Eloquent\Model;


class Bus extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'seat_count'];

    // A bus has many routes
    public function routes()
    {
        return $this->hasMany(Route::class);
    }

    // A bus can have multiple bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
