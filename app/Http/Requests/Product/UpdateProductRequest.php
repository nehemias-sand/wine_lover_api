<?php

namespace App\Http\Requests\Product;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateProductRequest extends FormRequest
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
            'name' => 'string',
            'description' => 'string',
            'state' => 'boolean',
            'category_product_id' => 'integer|exists:category_product,id',
            'quality_product_id' => 'integer|exists:quality_product,id',
            'manufacturer_id' => 'integer|exists:manufacturer,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'El campo :attribute debe ser una cadena',
            'description.string' => 'El campo :attribute debe ser una cadena',
            'state.boolean' => 'El campo :attribute debe ser un booleano',
            'category_product_id.integer' => 'El campo :attribute debe ser un entero',
            'category_product_id.exists' => 'El campo :attribute debe ser un id valido',
            'quality_product_id.integer' => 'El campo :attribute debe ser un entero',
            'quality_product_id.exists' => 'El campo :attribute debe ser un id valido',
            'manufacturer_id.integer' => 'El campo :attribute debe ser un entero',
            'manufacturer_id.exists' => 'El campo :attribute debe ser un id valido',
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
