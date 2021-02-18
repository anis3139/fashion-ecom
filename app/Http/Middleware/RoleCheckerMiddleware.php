<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleCheckerMiddleware
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
        if (Auth::user()->roll_id == 3) {
            return redirect('/customer-dashboard');
        }
        return $next($request);
    }
}
