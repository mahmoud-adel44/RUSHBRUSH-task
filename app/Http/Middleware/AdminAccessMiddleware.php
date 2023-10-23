<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AdminAccessMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user('sanctum')->isAdmin()) {
            return $next($request);
        }

        throw new UnauthorizedException("Unauthorized", Response::HTTP_UNAUTHORIZED);

    }
}
