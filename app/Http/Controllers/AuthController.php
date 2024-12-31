<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login'); // Return the login view
    }

    // Handle login request
    public function login(Request $request)
    {
        $request->validate([   // Validate the request
            'email' => 'required|email',
            'password' => 'required|min:6',  // Make sure password is at least 6 characters
        ]);

        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            // If authentication is successful, redirect to the intended page or home
            return redirect()->route('buses.index');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);  // If login fails, show error
    }

    // Show registration form
    public function showRegisterForm()
    {
        return view('auth.register');  // Return the registration view
    }

    // Handle registration request
    public function register(Request $request)
    {
        // Validate the registration form inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',  // Ensure passwords match
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),  // Hash the password
        ]);

        // Automatically log in the user after registration
        Auth::login($user);

      

        // Redirect to the buses index page
        return redirect()->route('buses.index');
    }

    // Handle logout request
    public function logout()
    {
        Auth::logout();  // Log out the user
        return redirect()->route('login');  // Redirect to login page
    }
}
