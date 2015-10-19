<?php

namespace App\Mailers;

use Illuminate\Mail\Mailer as Mail;
use Order;

class AdminMailer {


  private $mail;

  function __construct(Mail $mail)
  {
    $this->mail = $mail;
  }

  public function sendToAdmin($subject, $view, $data = [])
  {
  	$email = 'dima@sapayol.com';

    $this->mail->send($view, $data, function($message) use ($subject) {
        $message->to($email)->subject($subject);
    });
  }

  public function sendOrderNotification(Order $order)
  {
    // $subject = 'Here is a subject';
    // $view    = 'emails.confirmation';

    return  $this->sendToOrderUser($subject, $view, $order);
  }


}
