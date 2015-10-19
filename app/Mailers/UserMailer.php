<?php

namespace App\Mailers;

use User;

class UserMailer extends Mailer {

  public function sendAccountConfirmation(User $user)
  {
    $subject = 'Your Sapayol account was created';
    $view    = 'emails.account-confirmation';

    return  $this->sendTo($user, $subject, $view, ['user' => $user]);
  }

}
