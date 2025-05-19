<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\Order\ChangeOrderStatusRequest;
use App\Http\Requests\Order\CreateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Services\OrderService;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct(
        private OrderService $orderService
    ) {}

    public function index(Request $request)
    {
        $pagination = array_merge([
            'paginate' => 'true',
            'per_page' => 10
        ], $request->only(['paginate', 'per_page']));

        $filter = $request->only(['order_status_id']);

        $data = $this->orderService->index($pagination, $filter);
        return ApiResponseClass::sendResponse(OrderResource::collection($data));
    }

    public function indexClient(Request $request)
    {
        $client = auth()->user()->client;
        if (!$client) return ApiResponseClass::sendResponse(null, "Cliente encontrado", 404);

        $pagination = array_merge([
            'paginate' => 'true',
            'per_page' => 10
        ], $request->only(['paginate', 'per_page']));

        $filter = ['client_id' => $client->id];

        $data = $this->orderService->index($pagination, $filter);
        return ApiResponseClass::sendResponse(OrderResource::collection($data));
    }

    public function show($id)
    {
        $order = $this->orderService->show($id);
        if (!$order) return ApiResponseClass::sendResponse(null, "Orden con ID $id no encontrado", 404);

        $client = auth()->user()->client;
        if ($client && $client->id !== $order->client_id) {
            return ApiResponseClass::sendResponse(null, "Orden con ID $id no le pertenece al cliente", 403);
        }

        return ApiResponseClass::sendResponse(new OrderResource($order));
    }

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

    public function updateStatus(ChangeOrderStatusRequest $request, $id)
    {
        $orderStatusId = $request->get('order_status_id');

        $order = $this->orderService->updateStatus($id, $orderStatusId);
        if (!$order) return ApiResponseClass::sendResponse(null, "Order con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new OrderResource($order));
    }
}
