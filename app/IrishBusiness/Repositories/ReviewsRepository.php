<?php namespace IrishBusiness\Repositories;

use Hash;
use Auth;
use Review;
use Business;
use Branch;

class ReviewsRepository {

	public function confirm($token)
	{
		$review = Review::where('token', $token)->first();

		if( $review->confirmed == 1 ){
			return false;
		}
		
		$review->confirmed = 1;

		if($review->save()){
			return true;
		}

		return false;
	}

	public function getReviewById($id){
		return Review::find($id);
	}

	public function getBusiness($slug){
		$branch = Branch::where('branchslug', '=', $slug)->first();
		return $branch->business;
	}
	
}