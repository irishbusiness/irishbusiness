<?php

use IrishBusiness\Repositories\ReviewsRepository;

class ReviewsController extends \BaseController {

	protected $reviews;
	protected $reviews_mailer;

	function __construct(ReviewsRepository $reviews)
	{
		$this->reviews = $reviews;
		Event::listen('review.confirm','IrishBusiness\Mailers\ReviewsMailer@confirm');
	}

	public function store($id)
	{	
		if( Auth::guest() ){
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
			$review->confirmed = 1;

			$branch = Branch::find($branchId);

			if($review->save()){
				return Redirect::to($branch->branchslug."#company-tabs-review")
					->with('flash_message', "Your review has been submitted.")
					->withTitle($businessinfo->name);
			}
		}

		// --------------------
		$branchId = Input::get("br");
		$business = Business::find($id);

		$rating = Input::get("rating");
		$description = Input::get("rating-description");
		$name = Input::get("rating-name");
		$email = Input::get("rating-email");

		$token = md5(date('l jS \of F Y h:i:s A'));

		$review = new Review;
		$review->name = $name;
		$review->email = $email;
		$review->token = $token;
		$review->rating = $rating;
		$review->description = $description;
		$review->business_id = $id;

		

		if($review->save()){

			$review = Review::where('token', $token)->first();
			// dd($review);

			Event::fire('review.confirm',[$review, $business->name]);

			$branch = Branch::find($branchId);

			return Redirect::to($branch->branchslug)
				->with('flash_message', "Your review has been submitted. Please confirm your email.")
				->withTitle($business->name);
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
		if($this->reviews->confirm($token)){
			return	Redirect::to("/")->with('flash_message', 'Your review has been successfully added.');
		}

		return Redirect::to("/")->with('flash_message', 'Sorry, the link you followed may have been removed or expired.');
	}

}