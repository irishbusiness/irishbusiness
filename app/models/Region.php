<?php

class Region extends \Eloquent {
	protected $guarded = ['id'];

	protected $table = "regions";

	public function subregions(){
		return $this->hasMany('Subregion', 'subregion_id');
	}
}