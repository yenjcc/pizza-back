<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreatePurchaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       
        return [
            'client_name' => 'required|min:2|max:30|alpha',
            'client_lastname' => 'required|min:2|max:30|alpha',
            'client_phone' => 'required|numeric|string',
            'client_address' => 'required|string|min:5',
            'products' => 'required|array|between:1,100',
            'products.*.id' => 'required|integer|exists:products',
            'products.*.quantity' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'client_name.required' => 'Name is required',
            'client_name.alpha'  => 'Name must be only letters',
            'client_name.min'  => 'Name must be at least 2 characters',
            'client_name.max'  => 'Name must be shorter than 30 characters',

            'client_lastname.required' => 'Lastname is required',
            'client_lastname.alpha'  => 'Lastname must be only letters',
            'client_lastname.min'  => 'Lastname must be at least 2 characters',
            'client_lastname.max'  => 'Lastname must be shorter than 30 characters',

            'client_address.required' => 'Address is required',
            'client_address.string'  => 'Address must be string',
            'client_address.min'  => 'Address must be at least 5 characters',

            'client_phone.required' => 'Phone is required',
            'client_phone.string'  => 'Phone must be string',
            'client_phone.numeric'  => 'Phone must containt only numbers',
            
            'products.size'  => 'Products must be at least 1',
            'products.array'  => 'Products must be an Array',
            'products.required'  => 'Products is required',     

            'products.*.id.required' => 'Product id is required',
            'products.*.id.integer' => 'Product id must an integer',
            'products.*.id.exist' => 'Product id must exists in products table',

            'products.*.quantity.required' => 'Product quantity is required',
            'products.*.quantity.integer' => 'Product quantity must an integer',
            'products.*.quantity.required' => 'Product id is required',
            'products.*.quantity.min' => 'Product quantity must be at least 1',
            
        ];
    }
}
