<?php namespace IrishBusiness\Forms;

class SalesUpdatePassword extends Form {

	protected $rules = [
		'password' => 'required|confirmed'
	];
} 