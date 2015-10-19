<?php

namespace App\Mailers;

use Illuminate\Mail\Mailer as Mail;
use User;

class UserMailer {


  private $mail;

  private $user;

  function __construct(Mail $mail, User $user)
  {
    $this->mail = $mail;
    $this->user = $user;
  }

  public function sendToUser($subject, $view)
  {
    $this->mail->send($view, function($message) use ($subject) {
        $message->to($this->user->email)->subject($subject);
    });
  }

  public function sendAccountConfirmation()
  {
    // $subject = 'Here is a subject';
    // $view    = 'emails.confirmation';

    return  $this->sendToOrderUser($subject, $view);
  }


}
