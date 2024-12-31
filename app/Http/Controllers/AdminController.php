<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Display all users
    public function users()
    {
        $users = User::all(); // Fetch all users from the database
        return view('admin.users', compact('users'));
    }

    // Assign a role to a user
    public function assignRole(Request $request, $userId)
    {
        // Find the user by their ID
        $user = User::find($userId);

        // Check if the user exists
        if (!$user) {
            return redirect()->route('admin.users')->with('error', 'User not found');
        }

        // Get the role ID from the form
        $roleId = $request->input('role');

        // Find the role by its ID
        $role = Role::find($roleId);

        // Check if the role exists
        if (!$role) {
            return redirect()->route('admin.users')->with('error', 'Role not found');
        }

        // Attach the role to the user (or detach it first to avoid duplicates)
        $user->roles()->sync([$role->id]); // This ensures only the selected role is assigned

        // Redirect with a success message
        return redirect()->route('admin.users')->with('success', 'Role assigned successfully');
    }
}
