<?php

namespace App\Jobs;

use App\Jobs\Job;
use Order, Address;
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

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id, $name, $address1, $address2 = null, $city = null, $postcode = null, $province = null, $country = null, $email = null)
    {
        $this->order    = Order::findOrFail($id);
        $this->name     = $name;
        $this->address1 = $address1;
        $this->address2 = $address2;
        $this->city     = $city;
        $this->postcode = $postcode;
        $this->province = $province;
        $this->country  = $country;
        $this->email    = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
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
