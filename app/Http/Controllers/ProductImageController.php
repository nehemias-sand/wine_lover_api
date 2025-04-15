<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\Product\CreateProductImageRequest;
use App\Http\Resources\ProductImageResource;
use App\Services\ProductImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductImageController extends Controller
{
    public function __construct(
        private ProductImageService $productImageService
    ) {}

    public function index(Request $request, $productId) {
        $pagination = array_merge([
            'paginate' => 'true',
            'per_page' => 10
        ], $request->only(['paginate', 'per_page']));

        $filter = $request->only(['state']);
        $filter['product_id'] = $productId;

        $data = $this->productImageService->index($pagination, $filter);
        return ApiResponseClass::sendResponse(ProductImageResource::collection($data));
    }

    public function show($id) {
        $productImage = $this->productImageService->show($id);
        if (!$productImage) return ApiResponseClass::sendResponse(null, "Imagen de producto con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new ProductImageResource($productImage));
    }

    public function store(CreateProductImageRequest $request)
    {
        $images = $request->file('images');

        DB::beginTransaction();

        try {
            $productImages = $this->productImageService->store($request->product_id, $images);
            DB::commit();

            return ApiResponseClass::sendResponse(ProductImageResource::collection($productImages), null, 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    public function changeState($id) {
        $productImage = $this->productImageService->show($id);
        if (!$productImage) return ApiResponseClass::sendResponse(null, "Imagen de producto con ID $id no encontrado", 404);

        $data = [
            'state' => !$productImage->state
        ];

        $updatedProductImage = $this->productImageService->update($id, $data);
        if (!$productImage) return ApiResponseClass::sendResponse(null, "Imagen de producto con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new ProductImageResource($updatedProductImage));
    }

    public function delete($id) {
        $productImage = $this->productImageService->delete($id);
        if (!$productImage) return ApiResponseClass::sendResponse(null, "Imagen de producto con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new ProductImageResource($productImage));
    }
}
