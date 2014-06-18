<?php namespace IrishBusiness\Forms;

class AddBranch extends Form {

	protected $rules = [
		'branchslug' => 'required|unique:branches',
		'address1' => 'required',
		'locations' => 'required',
		'phone' => 'required',
		'email' => 'required',
		
		'mon_fri' => 'required'
	];
} 