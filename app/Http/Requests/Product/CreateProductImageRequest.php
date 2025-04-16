<?php

namespace App\Http\Requests\Product;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateProductImageRequest extends FormRequest
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
            'product_id' => 'required|integer|exists:product,id',
            'images' => 'array|min:1|max:5',
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ];
    }

    public function messages(): array
    {
        return [
            'images.array' => 'El campo :attribute debe ser un array',
            'images.min' => 'El campo :attribute debe tener un elemento como minimo',
            'images.max' => 'El campo :attribute debe tener cinco elementos como maximo',
            'images.*.required' => 'El campo :attribute es obligatorio',
            'images.*.image' => 'El archivo debe ser una imagen',
            'images.*.mimes' => 'La imagen debe ser un archivo de tipo: JPG, JPEG, PNG',
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
