<?php

namespace App\Listeners;

use App\Events\OrderStatusChangedToCompleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendDeliveryNotification
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
     * @param  OrderStatusChangedToCompleted  $event
     * @return void
     */
    public function handle(OrderStatusChangedToCompleted $event)
    {
        //
    }
}
