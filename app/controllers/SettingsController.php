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
        $c = MainSetting::count();
		if($c>0){
            $settings = MainSetting::orderBy('created_at', 'desc')->first();
            return View::make('admin.admin_settings_general')->with('settings', $settings->toArray()); 
        }

       $settings = array(
            "headerlogo" => "",
            "footerlogo" => "",
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


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

         $oldsettings = MainSetting::orderBy('created_at', 'desc')->first();

		if( !$this->settings->isValid($input)){
            return Redirect::back()->withInput()->withErrors($this->settings->errors);
        }

        $mainsettings = new MainSetting;

        $mainsettings->domain_name = Input::get("domain_name");
        $mainsettings->admin_email = Input::get("admin_email");
        $mainsettings->search_result_per_page = Input::get("search_result_per_page");
        $mainsettings->view_statistics = Input::get("view_statistics");
        $mainsettings->analytics_code = Input::get("analytics_code");
        $mainsettings->footer_text = Input::get("footer_text");
        $mainsettings->allow_statistics = Input::get("allow_statistics");
        $mainsettings->reviews_approval = Input::get("reviews_approval");

        $imageError1 = "";
        $imageError2 = "";


        if(Input::hasFile("headerlogo")){
        	$image = Input::file("headerlogo");
        	$destinationPath = public_path().'/images/logo/header/';
			$extension = $image->getClientOriginalExtension(); 
			$filename = md5(date('YmdHis')).".".$extension;

			if ($image->getMimeType() == 'image/png'
                || $image->getMimeType() == 'image/jpg'
                || $image->getMimeType() == 'image/gif'
                || $image->getMimeType() == 'image/jpeg'
                || $image->getMimeType() == 'image/pjpeg'
                || $image->getMimeType() == 'image/png')
			{
                $upload_success = $image->move($destinationPath, $filename);
                if($upload_success){
                	$mainsettings->headerlogo  =   $filename;
                }
            } else {
                $mainsettings->headerlogo  =  'default.png';
                $imageError1 = "It seems the header logo isn't valid.";
            }
        }else {
            $mainsettings->headerlogo = $oldsettings->headerlogo;
        }

        if(Input::hasFile("footerlogo")){
        	$image = Input::file("footerlogo");
        	$destinationPath = public_path().'/images/logo/footer/';
			$extension = $image->getClientOriginalExtension(); 
			$filename = md5(date('YmdHis')).".".$extension;

			if ($image->getMimeType() == 'image/png'
                || $image->getMimeType() == 'image/jpg'
                || $image->getMimeType() == 'image/gif'
                || $image->getMimeType() == 'image/jpeg'
                || $image->getMimeType() == 'image/pjpeg'
                || $image->getMimeType() == 'image/png')
			{
                $upload_success = $image->move($destinationPath, $filename);
                if($upload_success){
                	$mainsettings->footerlogo  =  $filename;
                }
            } else {
                $mainsettings->footerlogo  =  'default.png';
                $imageError2 = "It seems the footer logo isn't valid.";
            }
        }else {
            $mainsettings->footerlogo = $oldsettings->footerlogo;
        }

        if($mainsettings->save()){
           $settings = MainSetting::orderBy('created_at', 'desc')->first();
            return Redirect::to("/admin/settings/general")->with("flash_message", "Your new settings has been updated.");
        }else {
        	return Redirect::to('/admin/settings/general')->with("flash_message", "Sorry, we can't update your settings right now.")->withInput();
        }

        echo "filename=".$filename."<br>";
	}

    public function show_commission(){
        $commissions = Commission::all();
        return View::make("admin.admin_settings_commission")->with('commissions', $commissions);
    }

    public function edit_commission(){
        if(Request::ajax()){
            $id = Input::get('id');
            $newvalue = Input::get("commission");

            $commissions = Commission::find($id);
            $commissions->commission = floatval($newvalue);
            
            $success = $commissions->save();

            if($success){
                return "Changes saved.";
            }

            return "Changes not saved.";
        }

        return 'Something went wrong';
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
