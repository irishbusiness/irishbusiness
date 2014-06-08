<?php namespace IrishBusiness\Forms;

class ClientsUpdatePassword extends Form {

	protected $rules = [
		'password' => 'required|confirmed'
	];
} 