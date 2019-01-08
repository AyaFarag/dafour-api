<?php

namespace App\Http\Middleware;

use Closure;


class Lang {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        foreach (config('app.locales') as $locale) {
            if( array_search($locale, $request->segments()) !== false) {
                app()->setlocale($locale);
            }
        }
        
        return $next($request);
    }

}
