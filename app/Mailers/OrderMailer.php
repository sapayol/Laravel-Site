<?php

namespace App\Mailers;

use Order;

class OrderMailer extends Mailer {

  public function sendOrderConfirmation(Order $order)
  {
    $subject = 'Thanks for ordering a custom ' . $order->jacket->name;
    $view    = 'emails.order-confirmation';

    return  $this->sendTo($order->user, $subject, $view, ['order' => $order]);
  }

  public function sendMeasurementConfirmation(Order $order)
  {
    $subject = 'Final measurements for your ' . $order->jacket->name;
    $view    = 'emails.measurements-confirmation';

    return  $this->sendTo($order->user, $subject, $view, ['order' => $order]);
  }

  public function sendCustomerProductionStart(Order $order)
  {
    $subject = 'Our tailors have started working on your ' . $order->jacket->name;
    $view    = 'emails.production-start';

    return  $this->sendTo($order->user, $subject, $view, ['order' => $order]);
  }

  public function sendShippingNotification(Order $order, $tracking_number)
  {
    $subject = 'Your ' . $order->jacket->name . ' has been handed over to the courier';
    $view    = 'emails.shipping-notification';

    return  $this->sendTo($order->user, $subject, $view, ['order' => $order, 'tracking_number' => $tracking_number]);
  }

  public function sendDeliveryNotification(Order $order)
  {
    $subject = 'About the ' .  $order->jacket->name . ' you just received';
    $view    = 'emails.after-delivery';

    return  $this->sendTo($order->user, $subject, $view, ['order' => $order]);
  }

  public function sendOrderNotification(Order $order)
  {
    $subject =  'A new ' . $order->jacket->name . ' has been ordered';
    $view    = 'emails.order-notification';

    return  $this->sendTo(env('ADMIN_EMAIL'), $subject, $view, ['order' => $order], 'Ediz Test');
  }

  public function sendTailorMessage(Order $order, $note = null, $inclusions = null)
  {
    $subject =  'SAPAYOL Jacket Order: ' . $order->id;
    $view    = 'emails.tailor-message';

    return  $this->sendTo(env('TAILOR_EMAIL'), $subject, $view, ['order' => $order, 'note' => $note, 'inclusions' => $inclusions], 'TailorTest');
  }

}
