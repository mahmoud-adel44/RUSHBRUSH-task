<?php

namespace App\Helpers\Traits;

use HttpResponseException;
use Illuminate\Validation\Validator;

trait FailedValidationHelper
{
    use ApiResponseHelper;

    /**
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            $this->failResponse(
                errors: $validator->errors(),
                status: Response::HTTP_UNPROCESSABLE_ENTITY
            )
        );
    }
}
