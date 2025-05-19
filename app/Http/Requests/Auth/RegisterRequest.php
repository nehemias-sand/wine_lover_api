<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
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
            'username' => 'required|string|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'profile_id' => 'integer|required|exists:profile,id',
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'El campo :attribute es obligatorio',
            'username.string' => 'El campo :attribute debe ser una cadena',
            'username.unique' => 'El campo :attribute debe ser unico',
            'email.required' => 'El campo :attribute es obligatorio',
            'email.email' => 'El campo :attribute debe ser un correo',
            'email.unique' => 'El campo :attribute debe ser unico',
            'profile_id.required' => 'El campo :attribute es obligatorio',
            'profile_id.integer' => 'El campo :attribute debe ser un entero',
            'profile_id.exists' => 'El perfil seleccionado no es válido',
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
