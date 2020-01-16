<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckHead
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
        $userRoles=Auth::user()->roles->pluck('name');
        if(!$userRoles->contains('head')){
            return redirect('/user');
 
        };
        return $next($request);
    }
}
