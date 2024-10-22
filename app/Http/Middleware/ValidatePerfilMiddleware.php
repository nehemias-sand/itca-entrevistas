<?php

namespace App\Http\Middleware;

use App\Classes\ApiResponseClass;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ValidatePerfilMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$perfiles): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            if (in_array($user->perfil->acronimo, $perfiles)) return $next($request);
        } else {
            return ApiResponseClass::sendResponse(null, 'No auth', 500);
        }

        return ApiResponseClass::sendResponse(null, 'Invalid profile', 403);
    }
}
