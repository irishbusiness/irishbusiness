<?php namespace IrishBusiness\Repositories;

use User;
use Hash;
use Auth;
use Redirect;
class UserRepository {


	protected $registerForm;


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
		$user->password = $input['phone'];
		$user->email = $input['email'];
		$user->save();

		return $user->id;
	}

	public function authenticate($input)
	{
		$credentials = [
			"username" => $input["username"],
			"password" => $input["password"],
		];
		if (Auth::attempt($credentials)){
			return true;
		} else {
			return false;
		}
		
	}

}