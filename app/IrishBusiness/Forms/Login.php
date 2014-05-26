<?php namespace IrishBusiness\Forms;

class Login extends Form {

	protected $rules = [
		'email' => 'required',
		'password' => 'required',
	];
} 