<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AuthVerify
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
        if(!(Session::has('status'))){
            return redirect()->route('admin.login');
        }
        return $next($request);
        
    }
}
