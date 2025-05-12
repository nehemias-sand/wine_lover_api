<?php

namespace App\Http\Requests\CardToken;

use App\Rules\ValidCardNumber;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateCardTokenRequest extends FormRequest
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
            'card' => 'required|array',

            'card.number' => [
                'required',
                'string',
                new ValidCardNumber,
                // Visa: 4xxxxxxxxxxxxxxx — Mastercard: 51-55 / 2221-2720
                'regex:/^(4\d{12}(\d{3})?|5[1-5]\d{14}|2(2[2-9]\d{2}|[3-6]\d{3}|7[01]\d{2}|720\d{2})\d{10})$/',
            ],

            'card.cvv' => 'required|numeric|digits:3',

            'card.expiration_month' => [
                'required',
                'integer',
                'between:1,12'
            ],

            'card.expiration_year' => [
                'required',
                'integer',
                'min:' . date('Y'),
                'max:' . (date('Y') + 20),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            // Arreglo principal
            'card.required' => 'Debe proporcionar al menos una tarjeta de crédito o débito.',
            'card.array' => 'El campo tarjetas debe ser un arreglo válido.',

            // Número de tarjeta
            'card.*.number.required' => 'El número de tarjeta es obligatorio.',
            'card.*.number.string' => 'El número de tarjeta debe ser una cadena de texto.',
            'card.*.number.regex' => 'El número de tarjeta no tiene un formato válido.',

            // CVV
            'card.*.cvv.required' => 'El código de seguridad (CVV) es obligatorio.',
            'card.*.cvv.numeric' => 'El código de seguridad debe ser un número.',
            'card.*.cvv.digits' => 'El código de seguridad debe tener 3 dígitos.',

            // Mes de vencimiento
            'card.*.expiration_month.required' => 'El mes de vencimiento es obligatorio.',
            'card.*.expiration_month.integer' => 'El mes de vencimiento debe ser un número.',
            'card.*.expiration_month.between' => 'El mes de vencimiento debe estar entre 1 y 12.',

            // Año de vencimiento
            'card.*.expiration_year.required' => 'El año de vencimiento es obligatorio.',
            'card.*.expiration_year.integer' => 'El año de vencimiento debe ser un número.',
            'card.*.expiration_year.min' => 'El año de vencimiento no puede estar en el pasado.',
            'card.*.expiration_year.max' => 'El año de vencimiento es demasiado lejano.',
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
