<?php

namespace App\Http\Requests\Membership;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AcquireMembershipRequest extends FormRequest
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
            'automatic_renewal' => 'required|boolean',

            'card_token_id' => 'required|boolean|exists:card_token,id',

            'address_id' => 'required|integer|exists:address,id',

            'membership_id' => 'required|integer|exists:membership,id',

            'plan_id' => 'required|integer|exists:plan,id',

            'payment_method_id' => 'required|integer|exists:payment_method,id',
        ];
    }

    public function messages(): array
    {
        return [
            'automatic_renewal.required' => 'Debe indicar si desea la renovación automática.',
            'automatic_renewal.boolean' => 'El campo renovación automática debe ser verdadero o falso.',

            'membership_id.required' => 'Debe seleccionar una membresía.',
            'membership_id.integer' => 'El ID de membresía debe ser un número.',
            'membership_id.exists' => 'La membresía seleccionada no es válida.',

            'plan_id.required' => 'Debe seleccionar un plan.',
            'plan_id.integer' => 'El ID del plan debe ser un número.',
            'plan_id.exists' => 'El plan seleccionado no es válido.',

            'payment_method_id.required' => 'Debe seleccionar un método de pago.',
            'payment_method_id.integer' => 'El ID del método de pago debe ser un número.',
            'payment_method_id.exists' => 'El método de pago seleccionado no es válido.',
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
