<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\Product\CreateProductPresentationRequest;
use App\Http\Requests\Product\UpdateProductPresentationRequest;
use App\Http\Resources\ProductPresentationResource;
use App\Services\ProductPresentationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductPresentationController extends Controller
{
    public function __construct(
        private ProductPresentationService $productPresentationService
    ) {}

    public function index(Request $request, int $productId)
    {
        $pagination = array_merge([
            'paginate' => 'true',
            'per_page' => 10
        ], $request->only(['paginate', 'per_page']));

        $filter = $request->only(['stock_greater_than_or_equal', 'stock_less_than_or_equal']);
        $filter['product_id'] = $productId;

        $data = $this->productPresentationService->index($pagination, $filter);
        return ApiResponseClass::sendResponse(ProductPresentationResource::collection($data));
    }

    public function show($productId, $presentationId)
    {
        $ids = ['product_id' => $productId, 'presentation_id' => $presentationId];

        $productPresentation = $this->productPresentationService->show($ids);
        if (!$productPresentation) return ApiResponseClass::sendResponse(null, "Presentacion de producto con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new ProductPresentationResource($productPresentation));
    }

    public function store(CreateProductPresentationRequest $request)
    {
        $data = $request->only([
            'product_id',
            'presentation_id',
            'stock',
            'unit_price'
        ]);

        DB::beginTransaction();

        try {
            $productPresentations = $this->productPresentationService->store($data);
            DB::commit();

            return ApiResponseClass::sendResponse(new ProductPresentationResource($productPresentations), null, 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    public function update(UpdateProductPresentationRequest $request, int $productId, int $presentationId)
    {
        $ids = [
            'product_id' => $productId,
            'presentation_id' => $presentationId,
        ];

        $data = $request->only(['stock', 'unit_price']);

        $productPresentations = $this->productPresentationService->update($ids, $data);
        if (!$productPresentations) return ApiResponseClass::sendResponse(null, "Presentacion de producto con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new ProductPresentationResource($productPresentations));
    }

    public function delete(int $productId, int $presentationId)
    {
        $ids = [
            'product_id' => $productId,
            'presentation_id' => $presentationId,
        ];

        $productPresentation = $this->productPresentationService->delete($ids);
        if (!$productPresentation) return ApiResponseClass::sendResponse(null, "Presentacion de producto con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new ProductPresentationResource($productPresentation));
    }
}
