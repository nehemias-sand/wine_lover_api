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
            'products.*.amount' => 'required|integer|min:1',
            'address_id' => 'required|integer|exists:address,id',
            'card_token_id' => 'required|boolean|exists:card_token,id',
            'payment_method_id' => 'required|integer|exists:payment_method,id',
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

            'address_id.required' => 'El campo :attribute es obligatorio',
            'address_id.integer' => 'El campo :attribute debe ser un número entero',
            'address_id.exists' => 'La dirección seleccionada no es válida.',

            'card_token_id.required' => 'Debe seleccionar una tarjeta.',
            'card_token_id.integer' => 'El ID de tarjeta debe ser un número.',
            'card_token_id.exists' => 'La tarjeta seleccionada no es válida.',

            'payment_method_id.required' => 'Debe seleccionar un método de pago.',
            'payment_method_id.integer' => 'El ID del método de pago debe ser un número.',
            'payment_method_id.exists' => 'El método de pago seleccionado no es válido.',
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
