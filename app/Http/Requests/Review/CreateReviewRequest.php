<?php

namespace App\Http\Requests\Review;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateReviewRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'El campo :attribute es obligatorio',
            'title.string' => 'El campo :attribute debe ser una cadena',
            'content.required' => 'El campo :attribute es obligatorio',
            'content.string' => 'El campo :attribute debe ser una cadena',
            'cover_image.required' => 'El campo :attribute es obligatorio',
            'cover_image.string' => 'El campo :attribute debe ser una cadena',
            'user_id.required' => 'El campo :attribute es obligatorio',
            'user_id.integer' => 'El campo :attribute debe ser un entero',
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
