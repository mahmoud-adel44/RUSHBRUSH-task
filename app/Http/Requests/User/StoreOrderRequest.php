<?php

namespace App\Http\Requests\User;

use App\Helpers\Traits\FailedValidationHelper;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
{
    use FailedValidationHelper;
    public function rules(): array
    {
        return [
            'items' => ['required', 'array'],
            'items.*.product_id' => ['required', Rule::exists(Product::class)],
            'items.*.amount' => ['required' , 'numeric'],
        ];
    }

    public function authorize(): bool
    {
        return auth()->guard('sanctum')->user()->isCustomer();
    }
}
