<?php

use IrishBusiness\Forms\Register;
use IrishBusiness\Forms\FormValidationException;
use IrishBusiness\Repositories\UserRepository;

class UsersController extends \BaseController {

	protected $registerForm;
	protected $user;

	function __construct(Register $registerForm, UserRepository $user)
	{
		$this->registerForm = $registerForm;
		$this->user = $user;
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

		return View::make('client.confirm')->withTitle('title','Thank you.');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.admin_register')->withTitle('Register');
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

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}