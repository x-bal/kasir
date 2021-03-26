<?php

namespace App\Http\Middleware;

use Closure;

class admin
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->level == 'admin') {
            return $next($request);
        }

        return back();
    }
}
