<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Admin\StoreUserRequest;  // Use existing StoreUserRequest
use App\Http\Requests\Admin\UpdateUserRequest; // Use existing UpdateUserRequest
use Exception;

class UserController extends Controller
{
    public function index()
    {
        try {
            $users = User::orderBy('created_at', 'desc')->simplePaginate(10);
            return view('admin.users.index', compact('users'));
        } catch (Exception $e) {
            Log::error('Error fetching users: ' . $e->getMessage());
            return redirect()->route('admin.users')->with('error', 'Failed to fetch users.');
        }
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request) // Using the existing StoreUserRequest
    {
        try {
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            return redirect()->route('admin.users')->with('success', 'User created successfully.');
        } catch (Exception $e) {
            Log::error('Error creating user: ' . $e->getMessage());
            return redirect()->route('admin.users.create')->with('error', 'Failed to create user.');
        }
    }

    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);
            return view('admin.users.edit', compact('user'));
        } catch (Exception $e) {
            Log::error('Error fetching user for edit: ' . $e->getMessage());
            return redirect()->route('admin.users')->with('error', 'Failed to fetch user details.');
        }
    }

    public function update(UpdateUserRequest $request) // Using the existing UpdateUserRequest
    {
        try {
            $user = User::findOrFail($request->input('id'));
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->status = $request->input('status');

            if ($request->filled('password')) {
                $user->password = Hash::make($request->input('password'));
            }

            $user->save();

            return redirect()->route('admin.users')->with('success', 'User updated successfully.');
        } catch (Exception $e) {
            Log::error('Error updating user: ' . $e->getMessage());
            return redirect()->route('admin.users.edit', ['id' => $request->input('id')])
                ->with('error', 'Failed to update user.');
        }
    }

    public function delete($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
        } catch (Exception $e) {
            Log::error('Error deleting user: ' . $e->getMessage());
            return redirect()->route('admin.users')->with('error', 'Failed to delete user.');
        }
    }
}
