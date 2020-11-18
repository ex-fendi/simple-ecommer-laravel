<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class DestroyPenitipan
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
        if(Session::has('id_kandang')){
            Session::forget('id_kandang');
            Session::forget('kandang');
        }
        return $next($request);
    }
}
