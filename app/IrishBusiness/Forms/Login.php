<?php namespace IrishBusiness\Forms;

class Login extends Form {

	protected $rules = [
		'username' => 'required',
		'password' => 'required',
	];
} 