<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\AdminLoginRequest;  // Assuming StoreAdminRequest is the name of your form request
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function create()
    {
        return view('admin.auth.login');
    }

    public function index()
    {
        try {
            // Render the admin dashboard page
            return view("admin.index");
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error loading admin dashboard: ' . $e->getMessage());
            return redirect()->route('admin.login')->with('error', 'There was an error loading the dashboard.');
        }
    }

    public function store(AdminLoginRequest $request)
    {
       
        // The validation is already handled by the StoreAdminRequest FormRequest

        try {
            // Attempt to authenticate the admin
            $credentials = $request->validated(); // Retrieve validated data from the form request
           
            if (Auth::guard('admin')->attempt($credentials)) {
                // Regenerate session after successful login
                $request->session()->regenerate();

                // Redirect to the admin dashboard
                return redirect()->route('admin.dashboard');
            }

            // If authentication fails, throw a validation exception
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match.',
            ]);
        } catch (ValidationException $e) {
            // Catch validation errors and log them if needed
            Log::error('Login validation failed: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Catch any other errors and log them
            Log::error('Error during admin login attempt: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

    public function destroy(Request $request)
    {
        try {
            // Log the admin out of the session
            Auth::guard('admin')->logout();

            // Redirect to the login page
            return redirect()->route('admin.login');
        } catch (\Exception $e) {
            // Log any errors during the logout process
            Log::error('Error during admin logout: ' . $e->getMessage());
            return redirect()->route('admin.dashboard')->with('error', 'An error occurred while logging out.');
        }
    }
}
