<?php

namespace App\Http\Requests\Review;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateReviewRequest extends FormRequest
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
            'title' => 'string',
            'content' => 'string',
            'cover_image' => 'image|mimes:jpeg,png,jpg|max:5120',
        ];
    }

    public function messages(): array
    {
        return [
            'title.string' => 'El campo :attribute debe ser una cadena',
            'content.string' => 'El campo :attribute debe ser una cadena',
            'cover_image.string' => 'El campo :attribute debe ser una cadena',
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
