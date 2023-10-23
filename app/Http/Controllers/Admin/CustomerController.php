<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Models\User;

class CustomerController extends Controller
{
    public function __invoke()
    {
        $customers = User::query()
            ->onlyCustomers()
            ->paginate();

        return $this->successResponse(
            data: UserCollection::make($customers)
        );
    }
}
