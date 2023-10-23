<?php

namespace App\Helpers\Traits;

use Illuminate\Contracts\Pagination\LengthAwarePaginator as LengthAwarePaginatorContract;

/**
 * @mixin LengthAwarePaginatorContract
 */
trait PaginationLinksHelper
{
    public function links(): array
    {
        return [
            'total_pages' => $this->lastPage(),
            'current_page' => $this->currentPage(),
            'per_page' => $this->perPage(),
            'total_items' => $this->total(),
        ];
    }
}
