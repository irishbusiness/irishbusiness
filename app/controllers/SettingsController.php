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
		$settings = MainSetting::orderBy('created_at', 'desc')->first();
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
                	$mainsettings->headerlogo  =   public_path().'/images/logo/header/'.$filename;
                }
            } else {
                $mainsettings->headerlogo  =   public_path().'/images/logo/header/default.png';
                $imageError1 = "It seems the header logo isn't valid.";
            }
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
                	$mainsettings->footerlogo  =   public_path().'/images/logo/footer/'.$filename;
                }
            } else {
                $mainsettings->footerlogo  =   public_path().'/images/logo/footer/default.png';
                $imageError2 = "It seems the footer logo isn't valid.";
            }
        }

        $successmsg = "Settings has been updated.";
        $failedmsg = "Unable to save your settings this time.";

        if($mainsettings->save()){
        	return View::make('admin.admin_settings_general')->with('successmsg', $successmsg)->with('imageError1', $imageError1)
        		->with('imageError2', $imageError2);
        }else {
        	return Redirect::to('/admin_settings_general')->with('failedmsg', $failedmsg)->withInput();
        }

        echo "filename=".$filename."<br>";
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
