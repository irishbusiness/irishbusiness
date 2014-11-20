<?php
use IrishBusiness\Repositories\RegionRepository;

class RegionsController extends \BaseController {
	protected $region;

	public function __contruct(RegionRepository $region){
		$this->region = $region;
	}

	/**
	 * Display a listing of the resource.
	 * GET /regions
	 *
	 * @return Response
	 */
	public function index()
	{
		$regions = Region::all();
		return View::make('admin.admin_manage_regions')->withRegions($regions)
			->withTitle('IrishBusiness.ie | Manage Regions');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /regions/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	public function delete(){
		if( Request::ajax() ){
			$res = $this->region->delete(Input::get('id'));

			if($res != false){
				$regions = Regions::all();
				$data_regions = [];

				foreach ($regions as $region) {
					$data_regions[$region->id] = $region->name;
				}

				return json_encode($data_regions);
			}
		}
	}

}