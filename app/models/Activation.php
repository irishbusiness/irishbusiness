<?php

class Activation extends \Eloquent {
	
	protected $guarded = ["id"];

	protected $table = "user_activations";

	public function user(){
		return $this->belongsTo('User');
	}
}