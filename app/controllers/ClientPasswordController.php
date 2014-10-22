<?php

class ClientPasswordController extends \BaseController {

	public function remind()
	{
		return View::make('remind')->withTitle('IrishBusiness Password Reset');
	}

	public function sendRemind()
	{
		switch ($response = Password::user()->remind(Input::only('email'), function($message) {
			    $message->subject('IrishBusiness Password Reset');
			}))
	    {
	      case Password::INVALID_USER:
	        return Redirect::back()->with('error', Lang::get($response));

	      case Password::REMINDER_SENT:
	        return Redirect::back()->with('status', Lang::get($response));
	    }
	}

	public function reset($token = null)
	{
		$type = 'user';
		if(is_null($token)) App::abort(404);

		return View::make('reset')->withTitle('IrishBusiness Password Reset')->with('token', $token)->with('type',$type);
	}

	public function saveReset()
	{
		$credentials = Input::only(
			'email', 'password', 'password_confirmation', 'token'
		);

		$response = Password::user()->reset($credentials, function($user, $password) 
		{
		    $user->password = Hash::make($password);
		    $user->save();
		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
				return Redirect::back()->with('error', Lang::get($response));

			case Password::PASSWORD_RESET:
				return Redirect::to('/')->with('flash_message','Password Changed.');
		}
	}
}