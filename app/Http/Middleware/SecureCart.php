<?php

namespace App\Http\Middleware;

use Session;
use Closure;

class SecureCart
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
        if(Session::has('status') == 'pembeli'){
            return $next($request);
        }
        Session::put('flash', 'Maaf anda harus login dahulu');
        return redirect()->route('user.login');
    }
}
