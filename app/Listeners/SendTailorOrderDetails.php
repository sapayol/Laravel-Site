<?php

namespace App\Listeners;

use App\Events\OrderStatusChangedToProduction;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mailers\AdminMailer;

class SendTailorOrderDetails
{

    private $mailer;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(AdminMailer $mailer)
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
        $this->mailer->sendTailerOrderDetails($event->order);
    }
}
