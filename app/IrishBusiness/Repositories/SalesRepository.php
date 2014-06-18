<?php namespace IrishBusiness\Repositories;


use Hash;
use Auth;
use Redirect;
use Commission;
use Salesperson;
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
		$salesperson->coupon =(( $input['coupon']=='') ? strtoupper(str_random(6)) :  strtoupper($input['coupon'])); 
		$salesperson->st = (( $input['st']=='') ? 0 :  $input['st']);
		$salesperson->tl = (( $input['tl']=='') ? 0 :  $input['tl']);
		$salesperson->save();
		$salesperson->passwordraw = $password;

		return $salesperson;
	}

	public function update($password)
	{
		$user = Auth::salesperson()->user();
		$user->password = Hash::make($password);
		$user->save();
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

	public function getSalesTeam()
	{
		return Salesperson::where('access_level','=',1)->get();		
	}

	public function getTeamLeader()
	{
		return Salesperson::where('access_level','=',2)->get();		
	}

}