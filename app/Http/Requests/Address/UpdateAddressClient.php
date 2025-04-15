<?php

namespace App\Http\Requests\Address;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateAddressClient extends FormRequest
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
            'name'         => 'sometimes|string|max:255',
            'neighborhood' => 'sometimes|string|max:255',
            'street'       => 'sometimes|string|max:255',
            'number'       => 'sometimes|string|max:50',
            'reference'    => 'nullable|string|max:255',
            'district_id'  => 'sometimes|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'El nombre de la dirección debe ser una cadena de texto',
            'name.max' => 'El nombre de la dirección no debe exceder los 255 caracteres',

            'neighborhood.string' => 'El barrio debe ser una cadena de texto',
            'neighborhood.max' => 'El barrio no debe exceder los 255 caracteres',

            'street.string' => 'La calle debe ser una cadena de texto',
            'street.max' => 'La calle no debe exceder los 255 caracteres',

            'number.string' => 'El número de casa debe ser una cadena de texto',
            'number.max' => 'El número de casa no debe exceder los 50 caracteres',

            'reference.string' => 'La referencia debe ser una cadena de texto',
            'reference.max' => 'La referencia no debe exceder los 255 caracteres',

            'district_id.integer' => 'El distrito debe ser un número entero',
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
