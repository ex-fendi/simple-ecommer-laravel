<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AuthLogin
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
        if(Session::has('super')){
            return redirect()->route('produk.home');
        }
        return $next($request);
    }
}
