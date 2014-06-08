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
	public function store($id)
	{	
		$user_id = Auth::user()->user()->id;
		$businessinfo = Business::find($id);
		$rating = Input::get("rating");
		$description = Input::get("rating-description");
		$name = Input::get("rating-name");

		$review = new Review;
		$review->name = $name;
		$review->rating = $rating;
		$review->description = $description;
		$review->business_id = $id;
		$review->user_id = $user_id;

		if($review->save()){
			return Redirect::to("/company/".$businessinfo->slug."/#company-tabs-review")->with('message', "Your review has been submitted.");
		}
	}

	function approveReviewAjax(){
		if(Request::ajax()){
			$id = Input::get('id');
			$review = Review::find($id);
			$review->restore();

			return $id;
		}
	}

	function disapproveReviewAjax(){
		if(Request::ajax()){
			$id = Input::get('id');
			$review = Review::find($id);
			$review->delete();

			return $id;
		}	
	}

}