<?php

class ReviewsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /reviews
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /reviews/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /reviews
	 *
	 * @return Response
	 */
	public function store()
	{	
		$user_id = 1;
		$business_id = 1;

		$businessinfo = Business::findOrFail($business_id)->first();
		$name = Input::get("rating-name");
		$rating = Input::get("rating");
		$description = Input::get("rating-description");

		$review = new Review;
		$review->name = $name;
		$review->rating = $rating;
		$review->description = $description;
		$review->business_id = $business_id;
		$review->user_id = $user_id;

		if($review->save()){
			return Redirect::to("/company/".$businessinfo->slug."/#company-tabs-review")->with('message', "Your review has been submitted.");
		}
	}

	/**
	 * Display the specified resource.
	 * GET /reviews/{id}
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
	 * GET /reviews/{id}/edit
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
	 * PUT /reviews/{id}
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
	 * DELETE /reviews/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}