<?php

namespace App\Mailers;

use Illuminate\Mail\Mailer as Mail;

abstract class Mailer {


  private $mail;

  function __construct(Mail $mail)
  {
    $this->mail = $mail;
  }

  public function sendTo($user, $subject, $view, $data = [], $name = null)
  {
    $this->mail->send($view, $data, function($message) use ($user, $subject, $name) {
      $message->cc('dima@sapayol.com', 'Dima Admin');
      if (gettype($user) == 'string') {
        $message->to($user, $name)->subject($subject);
      } else {
        $message->to($user->email, $user->name)->subject($subject);
      }
      $message->from('contact@sapayol.com', 'SAPAYOL Jackets');
    });
  }

}
