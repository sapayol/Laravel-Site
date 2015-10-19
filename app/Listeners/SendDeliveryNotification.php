<?php

namespace App\Listeners;

use App\Events\OrderStatusChangedToCompleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mailers\OrderMailer;

class SendDeliveryNotification
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
     * @param  OrderStatusChangedToCompleted  $event
     * @return void
     */
    public function handle(OrderStatusChangedToCompleted $event)
    {
        $this->mailer->sendDeliveryNotification($event->order);
    }
}
