<?php

namespace App\Http\Controllers;
use App\Models\Bus;  // Uncomment this line


use Illuminate\Http\Request;
//use App\Models\Bus; 

class BusController extends Controller
{
     // List all buses
     public function index()
     {
         $buses = Bus::all();  // Get all buses from the database
         return view('buses.index', compact('buses'));  // Return the view with the buses
     }
 
     // View details of a specific bus
     public function show($id)
     {
         $bus = Bus::findOrFail($id);  // Find bus by id, if not found it will throw a 404 error
         return view('buses.show', compact('bus'));  // Return the bus details view
     }
}
