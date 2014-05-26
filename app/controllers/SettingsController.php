<?php

class SettingsController extends \BaseController {

	public function __construct(MainSetting $settings){
		$this->settings = $settings;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$settings = MainSetting::orderBy('created_at', 'desc')->take(1)->get();
		return View::make('admin.admin_settings_general')->with('settings', $settings);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		if( !$this->settings->isValid($input)){
            return Redirect::back()->withInput()->withErrors($this->settings->errors);
        }

       	$save = MainSetting::create([
       		"headerlogo" => Input::file("headerlogo"),
       		"footerlogo" => Input::file("footerlogo"),
       		"domain_name" => Input::get("domain_name"),
       		"admin_email" => Input::get("admin_email"),
       		"search_result_per_page" => Input::get("search_result_per_page"),
       		"view_statistics" => Input::get("view_statistics"),
       		"analytics_code" => Input::get("analytics_code"),
       		"footer_text" => Input::get("footer_text"),
       		"allow_statistics" => Input::get("allow_statistics"),
       		"reviews_approval" => Input::get("reviews_approval")
       	]);

        if($save){
        	var_dump(Input::get("footerlogo"));
			return Redirect::to('/admin_settings_general')->with('message', "New Settings has been updated.");
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
