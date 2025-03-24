<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Allow any user to update a product, or implement authorization logic if needed.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|exists:categories,id',
            'quantity' => 'required|integer|min:1',
            'author' => 'required|exists:authors,id',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    /**
     * Customize the error messages for validation.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'id.required' => 'The product ID is required.',
            'id.exists' => 'The specified product does not exist.',
            'name.required' => 'The product name is required.',
            'description.required' => 'The product description is required.',
            'price.required' => 'The price is required.',
            'category.required' => 'The category is required.',
            'quantity.required' => 'The product quantity is required.',
            'author.required' => 'The author is required.',
            'status.required' => 'The status is required.',
        ];
    }
}
