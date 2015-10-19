<?php

namespace App\Listeners;

use App\Events\OrderStatusChangedToInProgress;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTailorOrderDetails
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
     * @param  OrderStatusChangedToInProgress  $event
     * @return void
     */
    public function handle(OrderStatusChangedToInProgress $event)
    {
        //
    }
}
