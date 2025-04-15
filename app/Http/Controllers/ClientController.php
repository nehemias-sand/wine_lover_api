<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\Auth\RegisterClientRequest;
use App\Http\Requests\Auth\UpdateClientRequest;
use App\Http\Resources\ClientResource;
use App\Http\Resources\UserResource;
use App\Services\AuthService;
use App\Services\ClientService;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class ClientController extends Controller
{
    public function __construct(
        private ClientService $clientService,
        private AuthService $authService
    ) {}

    public function registerClient(RegisterClientRequest $request)
    {
        DB::beginTransaction();

        try {
            $dataUser = [
                'username' => $request->username,
                'email' => $request->email,
                'password' => $request->password,
                'profile_id' => 2,
            ];

            $user = $this->authService->register($dataUser);

            $dataClient = [
                'names' => $request->names,
                'surnames' => $request->surnames,
                'identity_number' => $request->identity_number,
                'birthday_date' => $request->birthday_date,
                'phone' => $request->phone,
                'user_id' => $user->id,
            ];

            $dataAddress = [
                'name' => $request->name,
                'neighborhood' => $request->neighborhood,
                'street' => $request->street,
                'number' => $request->number,
                'reference' => $request->reference,
                'district_id' => $request->district_id,
            ];

            $client = $this->clientService->store($dataClient, $dataAddress);

            $token = JWTAuth::fromUser($user);

            DB::commit();

            return ApiResponseClass::sendResponse([
                'user' => new UserResource($user),
                'client' => new ClientResource($client),
                'token' => $token,
            ], null, 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    public function update($id, UpdateClientRequest $request)
    {
        DB::beginTransaction();

        try {
            $dataClient = [
                'names' => $request->names,
                'surnames' => $request->surnames,
                'identity_number' => $request->identity_number,
                'birthday_date' => $request->birthday_date,
                'phone' => $request->phone,
            ];

            $dataUser = [
                'username' => $request->username,
                'email' => $request->email,
            ];

            $client = $this->clientService->update($id, $dataClient);

            $user = $this->authService->update($client->user_id, $dataUser);

            DB::commit();

            return ApiResponseClass::sendResponse([
                'user' => new UserResource($user),
                'client' => new ClientResource($client),
            ], null, 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }
}
