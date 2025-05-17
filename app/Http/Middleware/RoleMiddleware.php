<?php

namespace App\Http\Middleware;

use Closure;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $userRole = $request->header('role');

        if (!$userRole) {
            return response()->json(['message' => 'No role header found'], 401);
        }

        if (!in_array($userRole, $roles)) {
            return inertia("Errors/Forbidden")->toResponse($request)->setStatusCode(403);
        }

        return $next($request);
    }
}
