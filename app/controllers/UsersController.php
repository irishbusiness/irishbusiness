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

	}

	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('searchpartial.register')->with('title','IrishBusiness.ie | Register');
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

			$id = $this->user->create(Input::all());
			Auth::loginUsingId($id);

			return Redirect::to('settings')->withFlashMessage('Thank you for registering ' . ucwords(Input::get('firstname')) .'! You have been logged in.')
			->with('title','IrishBusiness.ie | Settings');;
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