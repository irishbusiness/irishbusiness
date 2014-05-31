<?php

class Commission extends Eloquent {

	protected $table = 'commissions';
	/*protected $softDelete = true;*/
	protected $guarded = ["id"];


	public function salespersons()
	{
		return $this->hasMany('Salesperson')->withTimestamps();;
	}	
}