<?php

namespace App\Jobs;

use App\Jobs\Job;
use Order;
use Illuminate\Contracts\Bus\SelfHandling;

class ProcessOrderPayment extends Job implements SelfHandling
{
  protected $order;

  protected $stripe_token;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct($stripe_token, $order)
  {
    $this->stripe_token = $stripe_token;
    $this->order = $order;
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle()
  {
    $amount = str_replace('.', '', $this->order->total);
    $charge_attempt = $this->order->user->charge($amount, $this->paymentInfo());

    if ($charge_attempt) {
      $this->order->payment_id = $charge_attempt->id;
      $this->order->status     = 'placed';
      $this->order->save();

      return $charge_attempt;
    }
  }

  private function paymentInfo()
  {
    return [
      'source'        => $this->stripe_token,
      'description'   => 'Order: ' . $this->order->id,
      'receipt_email' => $this->order->user->email,
      'metadata'      => [
        'name'   => $this->order->user->name,
        'email'  => $this->order->user->email,
        'jacket' => $this->order->jacket->model
      ],
      'shipping' => [
        'name'    => $this->order->user->name,
        'address' => [
          'line1'       => $this->order->address->address1,
          'line2'       => $this->order->address->address2,
          'city'        => $this->order->address->city,
          'state'       => $this->order->address->province,
          'postal_code' => $this->order->address->postcode,
          'country'     => $this->order->address->country,
        ]
      ]
    ];
  }
}
