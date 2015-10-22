<?php

namespace App\Listeners;

use App\Events\OrderStatusChangedToProduction;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mailers\OrderMailer;

class SendProductionStart
{

    private $mailer;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(OrderMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  OrderStatusChangedToProduction  $event
     * @return void
     */
    public function handle(OrderStatusChangedToProduction $event)
    {
        $this->mailer->sendCustomerProductionStart($event->order);
    }
}
