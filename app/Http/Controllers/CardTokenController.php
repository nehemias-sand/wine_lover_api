<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\CardToken\CreateCardTokenRequest;
use App\Http\Requests\CardToken\UpdateCardTokenRequest;
use App\Http\Resources\CardTokenResource;
use App\Services\CardTokenService;
use Illuminate\Support\Facades\DB;

class CardTokenController extends Controller
{
    public function __construct(
        private CardTokenService $cardTokenService
    ) {}

    public function indexClient()
    {
        $client = auth()->user()->client;
        if (!$client) return ApiResponseClass::sendResponse(null, "Cliente encontrado", 404);

        $data = $this->cardTokenService->indexClient($client->id);

        return ApiResponseClass::sendResponse(CardTokenResource::collection($data));
    }

    public function tokenizeCard(CreateCardTokenRequest $request)
    {
        $client = auth()->user()->client;
        if (!$client) return ApiResponseClass::sendResponse(null, "Cliente encontrado", 404);

        $data = $request->only([
            'card',
        ]);

        $data['client_id'] = $client->id;

        DB::beginTransaction();

        try {
            $cardToken = $this->cardTokenService->tokenizeCard($data);
            DB::commit();

            return ApiResponseClass::sendResponse(new CardTokenResource($cardToken), null, 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    public function updateTokenizedCard(UpdateCardTokenRequest $request, $id)
    {
        $client = auth()->user()->client;
        if (!$client) return ApiResponseClass::sendResponse(null, "Cliente encontrado", 404);

        $data = $request->only([
            'card',
        ]);

        DB::beginTransaction();

        try {
            $cardToken = $this->cardTokenService->updateTokenizedCard($id, $data);
            if (!$cardToken) return ApiResponseClass::sendResponse(null, "Token de tarjeta con ID $id no encontrado", 404);

            if ($cardToken->client_id !== $client->id) {
                return ApiResponseClass::sendResponse(null, "Tarjeta no valida", 403);
            }

            DB::commit();
            return ApiResponseClass::sendResponse(new CardTokenResource($cardToken));
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    public function deleteTokenizedCard($id)
    {
        $client = auth()->user()->client;
        if (!$client) return ApiResponseClass::sendResponse(null, "Cliente encontrado", 404);

        DB::beginTransaction();

        try {
            $cardToken = $this->cardTokenService->deleteTokenizedCard($id);
            if (!$cardToken) return ApiResponseClass::sendResponse(null, "Token de tarjeta con ID $id no encontrado", 404);


            if ($cardToken->client_id !== $client->id) {
                return ApiResponseClass::sendResponse(null, "Tarjeta no valida", 403);
            }

            DB::commit();
            return ApiResponseClass::sendResponse(new CardTokenResource($cardToken));
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }
}
