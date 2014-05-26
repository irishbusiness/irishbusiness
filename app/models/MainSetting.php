<?php

class MainSetting extends Eloquent {
	
	protected $guarded = ["id"];

	protected $table = 'main_settings';

	public static $rules = [
		"domain_name" => "required",
   		"admin_email" => "required",
   		"search_result_per_page" => "required",
   		"view_statistics" => "required",
   		"analytics_code" => "required",
   		"footer_text" => "required",
   		"allow_statistics" => "required",
   		"reviews_approval" => "required",
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