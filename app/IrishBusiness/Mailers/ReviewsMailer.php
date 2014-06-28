<?php namespace IrishBusiness\Mailers;


class ReviewsMailer extends Mailer
{
	public function confirm($review, $business_name)
	{
		
		$view = 'emails.confirm-review';
		$data = [
					'name' => $review->name,
					'email' => $review->email,
					'business_name' => ucfirst(decode($business_name)),
					'token' => $review->token
				];

		$subject = 'Please verify your email!';

		return $this->sendTo($review, $subject, $view, $data);
	}	
} 