<?php namespace IrishBusiness\Forms;

class AddBranch extends Form {

	protected $rules = [
		'address1' => 'required',
		'locations' => 'required',
		'phone' => 'required',
		'website' => 'required',
		'email' => 'required',
		
		'mon_fri' => 'required',
		'sat' => 'required',
		

	];
} 