<?php

use IrishBusiness\Forms\Login;
use IrishBusiness\Forms\FormValidationException;
use IrishBusiness\Repositories\UserRepository;

class SessionsController extends \BaseController {

	protected $loginForm;
	protected $user;

	function __construct(Login $loginForm, UserRepository $user)
	{
		$this->loginForm = $loginForm;
		$this->user = $user;

	}

	public function store()
	{
		try
		{
			$this->loginForm->validate(Input::all());

			$returnMessage = $this->user->authenticate(Input::all());
	
			if($returnMessage == true){
			return Redirect::to('settings')->withFlashMessage('You logged in as ' . ucwords(Input::get('username')))->with('title','IrishBusiness.ie | Settings');
			}
			return Redirect::back()->withInput()->withErrors('Invalid Username and/or Password');
		}	
		catch(FormValidationException  $e)
		{
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}
	}

	public function create()
	{
		return View::make('searchpartial.login')->with('title','IrishBusiness.ie | Login');
	}

}
