<?php

namespace App\Mailers;

use Illuminate\Mail\Mailer as Mail;
use Order;

class OrderMailer {

  private $mail;

  private $order;

  function __construct(Mail $mail, Order $order)
  {
    $this->mail = $mail;
    $this->order = $order;
  }

  public function sendToOrderUser($subject, $view)
  {
    $this->mail->send($view, $this->order, function($message) use ($subject) {
        $message->to($this->order->user->email)->subject($subject);
    });
  }

  public function sendOrderConfirmation()
  {
    $subject = 'Thanks for ordering a custom ' . $this->order->jacket->name;
    $view    = 'emails.order-confirmation';

    return  $this->sendToOrderUser($subject, $view);
  }

  public function sendMeasurementConfirmation()
  {
    $subject = 'Final measurements for your ' . $this->order->jacket->name;
    $view    = 'emails.measurements-confirmation';

    return  $this->sendToOrderUser($subject, $view);
  }

  public function sendProductionStart()
  {
    $subject = 'Our tailors have started working on your ' . $this->order->jacket->name;
    $view    = 'emails.production-start';

    return  $this->sendToOrderUser($subject, $view);
  }

  public function sendShippingNotification()
  {
    $subject = 'Your ' . $order->jacket->name . ' has been handed over to the courier';
    $view    = 'emails.shipping-notification';

    return  $this->sendToOrderUser($subject, $view);
  }

  public function sendDeliveryNotification()
  {
    $subject = 'About the ' .  $this->order->jacket->name . ' you just received'
    $view    = 'emails.after-delivery';

    return  $this->sendToOrderUser($subject, $view);
  }




}
