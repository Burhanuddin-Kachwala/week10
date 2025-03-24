<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true; // You can adjust this if authorization is needed
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'name')->ignore($this->route('category')),
            ],
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
