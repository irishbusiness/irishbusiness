<?php

class Category extends Eloquent {

	protected $table = 'categories';
	/*protected $softDelete = true;*/

	protected $rules = [
		"name" => "required|unique:categories"
	];

	public function businesses()
	{
		return $this->belongsToMany('Business')->withTimestamps();;
	}	
}