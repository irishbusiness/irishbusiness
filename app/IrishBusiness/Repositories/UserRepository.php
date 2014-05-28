<?php namespace IrishBusiness\Repositories;

use User;
use Hash;
use Auth;
use Redirect;
class UserRepository {


	public function create($input)
	{
		$user = new User;
		$user->firstname = $input['firstname'];
		$user->lastname = $input['lastname'];
		$user->password = Hash::make($input['password']);
		$user->phone = $input['phone'];
		$user->email = $input['email'];
		$user->save();

		return $user->id;
	}

	public function authenticate($input)
	{
		$credentials = [
			"email" => $input["email"],
			"password" => $input["password"]
		];
		
		return Auth::user()->attempt($credentials);
	}



}