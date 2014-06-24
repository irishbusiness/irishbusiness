<?php

class SubscriptionController extends \BaseController {

	public function __construct(Subscription $subscriptions){
		$this->subscriptions = $subscriptions;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$subscriptions = $this->subscriptions->whereIs_deleted(0)->orderBy('price', 'ASC')->get();
		return View::make("admin.admin_settings_subscription")->with("subscriptions", $subscriptions)
			->withTitle("Admin - Subscription Settings");
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		if( !$this->subscriptions->isValid($input)){
            return Redirect::back()->withInput()->withErrors($this->subscriptions->errors);
        }

        if(Input::has("num")){
        	$subscription = Subscription::findOrFail(Input::get("num"));
        }else{
        	$subscription = new Subscription;
        }

        $subscription->name = Input::get("name");
        $subscription->currency = Input::get("currency");
        $subscription->price = Input::get("price");
        $subscription->discounted_price = Input::get("discounted_price");
        $subscription->st_discounted_price = Input::get("st_discounted_price");
        $subscription->duration = Input::get("duration");
        $subscription->blogs_limit = Input::get("blogs_limit");
        $subscription->max_location = Input::get("max_location");
        $subscription->max_categories = Input::get("max_categories");
        $success = $subscription->save();
        if($success){
        	$subscriptions = $this->subscriptions->whereIs_deleted(0)->orderBy('price', 'ASC')->get();
        	return View::make("admin.admin_settings_subscription")
        		->with("flash_message", "New Subscription has been added.")->with('subscriptions', $subscriptions)->withTitle("Admin - Subscription Settings");
        }

        return Redirect::back()->withInput()->with('msgerror', "Sorry, we can't process your request right now.")
        	->with('subscriptions', $subscriptions);
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
	public function edit()
	{
		if(Request::ajax())
		{
			$id = Input::get('sid');
			$operation = Input::get("op");

			$subscription = Subscription::findOrFail($id);
			if( $operation == "delete" ){
				$subscription->is_deleted = 1;
				$subscription->save();

				return "deleted";
			}

			return $subscription->toArray();
		}
		
		return 'Something went wrong';
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
