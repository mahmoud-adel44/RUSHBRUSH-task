<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\OrderItem */
class OrderItemResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'amount' => $this->amount,
            'created_at' => $this->created_at,
            'order' => OrderResource::make(
                $this->whenLoaded('order')
            ),
            'product' => ProductResource::make(
                $this->whenLoaded('product')
            ),
        ];
    }
}
