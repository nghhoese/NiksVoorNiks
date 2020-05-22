<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Response;

class CheckLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        if (!Auth::check()) {
            return new Response(view('auth.login'));
        }
        if ($user->rol_naam == 'in_afwachting'){
            return new Response(view('auth.inProgress'));
        }
        return $next($request);
    }
}
