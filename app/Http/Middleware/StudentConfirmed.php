<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class StudentConfirmed
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
        if( !auth('student')->user()->confirmed == 1 ){
            return response() -> json(["error" => "need confirmation"], 500);
        }

        return $next($request);
    
}

}
