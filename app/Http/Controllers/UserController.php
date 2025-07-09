<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Check if user has permission to access user management (Only ADMIN)
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized access');
        }

        $users = User::orderBy('name')->get();
        return view('private.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Check if user has permission to create users (Only ADMIN)
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized access');
        }

        // Only STAFF role is available for creation
        $roles = ['STAFF' => 'Staff'];
        return view('private.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check if user has permission to create users (Only ADMIN)
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized access');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Force role to STAFF - no ADMIN creation allowed
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'STAFF',
        ]);

        return redirect()->route('users.index')->with('success', 'Staff user created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // Check if user has permission to view users (Only ADMIN)
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized access');
        }

        return view('private.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Check if user has permission to edit users (Only ADMIN)
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized access');
        }

        $user = User::findOrFail($id);
        
        // If editing an ADMIN user, don't allow role change
        if ($user->role === 'ADMIN') {
            $roles = ['ADMIN' => 'Admin'];
        } else {
            $roles = ['STAFF' => 'Staff'];
        }
        
        return view('private.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Check if user has permission to update users (Only ADMIN)
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized access');
        }

        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            // Keep existing role - don't allow role changes
            'role' => $user->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Check if user has permission to delete users (Only ADMIN)
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized access');
        }

        $user = User::findOrFail($id);
        
        // Prevent deleting the current user
        if ($user->id === Auth::id()) {
            return redirect()->route('users.index')->with('error', 'Cannot delete your own account.');
        }

        // Prevent deleting any ADMIN user
        if ($user->role === 'ADMIN') {
            return redirect()->route('users.index')->with('error', 'Cannot delete admin accounts.');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Staff user deleted successfully.');
    }
}
