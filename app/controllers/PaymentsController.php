
	
<?php
use IrishBusiness\Repositories\PaymentsRepository;

class PaymentsController extends \BaseController {

	protected $payments;

	function __construct(PaymentsRepository $payments)
	{
		
		$this->payments = $payments;
		
	}


	public function index()
	{
		$subscription = Subscription::first();
		return View::make('client.buy')->withSubscription($subscription);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /payments/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /payments
	 *
	 * @return Response
	 */
	public function store()
	{
		$subscription = $this->payments->getSubscription(Input::get('subscription'));
		$subscription = $this->payments->getSubscription(3);
		if(is_null($subscription)) return Response::view('pagenotfound');
		

		$token = Input::get('stripeToken');
		$email = Input::get('stripeEmail');
		Stripe::setApiKey(Config::get('stripe.secret_key'));

	

		// Create the charge on Stripe's servers - this will charge the user's card
		try {
			$charge = Stripe_Charge::create(array(
			  "amount" => $subscription->price, // amount in cents, again
			  "currency" => "eur",
			  "card" => $token,
			  "description" => $email)
			);
		} catch(Stripe_CardError $e) {
		  // The card has been declined
			var_dump($e);
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