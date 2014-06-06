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


		if(!$this->user->isConfirmed(Input::get('email')))
			return Redirect::back()->withInput()->with('errorNotify','wrong email/password combination');
			
		try
		{

				if(Auth::user()->guest())
				{	
						if($this->user->authenticate(Input::all()))
						{	
							Auth::salesperson()->logout();
							if(hasBusiness())
								return Redirect::to('business/'.businessSlug())->with('title','IrishBusiness.ie | Settings');
									
							return Redirect::to('business/add')->with('title','IrishBusiness.ie | Settings');
						}
						
						$this->sales->authenticate(Input::all());
						Auth::user()->logout();
						return Redirect::to('sales')->with('title','IrishBusiness.ie | Settings');	
				}	
				else
				{		
					
						$this->sales->authenticate(Input::all());
						Auth::user()->logout();
						return Redirect::to('sales')->with('title','IrishBusiness.ie | Settings');	
				}

			

			return Redirect::back()->withInput()->with('errorNotify','wrong email/password combination')->withInput();
		}	
		catch(FormValidationException  $e)
		{
			return 'catch';
			return Redirect::back()->withInput()->withErrors($e->getErrors())->with('errorNotify','wrong email/password combination');
		}
	}



}
