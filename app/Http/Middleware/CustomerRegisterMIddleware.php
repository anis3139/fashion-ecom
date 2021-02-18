<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CustomerRegisterMIddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->expectsJson()) {
            return redirect('/customer_login');
        }

        // if(Auth::user()->roll_id==3){
        //     return redirect('/customer_login');

        // }
        return $next($request);


    }

}
