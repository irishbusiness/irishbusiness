<?php

class ReviewsController extends \BaseController {

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
			$review = Review::withTrashed()->find($id);
			$review->restore();

			return 'approved';
		}
	}

	function disapproveReviewAjax(){
		if(Request::ajax()){
			$id = Input::get('id');
			$review = Review::find($id);
			$review->delete();

			return 'disapproved';
		}	
	}

}