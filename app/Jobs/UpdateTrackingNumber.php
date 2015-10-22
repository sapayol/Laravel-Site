<?php

namespace App\Jobs;

use App\Jobs\Job;
use Order;
use App\Mailers\OrderMailer;
use Illuminate\Contracts\Bus\SelfHandling;

class UpdateTrackingNumber extends Job implements SelfHandling
{

    protected $order;

    protected $tracking_number;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($order_id, $tracking_number)
    {
        $this->order           = Order::find($order_id);
        $this->tracking_number = $tracking_number;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(OrderMailer $mailer)
    {
        $this->order->tracking_number = $this->tracking_number;
        if ($this->order->status !== 'shipped' && $this->order->statusIsBefore('shipped')) {
            $this->order->status = 'shipped';
            $this->order->shipped_at = date('y-m-d h:i:s');
            $this->order->save();
        }

        $mailer->sendShippingNotification($this->order);

        return $this->order;
    }
}
