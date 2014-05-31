<?php namespace IrishBusiness\Mailers;


class ClientMailer extends Mailer
{

	public function confirm($user)
	{
		
		$view = 'emails.test';
		$data = [
					'firstname' => $user->firstname,
					'token' => $user->activation->token,
					'email' => $user->email
				];

		$subject = 'Please Confirm Email';

		return $this->sendTo($user, $subject, $view, $data);
	}
	
} 