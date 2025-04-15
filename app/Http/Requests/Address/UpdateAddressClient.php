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
            'name'             => 'required|string|max:255',
            'neighborhood'     => 'required|string|max:255',
            'street'           => 'required|string|max:255',
            'number'           => 'required|string|max:50',
            'reference'        => 'nullable|string|max:255',
            'district_id'      => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre de la dirección es obligatorio',
            'name.string' => 'El nombre de la dirección debe ser una cadena de texto',
            'name.max' => 'El nombre de la dirección no debe exceder los 255 caracteres',

            'neighborhood.required' => 'El barrio es obligatorio',
            'neighborhood.string' => 'El barrio debe ser una cadena de texto',
            'neighborhood.max' => 'El barrio no debe exceder los 255 caracteres',

            'street.required' => 'La calle es obligatoria',
            'street.string' => 'La calle debe ser una cadena de texto',
            'street.max' => 'La calle no debe exceder los 255 caracteres',

            'number.required' => 'El número de casa es obligatorio',
            'number.string' => 'El número de casa debe ser una cadena de texto',
            'number.max' => 'El número de casa no debe exceder los 50 caracteres',

            'reference.string' => 'La referencia debe ser una cadena de texto',
            'reference.max' => 'La referencia no debe exceder los 255 caracteres',

            'district_id.required' => 'El distrito es obligatorio',
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
