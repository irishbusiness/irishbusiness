<?php

use IrishBusiness\Forms\Login;
use IrishBusiness\Forms\FormValidationException;
use IrishBusiness\Repositories\UserRepository;

class SessionsController extends \BaseController {

	protected $registerForm;
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

			$this->user->authenticate(Input::all());
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
