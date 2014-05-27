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
		$subscriptions = Subscription::all();
		return View::make("admin.admin_settings_subscription")->with("subscriptions", $subscriptions);
		
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

        $subscription = new Subscription;
        $subscription->name = Input::get("name");
        $subscription->price = Input::get("price");
        $subscription->duration = Input::get("duration");
        $subscription->blogs_limit = Input::get("blogs_limit");
        $subscription->max_location = Input::get("max_location");
        $subscription->max_categories = Input::get("max_categories");
        if($subscription->save()){
        	return View::make("admin.admin_settings_subscription")->withFlashMessage("msgsuccess", "New Subscription has been added.");
        }

        return Redirect::back()->withInput()->with('msgerror', "Sorry, we can't process your request right now.");
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
