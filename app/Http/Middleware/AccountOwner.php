<?php

namespace App\Http\Middleware;

use Closure;
use Route, Session;
use Illuminate\Contracts\Auth\Guard;

class AccountOwner
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('auth/login');
            }
        }

        $user_id = $request->route()->id;
        if ($this->auth->user()->id == $user_id) {
            return $next($request);
        } else {
            return redirect()->route('pages.home');
        }

    }
}
