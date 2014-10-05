<?php

use IrishBusiness\Forms\Register;
use IrishBusiness\Forms\FormValidationException;
use IrishBusiness\Repositories\UserRepository;
use IrishBusiness\Forms\ClientsUpdatePassword;

class UsersController extends \BaseController {

	protected $registerForm;
	protected $user;
	protected $updatePassForm;

	function __construct(Register $registerForm, UserRepository $user, ClientsUpdatePassword $updatePassForm)
	{
		$this->registerForm = $registerForm;
		$this->user = $user;
		$this->updatePassForm = $updatePassForm;
		Event::listen('user.signup','IrishBusiness\Mailers\ClientMailer@confirm');
	}

	public function activate($token)
	{
		try
		{
			$this->user->activate($token);	
		}
		catch(Exception $e)
		{
			return Redirect::to('/');
		}

		return View::make('client.confirm')->withTitle('title','IrishBusiness.ie | Thank you for confirming your email.');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.admin_register')->withTitle('IrishBusiness.ie | Register');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		
		try
		{
			$isHuman = validateCaptcha(Session::get('veri'), Input::get('captcha_id'), Input::get('captcha'));
			
			if( !$isHuman ){
				return Redirect::back()->with('flash_message', "Sorry, your captcha code is incorrect. Please prove to us you're not a robot.")
					->with('title', 'IrishBusiness.ie | Register');
			}

			$this->registerForm->validate(Input::all());

			$user = $this->user->create(Input::all());
			
			Event::fire('user.signup',[$user]);

			return Redirect::to('/')->withFlashMessage('Thank you for registering ' . ucwords(Input::get('firstname')) .'! Please confirm your email.');
		}
		catch(FormValidationException  $e)
		{
			
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}

	}

	public function changePassword()
	{
		return View::make('client.changepassword')->withTitle('Change Password');
	}

	public function updatePassword()
	{
		try
		{		
			$user = Auth::user()->user();
			
			if(!Hash::check(Input::get('oldpassword'),$user->password))
				return Redirect::back()->with('oldpass','Current Password don\'t match.');
			
			$this->updatePassForm->validate(Input::all());

			$this->user->update(Input::get('password'));
			
			return Redirect::to('company/'.businessSlug())->with('flash_message','Password Updated Succesfully!');
		}
		catch(FormValidationException  $e)
		{
			
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}
	}

}