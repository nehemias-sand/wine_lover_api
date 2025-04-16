<?php

namespace App\Http\Requests\Presentation;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreatePresentationRequest extends FormRequest
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
            'amount' => 'required|integer|min:1',
            'unit_measurement_id' => 'required|integer|exists:unit_measurement,id',
        ];
    }

    public function messages(): array
    {
        return [
            'amount.required' => 'El campo :attribute es obligatorio',
            'amount.integer' => 'El campo :attribute debe ser un entero',
            'amount.min' => 'El campo :attribute debe ser un entero mayor o igual a uno',
            'unit_measurement_id.required' => 'El campo :attribute es obligatorio',
            'unit_measurement_id.integer' => 'El campo :attribute debe ser un entero',
            'unit_measurement_id.exists' => 'El campo :attribute debe ser un id valido',
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
