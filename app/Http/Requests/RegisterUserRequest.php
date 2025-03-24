<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterUserRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Set to false if authorization is needed
    }

    public function rules()
    {
        return [
            'name'      => ['required'],
            'email'     => ['required', 'email', 'unique:users,email'],
            'password'  => ['required', Password::min(6), 'confirmed']
        ];
    }
}
