<?php

namespace App\Http\Middleware;

use Closure;

class CheckManager
{

    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->user_type_id == '2'){
                return $next($request);
        }
        return redirect()->guest('login');
    }
}