<?php

namespace App\Http\Requests\Order;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateOrderRequest extends FormRequest
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
            'products' => 'required|array|min:1',
            'products.*.product_id' => 'required|integer',
            'products.*.presentation_id' => 'required|integer',
            'products.*.amount' => 'required|integer|min:1'
        ];
    }

    public function messages(): array
    {
        return [
            'products.required' => 'El campo :attribute es obligatorio',
            'products.array' => 'El campo :attribute debe ser un array',
            'products.min' => 'Debe incluir al menos un producto',

            'products.*.product_id.required' => 'El campo :attribute es obligatorio para cada producto',
            'products.*.product_id.integer' => 'El campo :attribute debe ser un número entero',

            'products.*.presentation_id.required' => 'El campo :attribute es obligatorio para cada producto',
            'products.*.presentation_id.integer' => 'El campo :attribute debe ser un número entero',

            'products.*.amount.required' => 'El campo :attribute es obligatorio para cada producto',
            'products.*.amount.integer' => 'El campo :attribute debe ser un número entero',
            'products.*.amount.min' => 'El campo :attribute debe ser al menos 1',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Errores de validación',
            'data' => $validator->errors(),
        ], 422));
    }
}
