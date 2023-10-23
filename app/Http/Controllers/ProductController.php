<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $products = Product::paginate();

        return $this->successResponse(
            data: ProductCollection::make($products)
        );
    }
}
