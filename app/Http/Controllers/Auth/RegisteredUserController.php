<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function store(RegisterRequest $request): Response
    {
        $user = User::create($request->validated());

        return $this->successResponse(
            data: [
                'user' => UserResource::make($user),
                'token' => $user->createToken($request->ip())->plainTextToken
            ]
        );
    }
}
