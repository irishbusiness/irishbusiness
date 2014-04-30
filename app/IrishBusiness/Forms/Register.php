<?php namespace IrishBusiness\Forms;

class Register extends Form {

	protected $rules = [
		'username' => 'required|unique:users',
		'password' => 'required',
		'firstname' => 'required',
		'lastname' => 'required',
		'email' => 'required|email|unique:users',
	];
} 