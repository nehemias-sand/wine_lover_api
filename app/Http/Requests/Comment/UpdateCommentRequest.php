<?php

namespace App\Http\Requests\Comment;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateCommentRequest extends FormRequest
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
            'content' => 'string',
            'parent_id' => 'nullable|integer',
            'review_id' => 'integer|exists:review,id',
        ];
    }

    public function messages(): array
    {
        return [
            'content.string' => 'El campo :attribute debe ser una cadena',
            'parent_id.integer' => 'El campo :attribute debe ser un entero',
            'review_id.integer' => 'El campo :attribute debe ser un entero'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'succes' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ], 422));
    }
}
