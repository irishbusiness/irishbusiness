<?php namespace IrishBusiness\Forms;

class Category extends Form {

	protected $rules = [
		'name' => 'required|alpha|unique:categories'
	];
} 