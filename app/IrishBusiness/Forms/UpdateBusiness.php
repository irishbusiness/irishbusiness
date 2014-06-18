<?php namespace IrishBusiness\Forms;

class UpdateBusiness extends Form {

	protected $rules = [
		'address1' => 'required',
		'name' => 'required',
		'keywords' => 'required',
		'locations' => 'required',
		'phone' => 'required',
		'email' => 'required',
		'business_description' => 'required',
		'profile_description' => 'required',
		'mon_fri' => 'required',
		// 'sat' => 'required',
		'slug' => 'required'		

	];
} 