
<?php

use IrishBusiness\Forms\InviteForm;
use IrishBusiness\Forms\FormValidationException;
use IrishBusiness\Repositories\SalesRepository;

class SalesPersonsController extends \BaseController {

	protected $inviteForm;
	protected $salesperson;

	function __construct(InviteForm $inviteForm, SalesRepository $salesperson)
	{
		$this->inviteForm = $inviteForm;
		$this->salesperson = $salesperson;
		Event::listen('salesperson.invite','IrishBusiness\Mailers\SalesPersonMailer@invite');
	}

	function index()
	{
		return View::make('sales.index')->withTitle('Sales');
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