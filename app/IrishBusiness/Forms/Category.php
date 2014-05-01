<?php namespace IrishBusiness\Forms;

class Category extends Form {

	protected $rules = [
		'name' => 'required|unique:categories'
	];
} 