<?php

namespace App\Http\Middleware;

//use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

class OwnerMiddleware
{
    public function handle($request, Closure $next, $role){
        if (!$request->user()->has_role($role)) {
            return redirect('/');
        }
        return $next($request);
    }
}
