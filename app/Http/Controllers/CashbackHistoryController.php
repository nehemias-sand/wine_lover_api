<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\ApiResponseClass;
use App\Http\Resources\CashbackHistoryResource;
use App\Services\CashbackHistoryService;

class CashbackHistoryController extends Controller
{
    public function __construct(private CashbackHistoryService $cashbackHistoryService) {}

    public function indexClient(Request $request)
    {
        $client = auth()->user()->client;
        if (!$client) return ApiResponseClass::sendResponse(null, "Cliente encontrado", 404);

        $pagination = array_merge([
            'paginate' => 'true',
            'per_page' => 10
        ], $request->only(['paginate', 'per_page']));

        $data = $this->cashbackHistoryService->index($pagination, $client->id);

        return ApiResponseClass::sendResponse(CashbackHistoryResource::collection($data));
    }
}
