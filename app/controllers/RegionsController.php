<?php
use IrishBusiness\Repositories\RegionRepository;

class RegionsController extends \BaseController {

	public function __contruct(){

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
		$subregions = Subregion::where('region_id', '=', $regions->first()->id)->get();
		return View::make('admin.admin_manage_regions')->withRegions($regions)->withSubregions($subregions)
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

}