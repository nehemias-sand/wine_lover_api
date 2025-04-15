<?php

namespace App\Http\Requests\Auth;

use App\Models\Client;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
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
        $userId = $this->route('id')
            ? optional(Client::find($this->route('id')))->user_id
            : null;

        return [
            'names'           => 'sometimes|string|max:255',
            'surnames'        => 'sometimes|string|max:255',
            'identity_number' => 'sometimes|numeric',
            'birthday_date'   => 'sometimes|date',
            'phone'           => 'sometimes|numeric',

            'username' => [
                'sometimes',
                'string',
                'max:255',
                Rule::unique('users', 'username')->ignore($userId),
            ],

            'email' => [
                'sometimes',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($userId),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'names.string' => 'El nombre debe ser una cadena de texto',
            'names.max' => 'El nombre no debe exceder los 255 caracteres',

            'surnames.string' => 'El apellido debe ser una cadena de texto',
            'surnames.max' => 'El apellido no debe exceder los 255 caracteres',

            'identity_number.numeric' => 'El número de identidad debe ser numérico',

            'birthday_date.date' => 'La fecha de nacimiento debe ser una fecha válida',

            'phone.numeric' => 'El teléfono debe ser numérico',

            'username.string' => 'El nombre de usuario debe ser una cadena de texto',
            'username.unique' => 'El nombre de usuario ya está en uso',
            'username.max' => 'El nombre de usuario no debe exceder los 255 caracteres',

            'email.email' => 'El correo electrónico debe tener un formato válido',
            'email.unique' => 'El correo electrónico ya está registrado',
            'email.max' => 'El correo electrónico no debe exceder los 255 caracteres',
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
