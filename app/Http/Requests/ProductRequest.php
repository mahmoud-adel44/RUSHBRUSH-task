<?php

namespace App\Http\Requests;

use App\Helpers\Traits\FailedValidationHelper;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    use FailedValidationHelper;

    public function rules(): array
    {
        return [
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required', 'numeric'],
            'amount' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
