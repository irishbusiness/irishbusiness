<?php

class Client extends \Eloquent {
	protected $guarded = ["id"];
	protected $table = "business_subscription";

	public function user()
	{
		$this->belongsTo('User');
	}
}