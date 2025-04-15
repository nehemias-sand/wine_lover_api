<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct(
        private ProductService $productService
    ) {}

    public function index(Request $request) {
        $pagination = array_merge([
            'paginate' => 'true',
            'per_page' => 10
        ], $request->only(['paginate', 'per_page']));

        $filter = $request->only(['name', 'category_product_id', 'quality_product_id']);

        $data = $this->productService->index($pagination, $filter);
        return ApiResponseClass::sendResponse(ProductResource::collection($data));
    }

    public function show($id) {
        $product = $this->productService->show($id);
        if (!$product) return ApiResponseClass::sendResponse(null, "Producto con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new ProductResource($product));
    }

    public function store(CreateProductRequest $request)
    {
        $data = $request->only([
            'name',
            'description',
            'state',
            'category_product_id',
            'quality_product_id',
        ]);

        $presentations = $request->presentations;
        $images = $request->file('images');

        DB::beginTransaction();

        try {
            $product = $this->productService->store($data, $presentations, $images);
            DB::commit();

            return ApiResponseClass::sendResponse(new ProductResource($product), null, 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    public function update(UpdateProductRequest $request, $id) {
        $data = $request->only([
            'name',
            'description',
            'state',
            'category_product_id',
            'quality_product_id',
        ]);

        $product = $this->productService->update($id, $data);
        if (!$product) return ApiResponseClass::sendResponse(null, "Producto con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new ProductResource($product));
    }

    public function delete($id) {
        $product = $this->productService->delete($id);
        if (!$product) return ApiResponseClass::sendResponse(null, "Producto con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new ProductResource($product));
    }
}
