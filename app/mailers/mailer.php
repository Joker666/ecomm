<?php namespace Acme\Mailers;
use Mail;

/**
 * Created by PhpStorm.
 * User: Hasan Rafi
 * Date: 2/22/14
 * Time: 2:25 AM
 */
abstract class Mailer {
    public function sendTo($user, $subject, $view, $data=[]){
        Mail::queue($view, $data, function($message) use($user, $subject)
        //Mail::send($view, $data, function($message) use($user, $subject)
        {
            $message->to($user->email)
                    ->subject($subject);
        });
    }
}