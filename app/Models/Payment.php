<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Add this import
use Illuminate\Database\Eloquent\Model;


class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['booking_id', 'amount', 'status', 'payment_date', 'payment_method'];

    // A payment belongs to a booking
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
