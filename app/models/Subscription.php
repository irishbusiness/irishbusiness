<?php

class Subscription extends \Eloquent {
	protected $guarded = ["id"];

	protected $table = "subscriptions";

	public static $rules = [
		"name" => "required",
		"price" => "required|integer",
		"duration" => "required",
		"blogs_limit" => "required|integer",
		"max_location" => "required|integer",
		"max_categories" => "required|integer"
	];

	public function isValid($input){
		$validation = Validator::make($input, static::$rules);

		if($validation->passes()){
			return true;
		}

		$this->errors = $validation->messages();
		return false;
	} 
}