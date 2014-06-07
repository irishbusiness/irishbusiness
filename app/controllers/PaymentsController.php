
	
<?php
use IrishBusiness\Repositories\PaymentsRepository;

class PaymentsController extends \BaseController {

	protected $payments;

	function __construct(PaymentsRepository $payments)
	{
		
		$this->payments = $payments;
		Event::listen('user.subscribe','IrishBusiness\Mailers\ClientMailer@subscribe');
		
	}



	/**
	 *  BUY VIEW 
	 */

	public function index()
	{
		$subscription = Subscription::first();
		return View::make('client.buy')->withSubscription($subscription);
	}



	/**
	 *  PAYMENT STRIPE STORE 
	 */
	

	public function store()
	{
		$subscription = $this->payments->getSubscription(Input::get('subscription'));
		
		
		if(is_null($subscription)) return Response::view('pagenotfound');
		

	$token = Input::get('stripeToken');
		$email = Input::get('stripeEmail');
		Stripe::setApiKey(Config::get('stripe.secret_key'));

		// Create the charge on Stripe's servers - this will charge the user's card
		try 
		{
			$charge = Stripe_Charge::create(array(
			  "amount" => $subscription->price, // amount in cents, again
			  "currency" => "eur",
			  "card" => $token,
			  "description" => $email)
			);

			$user = $this->payments->attach($subscription);

			Event::fire('user.subscribe',[$user]);
			
			return Redirect::to('business/add')->with('flash_message','Thank you for subscribing to Irishbusiness! You can now add your business.');
		
		} 
		catch(Stripe_CardError $e) 
		{
		  // The card has been declined
			return dd($e);
		}

		
	}

	/**
	 * Display the specified resource.
	 * GET /payments/{id}
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
	 * GET /payments/{id}/edit
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
	 * PUT /payments/{id}
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
	 * DELETE /payments/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}