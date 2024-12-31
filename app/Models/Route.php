<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Add this import
use Illuminate\Database\Eloquent\Model;


class Route extends Model
{
  

    use HasFactory;

    protected $fillable = ['bus_id', 'source', 'destination', 'departure_time', 'arrival_time'];

    // A route belongs to a specific bus
   // In the Route model
public function bus()
{
    return $this->hasOne(Bus::class, 'id', 'bus_id');  // Ensure that 'bus_id' is the foreign key for the relationship
}


    // A route can have multiple bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}


