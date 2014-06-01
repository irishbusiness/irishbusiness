<?php namespace IrishBusiness\Repositories;

use SalesPerson;
use Hash;
use Auth;
use Redirect;
use Commission;
class SalesRepository {

	public function create($input)
	{
		$password = str_random(8);
		$salesperson = new SalesPerson;
		$salesperson->firstname = $input['firstname'];
		$salesperson->lastname = $input['lastname'];
		$salesperson->password = Hash::make($password);
		$salesperson->phone = $input['phone'];
		$salesperson->email = $input['email'];
		$salesperson->access_level = $input['type'];
		$salesperson->coupon = str_random(3) . time();
		$salesperson->save();
		$salesperson->passwordraw = $password;

		return $salesperson;
	}

	public function authenticate($input)
	{
		$credentials = [
			"email" => $input["email"],
			"password" => $input["password"]
		];
		
		return Auth::salesperson()->attempt($credentials);
	}

	public function getCommissions()
	{
		$commissionsraw = Commission::all();
		$commissions = [];

		foreach($commissionsraw as $commission)
		{
			$commissions[$commission->id] = $commission->type;
		}

		return $commissions;
	}

}