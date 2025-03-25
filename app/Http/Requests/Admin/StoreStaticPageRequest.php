<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreStaticPageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255|unique:static_pages,title',
            'content' => 'required|string',
            // Slug will be auto-generated, so we don't need to validate it here
        ];
    }

    // Optional: Customize the error messages if needed
    public function messages()
    {
        return [
            'title.required' => 'The title is required.',
            'content.required' => 'The content is required.',
        ];
    }
}
