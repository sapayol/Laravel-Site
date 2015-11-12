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
        $uri          = $request->route() ? $request->route()->getUri() : null;
        $current_user = Auth::user();
        $action       = null;

        if ($request->route()  && array_key_exists('as', $request->route()->getAction())) {
            $action = $request->route()->getAction()['as'];
        }

        view()->share(['action' => $action, 'current_uri' => $uri, 'current_user' => $current_user]);

        return $next($request);
    }
}
