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
        DB::beginTransaction();

        try {
            $data = $request->only(
                ['name', 'neighborhood', 'street', 'number', 'reference', 'district_id']
            );

            DB::commit();

            $address = $this->addressService->update($id, $data);

            return ApiResponseClass::sendResponse(new AddressResource($address), null, 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }
}
