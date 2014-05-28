<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		$c = MainSetting::count();
		if($c>0){
            $settings = MainSetting::orderBy('created_at', 'desc')->first();
            return View::make('admin.admin_settings_general')->with('settings', $settings->toArray()); 
        }

       $settings = array(
            "domain_name" => "",
            "admin_email" => "",
            "search_result_per_page" => "",
            "view_statistics" => "",
            "analytics_code" => "",
            "footer_text" => "",
            "allow_statistics" => "",
            "reviews_approval" => "",
       );

       return View::make('admin.admin_settings_general')->with('settings', $settings);
	}

}
