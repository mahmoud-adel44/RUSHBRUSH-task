<?php

namespace App\Http\Requests\Admin;

use App\Enums\OrderStatus;
use App\Helpers\Traits\FailedValidationHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
{
    use FailedValidationHelper;
    public function rules(): array
    {
        return [
            'status' => ['required', Rule::enum(OrderStatus::class)],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
