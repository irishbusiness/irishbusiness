<?php namespace IrishBusiness\Forms;

class RegisterBusiness extends Form {

	protected $rules = [
		'name' => 'required|unique:businesses',
		'keywords' => 'required',
		'business_description' => 'required',
		'profile_description' => 'required',

	];
} 