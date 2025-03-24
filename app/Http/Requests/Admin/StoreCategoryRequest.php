<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true; // You can adjust this if authorization is needed
    }

    public function rules()
    {
        return [
            'name' => 'required|string|unique:categories,name|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The category name is required.',
            'name.string' => 'The category name must be a valid string.',
            'name.unique' => 'The category name has already been taken.',
            'name.max' => 'The category name cannot be longer than 255 characters.',
        ];
    }
}
