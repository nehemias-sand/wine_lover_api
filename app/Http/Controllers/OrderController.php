<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\Order\CreateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Services\OrderService;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct(
        private OrderService $orderService
    ) {}

    public function index(Request $request) {}

    public function indexClient(Request $request) {}

    public function show($id) {}

    public function createOrder(CreateOrderRequest $request)
    {
        DB::beginTransaction();

        try {
            $order = $this->orderService->store($request->validated());

            DB::commit();
            return ApiResponseClass::sendResponse(new OrderResource($order), null, 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    public function updateState(Request $request) {}
}
