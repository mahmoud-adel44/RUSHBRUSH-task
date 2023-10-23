<?php

namespace App\Exceptions;

use App\Helpers\Traits\ApiResponseHelper;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponseHelper;

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (Throwable $e) {
            $this->failResponse(
                errors: $e->getMessage()
            );
        });
    }
}
