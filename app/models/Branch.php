<?php

class Branch extends \Eloquent {
	protected $table = 'branches';

	public function business()
	{
		return $this->belongsTo('Business');
	}

}