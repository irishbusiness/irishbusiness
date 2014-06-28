<?php namespace IrishBusiness\Mailers;

use Mail;

abstract class Mailerwithattachment {

	public function sendTo($user, $subject, $view, $data)
	{
		Mail::queue($view , $data,function($message) use($user,$subject,$data)
		{
			$message->to($user->email)
					->subject($subject)
					->attach(public_path().'/invoices/'.$user->firstname.' '.$user->lastname.'-invoice.pdf');
		});
	}
}