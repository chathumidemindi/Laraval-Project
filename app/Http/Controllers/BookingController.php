<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Bus;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    /**
     * Display a listing of the user's bookings.
     */
    public function index()
    {
        $userId = Auth::id(); // Get the currently logged-in user's ID
        $bookings = Booking::where('user_id', $userId)->with(['bus', 'route'])->get();

        return view('booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new booking.
     */
    public function create($bus_id)
    {
        $bus = Bus::findOrFail($bus_id);
        $routes = $bus->routes; // Assuming a relationship exists between Bus and Routes

        return view('booking.create', compact('bus', 'routes'));
    }

    /**
     * Store a newly created booking in the database.
     */
    public function store(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'route_id' => 'required|exists:routes,id',
            'seats_booked' => 'nullable|integer|min:1',
        ]);

        // Log the validated data for debugging
        Log::info('Booking data:', $validated);

        // Find the selected bus
        $bus = Bus::findOrFail($validated['bus_id']);

        // Check if the requested seats are available
        if ($bus->seating_capacity < ($validated['seats_booked'] ?? 0)) {
            return redirect()->back()->withErrors(['seats_booked' => 'Not enough seats available!']);
        }

        // Get the currently logged-in user's ID
        $userId = Auth::id();

        // Check for duplicate bookings
        $existingBooking = Booking::where('bus_id', $validated['bus_id'])
            ->where('route_id', $validated['route_id'])
            ->where('user_id', $userId)
            ->first();

        if ($existingBooking) {
            return redirect()->back()->withErrors(['error' => 'You already have a booking for this bus and route.']);
        }

        // Use a database transaction for atomicity
        DB::transaction(function () use ($bus, $validated, $userId) {
            // Deduct the booked seats from the bus's seating capacity
            $bus->seating_capacity -= $validated['seats_booked'] ?? 0;
            $bus->save();

            // Create the booking
            Booking::create([
                'bus_id' => $validated['bus_id'],
                'route_id' => $validated['route_id'],
                'user_id' => $userId,
                'seats_booked' => $validated['seats_booked'] ?? 0,
                'booking_time' => now(),
                'status' => 'Booked',
            ]);
        });

        // Flash success message and redirect
        session()->flash('success', 'Booking successful!');
        return redirect()->route('buses.index');
    }

    // Other methods (edit, update, destroy) remain unchanged...
}
