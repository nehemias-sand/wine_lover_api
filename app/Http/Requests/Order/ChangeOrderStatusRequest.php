<?php

namespace App\Http\Requests\Order;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ChangeOrderStatusRequest extends FormRequest
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
            'order_status_id' => 'required|integer|exists:order_status,id'
        ];
    }

    public function messages(): array
    {
        return [
            'order_status_id.required' => 'Debe seleccionar un método de pago.',
            'order_status_id.integer' => 'El ID del método de pago debe ser un número.',
            'order_status_id.exists' => 'El método de pago seleccionado no es válido.',
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
