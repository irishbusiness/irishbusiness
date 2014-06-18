<?php namespace IrishBusiness\Mailers;


class SalespersonMailer extends Mailer
{

	public function invite($salesperson)
	{
		
		$view = 'emails.SPinvite';
		$data = [
					'firstname' => $salesperson->firstname,
					'password' => $salesperson->passwordraw,
					'email' => $salesperson->email,
					'type' => $salesperson->commission->type
				];

		$subject = 'Invitation';

		return $this->sendTo($salesperson, $subject, $view, $data);
	}
	
} 