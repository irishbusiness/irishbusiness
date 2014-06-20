<?php namespace IrishBusiness\Repositories;


use Hash;
use Auth;
use Redirect;
use Commission;
use Salesperson;
class SalesRepository {

	public function checktl($input)
	{
		$salesperson = Salesperson::where('email','=',$input)->first();
		if(!is_null($salesperson))
		{
			if($salesperson->access_level==2)
				return true;
		}

		return false;
	}

	public function checkst($input)
	{
		$salesperson = Salesperson::where('email','=',$input)->first();
		if(!is_null($salesperson))
		{
			if($salesperson->access_level==1)
				return true;
		}
		
		return false;
	}

	public function create($input)
	{
		$st = $input['st'];
		
		// if($input['type']==3&&$input['tl']!='')
		// {
		// 	$st = Salesperson::where('email','=',$input['tl'])->first()->st;
		// }


		$password = str_random(8);
		$salesperson = new SalesPerson;
		$salesperson->firstname = $input['firstname'];
		$salesperson->lastname = $input['lastname'];
		$salesperson->password = Hash::make($password);
		$salesperson->phone = $input['phone'];
		$salesperson->email = $input['email'];
		$salesperson->access_level = $input['type'];
		$salesperson->coupon =(( $input['coupon']=='') ? generate_coupon() :  strtoupper($input['coupon'])); 
		$salesperson->st = (( $st=='') ? 0 : $st);
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