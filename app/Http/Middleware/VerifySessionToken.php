<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class VerifySessionToken
{
    public function handle($request, Closure $next)
    {
        $sessionToken = $request->session()->get('tokenSession');
        $providedToken = auth()->user()->token;

        if ($sessionToken !== $providedToken) {
            Auth::logout();
            session()->flash('message', __('Invalid session token. this account opened on another device'));

            return redirect()->route('login');
        }

        return $next($request);
    }
}
