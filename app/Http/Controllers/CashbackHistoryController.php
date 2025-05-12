<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Resources\CashbackHistoryResource;

class CashbackHistoryController extends Controller
{
    public function indexClient()
    {
        $client = auth()->user()->client;
        if (!$client) return ApiResponseClass::sendResponse(null, "Cliente encontrado", 404);

        return ApiResponseClass::sendResponse(
            CashbackHistoryResource::collection($client->cashbackHistory)
        );
    }
}
