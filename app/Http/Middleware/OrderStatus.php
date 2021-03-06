<?php

namespace App\Http\Middleware;

use Closure;
use Order;

class OrderStatus
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
        $order_id = $request->route()->id;
        $order    = Order::find($order_id);

        if ($order->status == 'paid' && $order->bodyMeasurements->uncompleted()) {
            return $next($request);
        } else if ($order->statusIsAfter('started')) {
            return redirect()->route('orders.complete', $order->id);
        } else {
            return $next($request);
        }

    }
}
