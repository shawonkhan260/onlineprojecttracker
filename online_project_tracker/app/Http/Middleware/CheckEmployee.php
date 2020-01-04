<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckEmployee
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
        if(!$userRoles->contains('employee')){
            return redirect('/no');

        };
        return $next($request);
    }
}
