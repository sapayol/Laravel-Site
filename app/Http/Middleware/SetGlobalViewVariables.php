<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Order;

class SetGlobalViewVariables
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
        $current_user = Auth::user();

        view()->share(['current_user' => $current_user]);

        return $next($request);
    }
}
