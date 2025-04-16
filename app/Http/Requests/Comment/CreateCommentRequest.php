<?php

namespace App\Http\Requests\Comment;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateCommentRequest extends FormRequest
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
            'content' => 'required|string',
            'parent_id' => 'nullable|integer',
            'review_id' => 'required|integer|exists:review,id',
        ];
    }

    public function messages(): array
    {
        return [
            'content.required' => 'El campo :attribute es obligatorio',
            'content.string' => 'El campo :attribute debe ser una cadena',
            'parent_id.integer' => 'El campo :attribute debe ser un entero',
            'review_id.required' => 'El campo :attribute es obligatorio',
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
