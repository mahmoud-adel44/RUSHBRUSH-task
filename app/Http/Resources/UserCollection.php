<?php

namespace App\Http\Resources;

use App\Helpers\Traits\PaginationLinksHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \App\Models\User */
class UserCollection extends ResourceCollection
{
    use PaginationLinksHelper;

    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
            'links' => $this->links(),
        ];
    }
}
