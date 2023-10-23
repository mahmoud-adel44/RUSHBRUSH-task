<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request): JsonResponse
    {
        $order = DB::transaction(
            callback: static function () use ($request) {
                /** @var Order $order  */
                $order = $request->user()->orders()->create();

                $order->addItems($request->get('items'));

                return $order;
            }
        );

        return $this->successCreated(
            data: OrderResource::make($order),
            model: Order::class
        );
    }

    public function update(StoreOrderRequest $request,Order $order): JsonResponse
    {
        $order->items()->upsert(
            values: $request->get('items', []),
            uniqueBy: ['order_id', 'product_id'],
            update: ['amount']
        );

        return $this->successUpdated(
            data: $order,
            model: Order::class
        );
    }
}
