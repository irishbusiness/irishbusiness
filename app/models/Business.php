<?php

class Business extends \Eloquent {
	protected $table = 'businesses';

	public function categories()
	{
		return $this->belongsToMany('Category')->withTimestamps();;
	}
}