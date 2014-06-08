<?php

class Coupon extends \Eloquent {
	protected $guarded = ["id"];

	protected $table = "coupons";

	public function business()
	{
		return $this->belongsTo('Business');
	}
}