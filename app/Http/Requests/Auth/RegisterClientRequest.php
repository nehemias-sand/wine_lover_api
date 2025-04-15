<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterClientRequest extends FormRequest
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
            'names'            => 'required|string|max:255',
            'surnames'         => 'required|string|max:255',
            'identity_number'  => 'required|numeric',
            'birthday_date'    => 'required|date',
            'phone'            => 'required|numeric',

            'username'         => 'required|string|unique:users,username|max:255',
            'email'            => 'required|email|unique:users,email|max:255',
            'password'         => 'required|string|min:6',

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
            'names.required' => 'El nombre es obligatorio',
            'names.string' => 'El nombre debe ser una cadena de texto',
            'names.max' => 'El nombre no debe exceder los 255 caracteres',

            'surnames.required' => 'El apellido es obligatorio',
            'surnames.string' => 'El apellido debe ser una cadena de texto',
            'surnames.max' => 'El apellido no debe exceder los 255 caracteres',

            'identity_number.required' => 'El número de identidad es obligatorio',
            'identity_number.numeric' => 'El número de identidad debe ser numérico',
            'identity_number.unique' => 'El número de identidad ya está registrado',

            'birthday_date.required' => 'La fecha de nacimiento es obligatoria',
            'birthday_date.date' => 'La fecha de nacimiento debe ser una fecha válida',

            'phone.required' => 'El teléfono es obligatorio',
            'phone.numeric' => 'El teléfono debe ser numérico',

            'username.required' => 'El nombre de usuario es obligatorio',
            'username.string' => 'El nombre de usuario debe ser una cadena de texto',
            'username.unique' => 'El nombre de usuario ya está en uso',
            'username.max' => 'El nombre de usuario no debe exceder los 255 caracteres',

            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'El correo electrónico debe tener un formato válido',
            'email.unique' => 'El correo electrónico ya está registrado',
            'email.max' => 'El correo electrónico no debe exceder los 255 caracteres',

            'password.required' => 'La contraseña es obligatoria',
            'password.string' => 'La contraseña debe ser una cadena de texto',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres',

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
            'district_id.exists' => 'El distrito seleccionado no es válido',
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
