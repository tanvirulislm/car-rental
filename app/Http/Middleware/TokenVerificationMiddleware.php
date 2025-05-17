<?php

namespace App\Http\Middleware;

use Closure;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenVerificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie('token');
        $result = JWTToken::VerifyToken($token);
        // dd($result);
        if ($result == 'unauthorized') {
            return redirect('/login');
        } else {
            $request->headers->set('email', $result->userEmail);
            $request->headers->set('id', $result->userId);
            $request->headers->set('role', $result->role);
            return $next($request);
        }
    }
}
