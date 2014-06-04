<?php namespace IrishBusiness\Repositories;

use Business;
use Auth;

class BusinessRepository {

	function getAll(){
		return $businesses = Business::all();
	}	

	function create($input){

		$business = new Business;
		$address = $input['address1'] . ',' . $input['address2'] . ',' . $input['address3']  . ',' .$input['address4'];
		$business->name = $input['name'];
		$business->address = $address;
		$business->keywords = $input['keywords'];
		$business->locations = $input['locations'];
		$business->phone    =   $input['phone'];
		$business->website    =   $input['website'];
		$business->email    =   $input['email'];
        $business->business_description    =   $input['business_description'];
		$business->profile_description   =   $input['profile_description'];
		$business->mon_fri   =   $input['mon_fri'];
		$business->sat   =   $input['sat'];
		$business->facebook   =   $input['facebook'];
		$business->twitter  =   $input['twitter'];
		$business->google  =   $input['google'];
        $business->user_id = Auth::user()->user()->id;
        // $business->user_id = 1;


        $business->slug = $input['slug'];

        // logo
        if( !is_null($input['logo']))
        {
            $dir = $dir = public_path().'/images/companylogos/';
            $image  =   $input['logo'];
            $imagename = md5(date('YmdHis')).'.jpg';
            $filename = $dir.$imagename;

            if ($image->getMimeType() == 'image/png'
                || $image->getMimeType() == 'image/jpg'
                || $image->getMimeType() == 'image/gif'
                || $image->getMimeType() == 'image/jpeg'
                || $image->getMimeType() == 'image/pjpeg')
            {
                $image->move($dir, $filename);
                $business->logo  =   'images/companylogos/'.$imagename;
            } else {
                $business->logo  =   'images/companylogos/'.$imagename;
            }

        } else {
            $business->logo  =   'images/companylogos/sample_company.jpg';
        }

		$business->save();

		return $business->id;

	}

    function update($input, $id){
        $old_businessinfo = Business::whereId($id)->first();

        $address = $input['address1'] . ',' . $input['address2'] . ',' . $input['address3']  . ',' .$input['address4'];

        $business = Business::whereId($id)->first();

        $business->name = $input['name'];
        $business->address = $address;
        $business->keywords = $input['keywords'];
        $business->locations = $input['locations'];
        $business->phone    =   $input['phone'];
        $business->website    =   $input['website'];
        $business->email    =   $input['email'];
        $business->business_description    =   $input['business_description'];
        $business->profile_description   =   $input['profile_description'];
        $business->mon_fri   =   $input['mon_fri'];
        $business->sat   =   $input['sat'];
        $business->facebook   =   $input['facebook'];
        $business->twitter  =   $input['twitter'];
        $business->google  =   $input['google'];


        $business->slug = $input['slug'];

        // logo
        if( !is_null($input["logo"]) )
        {
            $dir = $dir = public_path().'/images/companylogos/';
            $image  =   $input['logo'];
            $imagename = md5(date('YmdHis')).'.jpg';
            $filename = $dir.$imagename;

            if ($image->getMimeType() == 'image/png'
                || $image->getMimeType() == 'image/jpg'
                || $image->getMimeType() == 'image/gif'
                || $image->getMimeType() == 'image/jpeg'
                || $image->getMimeType() == 'image/pjpeg')
            {
                $image->move($dir, $filename);
                $business->logo  =   'images/companylogos/'.$imagename;
            } else {
                $business->logo  =   'images/companylogos/'.$imagename;
            }

        } else {
            $business->logo  =   $old_businessinfo->logo;
        }

        $business->save();

        $id = $old_businessinfo->id;

        $business = Business::findOrFail($id);
        return $business->slug;
    }


}