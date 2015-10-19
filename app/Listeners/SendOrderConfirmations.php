<?php

namespace App\Listeners;

use App\Events\OrderPaymentWasProcessed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOrderConfirmations
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
     * @param  OrderPaymentWasProcessed  $event
     * @return void
     */
    public function handle(OrderPaymentWasProcessed $event)
    {
        //
    }
}
