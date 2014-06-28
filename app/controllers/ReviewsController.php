<?php

use IrishBusiness\Repositories\ReviewsRepository;

class ReviewsController extends \BaseController {

	protected $reviews;

	function __construct(ReviewsRepository $reviews)
	{
		$this->reviews = $reviews;
	}

	public function store($id)
	{	
		$branchId = Input::get("br");
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

		$branch = Branch::find($branchId);

		if($review->save()){
			return Redirect::to($branch->branchslug."#company-tabs-review")
				->with('flash_message', "Your review has been submitted.")
				->withTitle($businessinfo->name);
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

	function confirm($token){

	}

}