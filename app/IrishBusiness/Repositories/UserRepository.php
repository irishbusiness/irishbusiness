<?php namespace IrishBusiness\Repositories;

use User;
use Hash;
use Auth;
use Redirect;
use Activation;
class UserRepository {

	public function activate($token)
	{

		$activation =Activation::with('user')->where('token','=',$token)->first(); 	
		$user = $activation->user;
		//confirm user
		$user->confirmed =1;
		$user->save();

		//delete activation code
		$activation->delete();
	}

	public function create($input)
	{
		$user = new User;
		$user->firstname = $input['firstname'];
		$user->lastname = $input['lastname'];
		$user->password = Hash::make($input['password']);
		$user->phone = $input['phone'];
		$user->email = $input['email'];
		$user->save();

		$this->addConfirmToken($user->email);

		return $user;
	}

	protected function addConfirmToken($email)
	{
		$token = new Activation;
		$token->token = md5(uniqid($email, true));
		$user = User::where('email', '=' ,$email)->first();
		$user->activation()->save($token);
	}

	public function authenticate($input)
	{
		$credentials = [
			"email" => $input["email"],
			"password" => $input["password"],
			"confirmed" => 1
		];
		
		return Auth::user()->attempt($credentials);
	}

	public function isConfirmed($email)
	{
		$user = User::whereEmail($email)->first();
		if(!is_null($user))
		{	
			if($user->confirmed == 1) return true;
		}
		return false;
	}

}