<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\User */
class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type->name(),
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at?->diffForHumans(),
        ];
    }
}
