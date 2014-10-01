<?php namespace IrishBusiness\Forms;

class InviteForm extends Form {

	protected $rules = [
		'firstname' => 'required|alpha_space',
		'lastname' => 'required|alpha_space',
		'email' => 'required|email|unique:salespersons',
		'phone' => 'required',
		'coupon' => 'unique:salespersons',
		'captcha' => 'required'
	];
} 