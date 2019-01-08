<?php

namespace App\Http\Middleware;

use Closure;

class CheckBlocked
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
        if ($request->user() && $request->user()->blocked == 1) {
            return redirect()->route('home');
        }
        
        return $next($request);
    }
}
