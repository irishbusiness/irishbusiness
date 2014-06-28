<?php namespace IrishBusiness\Mailers;


class ClientMailer extends Mailer
{

	public function confirm($user)
	{
		
		$view = 'emails.confirm';
		$data = [
					'firstname' => $user->firstname,
					'token' => $user->activation->token,
					'email' => $user->email
				];

		$subject = 'Please Confirm Email';

		return $this->sendTo($user, $subject, $view, $data);
	}

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