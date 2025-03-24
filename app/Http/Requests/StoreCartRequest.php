<?php

// app/Http/Requests/StoreCartRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
{
    public function authorize()
    {
        return true;  // Set to true if you want all users to be able to use this request
    }

    public function rules()
    {
        return [
            'product_id' => 'required|exists:products,id',
            'quantity' => 'sometimes|integer|min:1'
        ];
    }
}
