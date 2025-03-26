<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Jobs\SendEmail;
use App\Mail\UserCreated;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterUserRequest;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterUserRequest $request)
    {
        try {
            $attributes = $request->validated();
            $attributes['password'] = bcrypt($attributes['password']);

            $user = User::create($attributes);
            Auth::guard('user')->login($user);

            // Attempt to send a welcome email
            try {
                // command used to run queues  :  php artisan queue:work
                dispatch(new SendEmail(new UserCreated($user), $user->email));
            } catch (\Exception $emailException) {
                // Log email-related errors for debugging
                Log::error('Email Dispatch Error: ' . $emailException->getMessage());
            }

            return redirect('/')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            // Log user registration errors
            Log::error('Registration Error: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong while registering. Please try again.');
        }
    }
}
