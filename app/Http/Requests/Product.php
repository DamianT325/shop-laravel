<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Product extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:500|min:4',
            'description' => 'required|max:1500|min:4',
            'price' => 'required|numeric|between:0,999999.99|min:0',
            'amount' => 'required|integer|min:0',
            'image' => 'nullable|mimes:jpg,png,gif,webm',
        ];
}}
