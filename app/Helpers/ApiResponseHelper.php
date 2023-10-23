<?php

namespace App\Helpers\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ApiResponseHelper
{
    public function successResponse(mixed $data = [], string $message = 'This Action Done Successfully'): JsonResponse
    {
        return response()->json(data: [
            'success' => true,
            'message' => str(string: $message)->title(),
            'data' => $data,
        ], status: Response::HTTP_OK);
    }

    public function failResponse(mixed $errors, int $status = 200): JsonResponse
    {
        return response()->json(data: [
            'success' => false,
            'errors' => $errors,
            'data' => [],
        ], status: $status);
    }

    public function successCreated(mixed $data = [], Model|string $model = ''): JsonResponse
    {
        $className = $this->getClassName($model);

        $message = str(string: "{$className} created successfully")->title();

        return response()->json(data: [
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], status: Response::HTTP_CREATED);
    }

    public function successUpdated(mixed $data = [], Model|string $model = ''): JsonResponse
    {
        $className = $this->getClassName($model);

        $message = str(string: "{$className} updated successfully")->title();

        return response()->json(data: [
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], status: Response::HTTP_OK);
    }

    public function successDeleted(mixed $data = [], Model|string $model = ''): JsonResponse
    {
        $className = $this->getClassName($model);

        $message = str(string: "{$className} Deleted successfully")->title();

        return response()->json(data: [
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], status: Response::HTTP_OK);
    }

    private function getClassName(Model|string $model): string
    {
        return class_basename($model);
    }
}
