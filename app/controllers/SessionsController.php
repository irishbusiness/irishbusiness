<?php

use IrishBusiness\Forms\Login;
use IrishBusiness\Forms\FormValidationException;
use IrishBusiness\Repositories\UserRepository;
use IrishBusiness\Repositories\SalesRepository;
class SessionsController extends \BaseController {

	protected $loginForm;
	protected $user;
	protected $sales;

	function __construct(Login $loginForm, UserRepository $user,SalesRepository $sales)
	{
		$this->loginForm = $loginForm;
		$this->user = $user;
		$this->sales = $sales;

	}

	public function store()
	{
		
		try
		{
			if($this->user->authenticate(Input::all())){
				Auth::salesperson()->logout();
				return Redirect::to('settings')->withFlashMessage('You logged in as ' . ucwords(Input::get('username')))->with('title','IrishBusiness.ie | Settings');
			}

			if($this->sales->authenticate(Input::all())&&Auth::salesperson()->guest()){
				Auth::user()->logout();
				return Redirect::to('settings')->withFlashMessage('You logged in as ' . ucwords(Input::get('username')))->with('title','IrishBusiness.ie | Settings');
			}

			return Redirect::back()->withInput()->withErrors('Invalid Username and/or Password')->with('errorNotify','wrong email/password combination');
		}	
		catch(FormValidationException  $e)
		{
			return Redirect::back()->withInput()->withErrors($e->getErrors())->with('errorNotify','wrong email/password combination')->withInput();
		}
	}

	public function salesLogin()
	{

		if($this->sales->authenticate(Input::all())){
			Auth::user()->logout();
			return Redirect::to('settings')->withFlashMessage('You logged in as ' . ucwords(Input::get('username')))->with('title','IrishBusiness.ie | Settings');
		}

		return Redirect::back()->withInput()->withErrors('Invalid Username and/or Password')->with('errorNotify','wrong email/password combination');
	}

}
