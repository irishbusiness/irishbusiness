<?php namespace IrishBusiness\Mailers;

use Mail;

abstract class Mailer {

	public function sendTo($user, $subject, $view, $data)
	{
		Mail::queue($view , $data,function($message) use($user,$subject,$data)
		{
			$message->to($user->email)
					->subject($subject);
		});
	}

	public function sendattachment($user, $subject, $view, $data)
	{
		Mail::queue($view , $data,function($message) use($user,$subject,$data)
		{
			$message->to($user->email)
					->subject($subject)
					->attach(public_path().'/invoices/'.$user->firstname.' '.$user->lastname.'-invoice.pdf');
		});
	}
}