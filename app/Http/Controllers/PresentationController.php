<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\Presentation\CreatePresentationRequest;
use App\Http\Requests\Presentation\UpdatePresentationRequest;
use App\Http\Resources\PresentationResource;
use App\Services\PresentationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresentationController extends Controller
{
    public function __construct(
        private PresentationService $presentationService
    ) {}

    public function index(Request $request)
    {
        $pagination = array_merge([
            'paginate' => 'true',
            'per_page' => 10
        ], $request->only(['paginate', 'per_page']));

        $filter = $request->only([
            'name',
            'unit_measurement_id',
            'stock_less_than',
            'stock_greater_than',
        ]);

        $data = $this->presentationService->index($pagination, $filter);
        return ApiResponseClass::sendResponse(PresentationResource::collection($data));
    }

    public function show($id)
    {
        $presentation = $this->presentationService->show($id);
        if (!$presentation) return ApiResponseClass::sendResponse(null, "Presentacion de producto con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new PresentationResource($presentation));
    }

    public function store(CreatePresentationRequest $request)
    {
        $data = $request->only([
            'amount',
            'unit_measurement_id',
        ]);

        DB::beginTransaction();

        try {
            $presentation = $this->presentationService->store($data);
            DB::commit();

            return ApiResponseClass::sendResponse(new PresentationResource($presentation), null, 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    public function update(UpdatePresentationRequest $request, $id)
    {
        $data = $request->only([
            'amount',
            'unit_measurement_id',
        ]);

        $presentation = $this->presentationService->update($id, $data);
        if (!$presentation) return ApiResponseClass::sendResponse(null, "Presentacion de producto con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new PresentationResource($presentation));
    }

    public function delete($id)
    {
        $presentation = $this->presentationService->delete($id);
        if (!$presentation) return ApiResponseClass::sendResponse(null, "Presentacion de producto con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new PresentationResource($presentation));
    }
}
