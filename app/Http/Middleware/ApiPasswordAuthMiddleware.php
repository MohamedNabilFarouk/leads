<?php

namespace App\Http\Middleware;

use Closure;
use Hash;
use Illuminate\Http\Request;

class ApiPasswordAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $providedPassword = $request->header('apiAuthorization');
        $hashedPassword = Hash::make('admin123456789');

        if (password_verify($providedPassword, $hashedPassword)) {
            return $next($request);
        }

        return response()->json(['message' => 'Unauthorized.'], 401);
    }
}
