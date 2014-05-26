<?php namespace IrishBusiness\Forms;

class Register extends Form {

	protected $rules = [
		'password' => 'required|confirmed',
		'firstname' => 'required',
		'lastname' => 'required',
		'email' => 'required|email|unique:users',
		'phone' => 'required'
	];
} 