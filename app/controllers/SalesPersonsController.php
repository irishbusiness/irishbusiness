
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
		Event::listen('salesperson.invite','IrishBusiness\Mailers\SalespersonMailer@invite');

		$this->beforeFilter('SPguest' ,['except'=> ['invite','store']]);
	}

	function index()
	{
		// return dd(Auth::salesperson()->user()->access_level);
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

		return View::make('sales.invite_new')->withTitle('Invite')->withCommissions($commissions);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		
		try
		{

			$this->inviteForm->validate(Input::all());
			
			// if(Input::get('type')==2)
			// {
			// 	if(!$this->salesperson->checkst(Input::get('st')))
			// 	{
			// 		$messages = new Illuminate\Support\MessageBag;
			// 		$messages->add('st', 'Sales Team email does not exists.');
			// 		return Redirect::back()->withInput()->withErrors($messages);
			// 	}
			// }

			// if(Input::get('type')==3)
			// {
			// 	if(!$this->salesperson->checktl(Input::get('tl')))
			// 	{
			// 		$messages = new Illuminate\Support\MessageBag;
			// 		$messages->add('tl', 'Team Leader email does not exists.');
			// 		return Redirect::back()->withInput()->withErrors($messages);
			// 	}
			// }

			// dd(Input::get('captcha_id')."___".Input::get('catcha')."__".$value2['x']." + ".$value2['y']);

			// $isHuman = validateCaptcha(Session::get('veri'), Input::get('captcha_id'), Input::get('captcha'));
			$isHuman = validateHuman(Input::get('captcha'));

			if( !$isHuman ){
				return Redirect::back()->with('flash_message', "Sorry, your captcha code is incorrect. Please prove to us you're not a robot.")
					->with('title', 'IrishBusiness.ie | Invite')->withInput();
			}

			$user = $this->salesperson->create(Input::all());
			
			if( $user ){
				Event::fire('salesperson.invite',[$user]);

				return Redirect::back()->with('flash_message',Input::get('email') .' has been invited!')
				->with('title','IrishBusiness.ie | Settings');
			}

			return Redirect::back()->with('flash_message', "Sorry, your custom coupon code should be 6 characters long.")
					->with('title', 'IrishBusiness.ie | Invite')->withInput();

		}
		catch(FormValidationException  $e)
		{
			
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}

		return Redirect::back()->withInput();
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