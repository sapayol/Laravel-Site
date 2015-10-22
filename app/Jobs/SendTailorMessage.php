<?php

namespace App\Jobs;

use App\Jobs\Job;
use Order;
use App\Mailers\OrderMailer;
use Illuminate\Contracts\Bus\SelfHandling;

class SendTailorMessage extends Job implements SelfHandling
{

    protected $order;

    protected $inclusions;

    protected $note;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($order_id, $note = null, $inclusions = null)
    {
        $this->order      = Order::find($order_id);
        $this->inclusions = $inclusions;
        $this->note       = $note;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(OrderMailer $mailer)
    {
        if ($this->order->status !== 'production' && $this->order->statusIsBefore('production')) {
            $this->order->status = 'production';
            $this->order->production_at = date('y-m-d h:i:s');
            $this->order->save();
            $mailer->sendCustomerProductionStart($this->order);
        }
        $mailer->sendTailorMessage($this->order, $this->note, $this->inclusions);

        return $this->order;
    }
}
