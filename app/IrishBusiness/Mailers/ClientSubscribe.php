<?php namespace IrishBusiness\Mailers;


class ClientSubscribe extends Mailerwithattachment
{
	public function subscribe($user)
	{
		
		$view = 'emails.thankyou';
		$data = [
					'firstname' => $user->firstname,
					/*'token' => $user->activation->token,*/
					'email' => $user->email
				];

		$subject = 'Thank you!';

		return $this->sendTo($user, $subject, $view, $data);
	}	
} 