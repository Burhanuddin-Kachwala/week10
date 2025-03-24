<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\LoginRequest;  // Import the LoginRequest
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log; // For logging purposes

class SessionController extends Controller
{
    // Show the login form
    public function create()
    {
        return view('auth.login');
    }

    // Handle the login attempt
    public function store(LoginRequest $request)
    {
        try {
            // Validating request data using the LoginRequest FormRequest
            $attributes = $request->validated();

            // Attempt to log the user in
            if (!Auth::attempt($attributes)) {
                // Log the failure and pass the error message via session
                Log::warning('Login attempt failed for email: ' . $request->email);

                // Redirect back with an error message
                return back()->withErrors([
                    'email' => 'Sorry, those credentials do not match.'
                ]);
            }

            // Regenerate the session to prevent session fixation attacks
            $request->session()->regenerate();

            // Redirect to the homepage or wherever you want after successful login
            return redirect('/')->with('success', 'Successfully logged in!');
        } catch (\Exception $e) {
            // Log the error and display a generic error message
            Log::error('Login error: ' . $e->getMessage());

            // Return back with an error message in case of an exception
            return back()->withErrors(['error' => 'An error occurred during login. Please try again.']);
        }
    }

    // Handle logout
    public function destroy(Request $request)
    {
        try {
            // Log the user out
            Auth::guard('user')->logout();

            // Invalidate the session to prevent session fixation
            $request->session()->invalidate();

            // Regenerate the session token to prevent CSRF attacks
            $request->session()->regenerateToken();

            // Redirect to the homepage or a different route after logout
            return redirect('/')->with('success', 'Logged out successfully.');
        } catch (\Exception $e) {
            // Log the error and send a message back
            Log::error('Logout error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'An error occurred during logout. Please try again.']);
        }
    }
}
