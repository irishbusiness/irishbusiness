<?php namespace IrishBusiness\Forms;

class RegisterBusiness extends Form {

	protected $rules = [
		'address1' => 'required',
		'name' => 'required|unique:businesses',
		'keywords' => 'required',
		'locations' => 'required',
		'phone' => 'required',
		'website' => 'required',
		'email' => 'required',
		'business_description' => 'required',
		'profile_description' => 'required',
		'mon_fri' => 'required',
		'sat' => 'required',
		'slug' => 'required|unique:businesses'		

	];
} 