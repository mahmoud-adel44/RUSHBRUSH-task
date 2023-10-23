<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrderRequest;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function index(): JsonResponse
    {
        $orders = Order::with('items', 'user')->paginate();

        return $this->successResponse(
            data: OrderCollection::make($orders),
        );
    }

    public function update(OrderRequest $request, Order $order): JsonResponse
    {
        $order->update($request->validated());

        return $this->successUpdated(
            data: OrderResource::make($order),
            model: Order::class
        );
    }
}
