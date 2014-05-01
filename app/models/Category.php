<?php

class Category extends Eloquent {

	protected $table = 'categories';

	public function businesses()
	{
		return $this->belongsToMany('Business')->withTimestamps();;
	}

	
}