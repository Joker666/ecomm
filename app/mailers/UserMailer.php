<?php namespace Acme\Mailers;
use User;

/**
 * Created by PhpStorm.
 * User: Hasan Rafi
 * Date: 2/22/14
 * Time: 3:25 AM
 */
class UserMailer extends Mailer {
    public function welcome(User $user){
        $view = 'emails.welcome';
        $data['firstname'] = $user->firstname;
        $data['lastname'] = $user->lastname;
        $data['password'] = $user->password;
        $subject = "Welcome to this great Ecommerce Site";

        $this->sendTo($user, $subject, $view, $data);
    }
}