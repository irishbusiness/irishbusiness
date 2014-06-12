
<?php
use IrishBusiness\Repositories\PaymentsRepository;

class PaymentsController extends \BaseController {

	protected $payments;

	function __construct(PaymentsRepository $payments)
	{
		
		$this->payments = $payments;
		$this->beforeFilter('hasBusiness',['only' => ['index']]);
		$this->beforeFilter('hasCoupon',['only' => ['index']]);
		Event::listen('user.subscribe','IrishBusiness\Mailers\ClientMailer@subscribe');
		
	}


	/**
	 *  ASK COUPON CODE VIEW 
	 */

	public function addCode()
	{
		return View::make('client.askcoupon')->with('title','Discount Coupon');
	}

	/**
	 *  STORE COUPON CODE POST 
	 */

	public function storeCode()
	{
		$code = Input::get('code');

		if(!$this->payments->validateCoupon($code))
			return Redirect::back()->withInput()->with('error','Coupon is invalid.');

		if(!$this->payments->storeCoupon($code))
			return Redirect::back()->withInput()->with('error','Coupon is invalid.');
	
		if(strlen($code)>6)
			return Redirect::to('business/add')->with('flash_message','Thank you for subscribing to Irishbusiness! You can now add your business.');
	
		return Redirect::to('buy');		
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


}