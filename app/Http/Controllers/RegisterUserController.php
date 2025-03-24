<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\RegisterUserRequest;
use Exception;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterUserRequest $request)
    {
        try {
            //throw new \Exception('Testing exception handling'); // Force an exception

            $attributes = $request->validated();
            $attributes['password'] = bcrypt($attributes['password']);

            $user = User::create($attributes);
            Auth::login($user);

            return redirect('/')->with('success', 'Registration successful!');
        } catch (Exception $e) {
            Log::error('Registration Error: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong while registering. Please try again.');
        }
    }
}
