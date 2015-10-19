<?php

namespace App\Mailers;

use Illuminate\Mail\Mailer as Mail;

abstract class Mailer {


  private $mail;

  function __construct(Mail $mail)
  {
    $this->mail = $mail;
  }

  public function sendTo($user, $subject, $view, $data = [])
  {
    $this->mail->send($view, $data, function($message) use ($user, $subject) {
      if (gettype($user) == 'string') {
        $message->to($user)->subject($subject);
      } else {
        $message->to($user->email, $user->name)->subject($subject);
      }
      $message->from('contact@sapayol.com');
    });
  }

}
