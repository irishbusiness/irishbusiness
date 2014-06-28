<?php namespace IrishBusiness\Repositories;

use Hash;
use Auth;
use Subscription;
use User;
use Salesperson;

class PaymentsRepository {

	public function confirm($token)
	{
		return Subscription::find($id);
	}
	
}