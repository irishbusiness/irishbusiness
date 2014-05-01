<?php namespace IrishBusiness\Repositories;

use User;
use Hash;

class UserRepository {

	protected $registerForm;
	protected $loginForm;

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

	public function authenticate()
	{
		
		$attempt = Auth::attempt([
					'username' => $input['username'],
					'password' => $input['password']
				]);
			if($attempt){
				return Redirect::to('settings')->withFlashMessage('Thank you for registering ' . ucwords(Input::get('firstname')) .'! You have been logged in.')
			->with('title','IrishBusiness.ie | Settings');;
			}else{
				return Redirect::back()->withInput();
			}
	}

	

}