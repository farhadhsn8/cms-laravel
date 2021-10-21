<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdminMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role !== 'admin'){
            abort(403 , 'شما به این بخش دسترسی ندارید!');
        }
        return $next($request);
    }
}
