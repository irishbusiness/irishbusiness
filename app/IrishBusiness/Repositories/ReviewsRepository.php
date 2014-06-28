<?php namespace IrishBusiness\Repositories;

use Hash;
use Auth;
use Review;

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
	
}