<?php

namespace App\Http\Requests\Product;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateProductPresentationRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'product_id' => 'required|integer|exists:product,id',
            'presentation_id' => 'required|integer|exists:presentation,id',
            'stock' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:1.00|regex:/^\d+(\.\d{1,2})?$/'
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'El campo :attribute es obligatorio',
            'product_id.integer' => 'El campo :attribute debe ser un entero',
            'product_id.exists' => 'El campo :attribute debe ser un id valido',

            'presentation_id.required' => 'El campo :attribute es obligatorio',
            'presentation_id.integer' => 'El campo :attribute debe ser un entero',
            'presentation_id.exists' => 'El campo :attribute debe ser un id valido',

            'stock.required' => 'El campo :attribute es obligatorio',
            'stock.integer' => 'El campo :attribute debe ser un entero',
            'stock.min' => 'El campo :attribute debe ser mayor o igual a uno',

            'unit_price.required' => 'El campo :attribute es obligatorio',
            'unit_price.numeric' => 'El campo :attribute debe ser un decimal',
            'unit_price.min' => 'El campo :attribute debe ser mayor o igual a 1.00',
            'unit_price.regex' => 'El campo :attribute debe tener como máximo 2 decimales',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ], 422));
    }
}
