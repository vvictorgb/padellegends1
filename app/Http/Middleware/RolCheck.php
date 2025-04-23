<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolCheck
{
    public function handle(Request $request, Closure $next, $rol)
    {
        if (auth()->check() && auth()->user()->rol === $rol) {
            return $next($request);
        }

        return redirect('/');
    }
}
