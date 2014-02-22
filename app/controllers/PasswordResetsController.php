<?php

class PasswordResetsController extends BaseController {

	public function Create()
	{
        return View::make('users.password_create');
	}

	public function Store()
	{
		Password::remind(['email' => Input::get('email')], function($message){
            $message->subject('Your Password Reminder');
        });

        return Redirect::route('password_resets.create')
            ->with('message', 'Please Check Your Email!', true);
	}
    public function postReset(){
        $credentials = Input::only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $response = Password::reset($credentials, function($user, $password) {
            $user->password = Hash::make($password);

            $user->save();
        });

        switch ($response) {
            case Password::INVALID_PASSWORD:
            case Password::INVALID_TOKEN:
                return Redirect::back()->with('error', Lang::get($response));
            case Password::INVALID_USER:
                return Redirect::back()->with('error', Lang::get($response));

            case Password::PASSWORD_RESET:
                return Redirect::to('/')
                    ->with('message', 'Password Updated. You May Login Now');
        }
    }
    public function getReset($token){
        return View::make('users.password_reset')->with('token', $token);
    }
}
