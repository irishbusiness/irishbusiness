<?php

class Business extends \Eloquent {
	protected $table = 'businesses';

	public function categories()
	{
		return $this->belongsToMany('Category')->withTimestamps();;
	}

    public function user()
    {
        return $this->belongsTo('user');
    }

    public function reviews()
    {
    	return $this->hasMany('Review', 'business_id');
    }
}