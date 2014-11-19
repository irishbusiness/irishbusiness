<?php

class Subregion extends \Eloquent {
	protected $guarded = ['id'];

	protected $table = 'region_subregion';

	public function region(){
		return $this->belongsTo('Region');
	}
}