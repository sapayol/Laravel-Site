<?php

namespace App\Listeners;

use App\Events\OrderStatusChangedToReviewed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMeasurementConfirmation
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
     * @param  OrderStatusChangedToReviewed  $event
     * @return void
     */
    public function handle(OrderStatusChangedToReviewed $event)
    {
        //
    }
}
