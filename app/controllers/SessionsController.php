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
		$email = Input::get('email');
		
		if( $this->user->userExists($email) && !$this->user->isConfirmed($email) ){
			return Redirect::back()->withInput()->with('errorNotify','Please confirm your email first.');
		}

		if(!$this->user->isConfirmed($email))
			return Redirect::back()->withInput()->with('errorNotify','wrong email/password combination');
			
		try
		{

				if(Auth::user()->guest())
				{	
						if($this->user->authenticate(Input::all()))
						{	

							if(Auth::user()->user()->access_level == 3)
							{
								return Redirect::to('admin/settings/general');
							}

							Auth::salesperson()->logout();
							if(hasBusiness()&&countBranches()>0)
								return Redirect::to(branchSlug())->with('title','IrishBusiness.ie | Settings');
							elseif(hasBusiness()&&countBranches()==0)
								return Redirect::to('business/'.businessSlug().'/branch/add');		
							return Redirect::to('business/add')->with('title','IrishBusiness.ie | Settings');
						}
						
						if($this->sales->authenticate(Input::all()))
						{
							
							
							return Redirect::to('sales')->with('title','IrishBusiness.ie | Settings');	
						}
						
						return Redirect::back()->withInput()->with('errorNotify','wrong email/password combination')->withInput();

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
			dd('fuck');
			return Redirect::back()->withInput()->withErrors($e->getErrors())->with('errorNotify','wrong email/password combination');
		}
	}



}
