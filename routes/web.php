<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
*/

// Home Page Route
Route::get('/', function () {
    return view('welcome'); // Render the home page.
});

// Bus Routes
Route::get('/buses', [BusController::class, 'index'])->name('buses.index');
Route::get('/buses/{id}', [BusController::class, 'show'])->name('buses.show');  // Route for showing specific bus details

// Booking Routes
Route::get('/booking/create/{bus_id}', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');

Route::get('/my-booking', [BookingController::class, 'userBookings'])->middleware('auth'); // View user's bookings (protected).
Route::put('/booking/{id}', [BookingController::class, 'update']); // Update a booking.
Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->middleware('auth'); // Cancel a booking (protected).

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // Show login form.
Route::post('/login', [AuthController::class, 'login']); // Handle login.
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth'); // Handle logout.
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register'); // Show register form.
Route::post('/register', [AuthController::class, 'register'])->name('register'); // Handle registration.

// Admin Route (only accessible by users with the 'Admin' role)

    Route::prefix('admin')->middleware(['role:Admin'])->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    });
    
   // Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
   // Route::post('/assign-role/{userId}', [AdminController::class, 'assignRole'])->name('admin.assignRole');
    // Add other admin-specific routes as needed


//Route::prefix('admin')->middleware(['role:Admin'])->group(function () 