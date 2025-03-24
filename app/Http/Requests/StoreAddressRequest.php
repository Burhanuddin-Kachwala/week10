<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Allow only authenticated users to create an address
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'type' => 'required|in:billing,shipping',  // Ensure only billing or shipping is selected
        ];
    }

    /**
     * Get custom messages for validation errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'address_line_1.required' => 'The address line 1 is required.',
            'city.required' => 'The city is required.',
            'state.required' => 'The state is required.',
            'postal_code.required' => 'The postal code is required.',
            'country.required' => 'The country is required.',
            'type.required' => 'The address type (billing or shipping) is required.',
        ];
    }
}
