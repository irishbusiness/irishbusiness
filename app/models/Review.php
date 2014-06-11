<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Review extends \Eloquent {
	protected $fillable = ["id"];
	protected $table = "reviews";
	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
    
	public function business(){
		return $this->belongsTo('Business', 'business_id');
	}
}