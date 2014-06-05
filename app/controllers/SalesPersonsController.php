
<?php

use IrishBusiness\Forms\InviteForm;
use IrishBusiness\Forms\SalesUpdatePassword;
use IrishBusiness\Forms\FormValidationException;
use IrishBusiness\Repositories\SalesRepository;

class SalesPersonsController extends \BaseController {

	protected $inviteForm;
	protected $salesperson;
	protected $updateForm;
	function __construct(InviteForm $inviteForm, SalesRepository $salesperson, SalesUpdatePassword $updatePassForm)
	{
		$this->updatePassForm = $updatePassForm;
		$this->inviteForm = $inviteForm;
		$this->salesperson = $salesperson;
		Event::listen('salesperson.invite','IrishBusiness\Mailers\SalesPersonMailer@invite');

		$this->beforeFilter('SPguest');
	}

	function index()
	{
		return View::make('sales.profile')->withTitle('Profile')->with('salesperson',Auth::salesperson()->user());
	}

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function invite()
	{
		$commissions = $this->salesperson->getCommissions();

		return View::make('sales.invite')->withTitle('Invite')->withCommissions($commissions);
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
			$this->inviteForm->validate(Input::all());

			$user = $this->salesperson->create(Input::all());
			
			Event::fire('salesperson.invite',[$user]);

			return Redirect::to('sales')->withFlashMessage('Thank you for registering ' . ucwords(Input::get('firstname')) .'! You have been logged in.')
			->with('title','IrishBusiness.ie | Settings');
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
	public function changePassword()
	{

		return View::make('sales.changepassword')->withTitle('changePassword');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updatePassword()
	{
		try
		{		
			$user = Auth::salesperson()->user();
			
			if(!Hash::check(Input::get('oldpassword'),$user->password))
				return Redirect::back()->with('oldpass','Current Password don\'t match.');
			
			$this->updatePassForm->validate(Input::all());
			$this->salesperson->update(Input::get('password'));
			return Redirect::to('sales')->with('flash_message','Password Updated Succesfully!');
		}
		catch(FormValidationException  $e)
		{
			
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}

	}

}