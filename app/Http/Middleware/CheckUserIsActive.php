<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserIsActive
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

        $response = $next($request);

        if (Auth::check() && !$request->user()->isActive()) {
            Auth::logout();
            return redirect('/login')->with('error', 'Seu usuário está desativado, entre em contato com o administrador do sistema');
        }

        return $response;
    }
}
