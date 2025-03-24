<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAuthorRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Ensure all users can make this request, modify if needed
    }

    public function rules()
    {
        $authorId = $this->input('id');

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('authors', 'name')->ignore($authorId),
            ],
            'bio' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The author name is required.',
            'name.unique' => 'The author name must be unique.',
            'name.max' => 'The author name must not exceed 255 characters.',
            'bio.required' => 'The bio is required.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'Allowed image types: jpeg, png, jpg, gif.',
            'image.max' => 'The image must not be larger than 2MB.',
        ];
    }
}
