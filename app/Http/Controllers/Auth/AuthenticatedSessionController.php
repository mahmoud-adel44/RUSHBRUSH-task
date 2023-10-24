<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticatedSessionController extends Controller
{
    public function store(LoginRequest $request): JsonResponse
    {
        if (Auth::attempt($request->validated())) {
            $user = auth()->guard('sanctum')->user();
            $data['user'] = UserResource::make($user);
            $data['token'] = $user?->createToken('LB-ROUTER-TOKEN')->plainTextToken;

            self::authorizeRequest($user);

            return $this->successResponse(data: $data);
        }

        return $this->failResponse(
            errors: 'Invalid Credentials',
            status: Response::HTTP_UNAUTHORIZED
        );
    }


    private static function authorizeRequest(User|Authenticatable|null $user): void
    {
        throw_if(
            request()->is('api/admin/*') && $user?->type->isCustomer(),
            new AuthenticationException('Unauthorized')
        );

        throw_if(
            request()->is('api/auth/*') && $user?->type->isAdmin(),
            new AuthenticationException('Unauthorized')
        );
    }
}
