<?php

// app/Http/Requests/UpdateCartRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCartRequest extends FormRequest
{
    public function authorize()
    {
        return true;  // Set to true if you want all users to be able to use this request
    }

    public function rules()
    {
        return [
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:0'
        ];
    }
}
