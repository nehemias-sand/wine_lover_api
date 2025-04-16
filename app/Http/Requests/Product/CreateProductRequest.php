<?php

namespace App\Http\Requests\Product;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateProductRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|string',
            'state' => 'required|string|in:true,false,1,0',
            'presentations' => 'array|min:1',
            'presentations.*.id' => 'required|integer|exists:presentation,id',
            'presentations.*.stock' => 'required|integer|min:1',
            'presentations.*.unit_price' => 'required|numeric|min:1',
            'images' => 'array|min:1|max:5',
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'category_product_id' => 'required|integer|exists:category_product,id',
            'quality_product_id' => 'required|integer|exists:quality_product,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El campo :attribute es obligatorio',
            'name.string' => 'El campo :attribute debe ser una cadena',

            'description.required' => 'El campo :attribute es obligatorio',
            'description.string' => 'El campo :attribute debe ser una cadena',

            'state.required' => 'El campo :attribute es obligatorio',
            'state.string' => 'El campo :attribute debe ser una cadena',

            'presentations.array' => 'El campo :attribute debe ser un array',
            'presentations.min' => 'El campo :attribute debe tener un elemento como minimo',
            'presentations.*.id.required' => 'El campo :attribute es obligatorio',
            'presentations.*.id.integer' => 'El campo :attribute debe ser un entero',
            'presentations.*.id.exists' => 'El campo :attribute debe ser un id valido',
            'presentations.*.stock.required' => 'El campo :attribute es obligatorio',
            'presentations.*.stock.integer' => 'El campo :attribute debe ser un entero',
            'presentations.*.stock.min' => 'El campo :attribute debe tener una valor mayor o igual a uno',
            'presentations.*.unit_price.required' => 'El campo :attribute es obligatorio',
            'presentations.*.unit_price.numeric' => 'El campo :attribute debe ser un número',
            'presentations.*.unit_price.min' => 'El campo :attribute debe tener una valor mayor o igual a uno',

            'images.array' => 'El campo :attribute debe ser un array',
            'images.min' => 'El campo :attribute debe tener un elemento como minimo',
            'images.max' => 'El campo :attribute debe tener cinco elementos como maximo',
            'images.*.required' => 'El campo :attribute es obligatorio',
            'images.*.image' => 'El archivo debe ser una imagen',
            'images.*.mimes' => 'La imagen debe ser un archivo de tipo: JPG, JPEG, PNG',

            'state.in' => 'El campo :attribute debe tener formato de booleano',

            'category_product_id.required' => 'El campo :attribute es obligatorio',
            'category_product_id.integer' => 'El campo :attribute debe ser un entero',
            'category_product_id.exists' => 'El campo :attribute debe ser un id valido',

            'quality_product_id.required' => 'El campo :attribute es obligatorio',
            'quality_product_id.integer' => 'El campo :attribute debe ser un entero',
            'quality_product_id.exists' => 'El campo :attribute debe ser un id valido',
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
