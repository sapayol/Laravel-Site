<?php

namespace App\Listeners;

use App\Events\OrderStatusChangedToShipped;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendShippingNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderStatusChangedToShipped  $event
     * @return void
     */
    public function handle(OrderStatusChangedToShipped $event)
    {
        //
    }
}
