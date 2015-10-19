<?php

namespace App\Listeners;

use App\Events\OrderPaymentWasProcessed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mailers\OrderMailer;

class SendOrderConfirmations
{

    private $orderMailer;

    private $adminMailer;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(OrderMailer $orderMailer)
    {
        $this->orderMailer = $orderMailer;
    }

    /**
     * Handle the event.
     *
     * @param  OrderPaymentWasProcessed  $event
     * @return void
     */
    public function handle(OrderPaymentWasProcessed $event)
    {
        $this->orderMailer->sendOrderConfirmation($event->order);
        $this->orderMailer->sendOrderNotification($event->order);
    }
}
