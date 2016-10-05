<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class admin
{

    public function handle($request, Closure $next){
        if (!Auth::guest() && Auth::user()->admin) {
            return $next($request);

        }

        return redirect('/admin');
    }
}
