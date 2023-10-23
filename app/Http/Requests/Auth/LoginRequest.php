<?php

namespace App\Http\Requests\Auth;

use App\Helpers\Traits\FailedValidationHelper;
use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
{
    use FailedValidationHelper;
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'string', Rule::exists(User::class, 'email')],
            'password' => ['required', 'string'],
        ];
    }
}
