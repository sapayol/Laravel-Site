<?php

namespace App\Mailers;

use User;

class UserMailer extends Mailer {

  public function sendAccountConfirmation(User $user)
  {
    // $subject = 'Here is a subject';
    // $view    = 'emails.confirmation';

    return  $this->sendTo($user, $subject, $view, ['user' => $user]);
  }

}
