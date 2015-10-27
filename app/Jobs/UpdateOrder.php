<?php

namespace App\Jobs;

use App\Jobs\Job;
use Order, Address;
use App\Mailers\OrderMailer;
use Illuminate\Contracts\Bus\SelfHandling;

class UpdateOrder extends Job implements SelfHandling
{

    protected  $order;

    protected  $name;

    protected  $address1;

    protected  $address2;

    protected  $city;

    protected  $postcode;

    protected  $province;

    protected  $country;

    protected  $email;

    protected  $status;

    protected  $tracking_number;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id, $name = null, $address1 = null, $address2 = null, $city = null, $postcode = null, $province = null, $country = null, $email = null, $status = null, $tracking_number = null)
    {
        $this->order           = Order::findOrFail($id);
        $this->name            = $name;
        $this->address1        = $address1;
        $this->address2        = $address2;
        $this->city            = $city;
        $this->postcode        = $postcode;
        $this->province        = $province;
        $this->country         = $country;
        $this->email           = $email;
        $this->status          = $status;
        $this->tracking_number = $tracking_number;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(OrderMailer $mailer)
    {
        if ($this->status && $this->order->statusIsBefore($this->status)) {
            $this->order->status = $this->status;
            if ($this->status == 'production') {
                $this->order->production_at = date('y-m-d h:i:s');
                $mailer->sendCustomerProductionStart($this->order);
            }
            if ($this->status == 'completed') {
                $this->order->completed_at = date('y-m-d h:i:s');
                $mailer->sendDeliveryNotification($this->order);
            }
        }

        if ($this->tracking_number) {
            $this->order->tracking_number = $this->tracking_number;
            if ($this->order->statusIsBefore('shipped')) {
                $this->order->status = 'shipped';
                $this->order->shipped_at = date('y-m-d h:i:s');
                $mailer->sendShippingNotification($this->order, $this->tracking_number);
            }
        }

        // Check if user with this email exists and return them or create a new record for them
        if ($this->name) {
            $this->order->user->name = $this->name;
            $this->order->user->save();
        }

        if ($this->email) {
            $this->order->user->email = $this->email;
            $this->order->user->save();
        }

        if ($this->address1 && $this->city) {
            $address = Address::create([
                'address1' => $this->address1,
                'address2' => $this->address2,
                'city'     => $this->city,
                'postcode' => $this->postcode,
                'province' => $this->province,
                'country'  => $this->country,
            ]);
            $this->order->address_id = $address->id;
        }

        $this->order->save();

        return $this->order;
    }
}
