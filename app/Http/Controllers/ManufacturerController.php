<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\Manufacturer\CreateManufacturerRequest;
use App\Http\Requests\Manufacturer\UpdateManufacturerRequest;
use App\Http\Resources\ManufacturerResource;
use App\Models\Manufacturer;
use App\Services\ManufacturerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManufacturerController extends Controller
{

    public function __construct(private ManufacturerService $manufacturerService)
    {

    }

    public function index(Request $request)
    {
        $pagination = array_merge([
            'paginate' => 'true',
            'per_page' => 10
        ], $request->only(['paginate', 'per_page']));

        $filter = $request->only(['name']);

        $data = $this->manufacturerService->index($pagination, $filter);
        return ApiResponseClass::sendResponse(ManufacturerResource::collection($data));
    }


    public function show($id){
        $manufacturer=$this->manufacturerService->show($id);
        if(!$manufacturer) return ApiResponseClass::sendResponse(null, "manufacturador con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new ManufacturerResource($manufacturer));
    }

    public function store(CreateManufacturerRequest $request)
    {
        $data = $request->only([
            'name',
            'city',
            'country',
            'description',
        ]);

        DB::beginTransaction();

        try{
            $manufacturer=$this->manufacturerService->store($data);
            DB::commit();
            return ApiResponseClass::sendResponse(new ManufacturerResource($manufacturer), null, 201);
        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    public function update(UpdateManufacturerRequest $request, $id){
        $data = $request->only([
            'name',
            'city',
            'country',
            'description',
        ]);

        $manufacturer = $this->manufacturerService->update($id, $data);
        if(!$manufacturer) return ApiResponseClass::sendResponse(null, "manufacturadora no encontrada", 404);

        return ApiResponseClass::sendResponse(new ManufacturerResource($manufacturer));
    }

    public function delete($id){
        $manufacturer = $this->manufacturerService->delete($id);
        if(!$manufacturer) return ApiResponseClass::sendResponse(null, "manufacturador no encontrado", 404);

        return ApiResponseClass::sendResponse(new ManufacturerResource($manufacturer));
    }
}
