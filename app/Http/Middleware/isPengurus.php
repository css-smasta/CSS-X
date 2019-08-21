<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class isPengurus
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
        if(Auth::user()->role_lvl < 2 ){
            abort(403, 'Lu bukan pengurus <i class="fas fa-dog"></i>');
        }else{
            return $next($request);
        }
    }
}
