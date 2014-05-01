<?php namespace IrishBusiness\Forms;

class Login extends Form {

	protected $rules = [
		'username' => 'required|unique:users',
		'password' => 'required',
	];
} 