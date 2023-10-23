<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Order */
class OrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'number' => $this->number,
            'status' => $this->status->name(),
            'user' => UserResource::make($this->whenLoaded('user')),
            'created_at' => $this->created_at,
            'items' => OrderItemResource::collection(
                $this->whenLoaded('items')
            ),
        ];
    }
}
