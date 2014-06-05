<?php

class Blog extends \Eloquent {

    protected $table ='blogs';

    public function business()
    {
    	return $this->belongsTo('Business', 'business_id');
    }
}