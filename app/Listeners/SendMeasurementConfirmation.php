<?php

namespace App\Listeners;

use App\Events\OrderStatusChangedToReviewed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mailers\OrderMailer;

class SendMeasurementConfirmation implements ShouldQueue
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
     * @param  OrderStatusChangedToReviewed  $event
     * @return void
     */
    public function handle(OrderStatusChangedToReviewed $event)
    {
        $this->mailer->sendMeasurementConfirmation($event->order);
    }
}
