<?php namespace IrishBusiness\Repositories;

use SalesPerson;
use Hash;
use Auth;
use Subscription;
use User;



class PaymentsRepository {

	public function getSubscription($id)
	{
		return Subscription::find($id);
	}

	public function attach($subscription)
	{
		$user = Auth::user()->user();

		$user->subscription()->attach($subscription);

		return $user;
	}
	
}