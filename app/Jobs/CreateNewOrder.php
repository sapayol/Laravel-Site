<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Auth, Session;
use Jacket, Order, Measurement;
use App\Jobs\AttachOldMeasurementsToOrder;

class CreateNewOrder extends Job implements SelfHandling
{

  use DispatchesJobs;

  protected $user;

  protected $model;

  protected $jacket_look;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_id, $model, $jacket_look)
    {
      $this->user        = Auth::loginUsingId($user_id);
      $this->model       = $model;
      $this->jacket_look = $jacket_look;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $jacket = Jacket::where('model', '=', $this->model)->first();
      $order  = Order::create(array(
        'status'    => 'new',
        'user_id'   => $this->user->id,
        'jacket_id' => $jacket->id,
        'total'     => $jacket->price // Needs to updated in 2.0 when attributes affect price
      ));

      foreach ($this->jacket_look as $attribute) {
        $order->attributes()->attach($attribute);
      }

      $last_order = $this->user->droppedOrders->last();

      if ($last_order && $last_order->hasReusableMeasurements()) {
        $this->dispatch(new AttachOldMeasurementsToOrder($last_order->userMeasurements, $order));
      }

      return $order;
    }
  }
