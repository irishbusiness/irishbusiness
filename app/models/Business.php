<?php

use \Illuminate\Database\Eloquent\SoftDeletingTrait;
class Business extends \Eloquent {

    protected $table = 'businesses';
    protected $softdelete = true;

	public function categories()
	{
		return $this->belongsToMany('Category')->withTimestamps();
	}

    public function user()
    {
        return $this->belongsTo('user');
    }

    public function reviews()
    {
    	return $this->hasMany('Review', 'business_id');
    }

    public function blogs()
    {
        return $this->hasMany('Blog', 'business_id');
    }

    public function branches()
    {
        return $this->hasMany('Branch','business_id');
    }

    public function coupons(){
        return $this->hasMany('Coupon', 'business_id');
    }
}