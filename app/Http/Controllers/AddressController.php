<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\Address\CreateAddressClient;
use App\Http\Requests\Address\UpdateAddressClient;
use App\Http\Resources\AddressResource;
use App\Services\AddressService;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function __construct(
        private AddressService $addressService
    ) {}

    public function indexClient()
    {
        $client = auth()->user()->client;
        if (!$client) return ApiResponseClass::sendResponse(null, "Cliente encontrado", 404);

        $data = $this->addressService->indexClient($client->id);

        return ApiResponseClass::sendResponse(AddressResource::collection($data));
    }

    public function store(CreateAddressClient $request)
    {
        DB::beginTransaction();

        try {
            $client = auth()->user()->client;

            $data = [
                'name'          => $request->name,
                'neighborhood'  => $request->neighborhood,
                'street'        => $request->street,
                'number'        => $request->number,
                'reference'     => $request->reference,
                'district_id'   => $request->district_id,
                'client_id'     => $client->id,
            ];

            DB::commit();

            $address = $this->addressService->store($data);

            return ApiResponseClass::sendResponse(new AddressResource($address), null, 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    public function update($id, UpdateAddressClient $request)
    {
        $client = auth()->user()->client;
        if (!$client) return ApiResponseClass::sendResponse(null, "Cliente encontrado", 404);

        DB::beginTransaction();

        try {
            $data = $request->only(
                ['name', 'neighborhood', 'street', 'number', 'reference', 'district_id']
            );

            $address = $this->addressService->update($id, $data);

            if ($address->client_id !== $client->id) {
                return ApiResponseClass::sendResponse(null, "Direccion no valida", 403);
            }

            DB::commit();
            return ApiResponseClass::sendResponse(new AddressResource($address), null, 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    public function delete($id)
    {
        $client = auth()->user()->client;
        if (!$client) return ApiResponseClass::sendResponse(null, "Cliente encontrado", 404);

        DB::beginTransaction();

        try {
            $address = $this->addressService->delete($id);
            if (!$address) return ApiResponseClass::sendResponse(null, "Direccion con ID $id no encontrada", 404);


            if ($address->client_id !== $client->id) {
                return ApiResponseClass::sendResponse(null, "Direccion no valida", 403);
            }

            DB::commit();
            return ApiResponseClass::sendResponse(new AddressResource($address));
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }
}
