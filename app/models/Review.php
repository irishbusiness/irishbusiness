<?php

class Review extends \Eloquent {
	protected $fillable = ["id"];
	protected $table = "reviews";
	protected $softDelete = true;

	public function business(){
		return $this->belongsTo('Business', 'business_id');
	}
}