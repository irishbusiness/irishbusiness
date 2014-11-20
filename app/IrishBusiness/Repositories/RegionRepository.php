<?php namespace IrishBusiness\Repositories;

use Region;
use Subregion;

class RegionRepository {

	function create($input){

	}

	function delete($id){
		$region = Region::find($id);
		if( $region->delete() ){
			return true;
		}
		return false;
	}
}