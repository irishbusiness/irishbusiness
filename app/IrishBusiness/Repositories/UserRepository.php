<?php namespace IrishBusiness\Repositories;

use User;
use Hash;

class UserRepository {

	

	function __construct()
	{
		
	}

	public function create($input)
	{
		$user = new User;
		$user->firstname = $input['firstname'];
		$user->lastname = $input['lastname'];
		$user->password = Hash::make($input['password']);
		$user->username = $input['username'];
		$user->email = $input['email'];
		$user->save();

		return $user->id;
	}

	

}