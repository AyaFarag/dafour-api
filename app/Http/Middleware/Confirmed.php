<?php
/**
 * Created by PhpStorm.
 * User: mahmoud
 * Date: 24/03/18
 * Time: 01:57 م
 */

namespace App\Http\Middleware;

use Closure;
use Auth;


class Confirmed
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
        if( !auth('professional')->user()->confirmed == 1 ){
            return response() -> json(["error" => "need confirmation"], 500);
        }

        return $next($request);
    }

}