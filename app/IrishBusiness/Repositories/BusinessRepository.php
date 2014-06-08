<?php namespace IrishBusiness\Repositories;

use Business;
use Auth;
use Branch;

class BusinessRepository {

	function getAll(){
		return $businesses = Business::all();
	}	

	function create($input){

		$business = new Business;
		/*$address = $input['address1'] . ',' . $input['address2'] . ',' . $input['address3']  . ',' .$input['address4'];*/
		$business->name = $input['name'];
		/*$business->address = $address;*/
		$business->keywords = $input['keywords'];
		/*$business->locations = $input['locations'];*/
		/*$business->phone    =   $input['phone'];
		$business->website    =   $input['website'];
		$business->email    =   $input['email'];*/
        $business->business_description    =   $input['business_description'];
		$business->profile_description   =   $input['profile_description'];
		/*$business->mon_fri   =   $input['mon_fri'];
		$business->sat   =   $input['sat'];
		$business->facebook   =   $input['facebook'];
		$business->twitter  =   $input['twitter'];
		$business->google  =   $input['google'];*/
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

		return $business;

	}

    function update($slug, $input, $branchId){
        $old_businessinfo = Business::whereSlug($slug)->first();
        $branch = Branch::find($branchId);

        $address = $input['address1'] ;
        if(trim($input['address2'])!='')
        $address .= ',' . $input['address2'];
        if(trim($input['address3'])!='')
        $address .= ',' . $input['address3'];
        if(trim($input['address4'])!='')
        $address .= ',' . $input['address4'];
        

        $business = $branch->business;

        $branch->business->name = $input['name'];
        $branch->business->keywords = $input['keywords'];
        
        $business->business_description    =   $input['business_description'];
        $business->profile_description   =   $input['profile_description'];
       
        $branch->locations = $input['locations'];
        $branch->address = $address;
        $branch->phone    =   $input['phone'];
        $branch->website    =   $input['website'];
        $branch->email    =   $input['email'];
        $branch->mon_fri   =   $input['mon_fri'];
        $branch->sat   =   $input['sat'];
        $branch->facebook   =   $input['facebook'];
        $branch->twitter  =   $input['twitter'];
        $branch->google  =   $input['google'];

        $branch->save();


        $branch->business->slug = $input['slug'];

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

    function storeBranch($input,$slug)
    {
        $business = Business::whereSlug($slug)->first();

        $address = $input['address1'] . ',' . $input['address2'] . ',' . $input['address3']  . ',' .$input['address4'];
        
        $branch = new Branch;
        $branch->address = $address;
        $branch->locations = $input['locations'];
        $branch->phone    =   $input['phone'];
        $branch->website    =   $input['website'];
        $branch->email    =   $input['email'];
        $branch->mon_fri   =   $input['mon_fri'];
        $branch->sat   =   $input['sat'];
        $branch->facebook   =   $input['facebook'];
        $branch->twitter  =   $input['twitter'];
        $branch->google  =   $input['google'];
        
        $business->branches()->save($branch);

        return $branch->id;

        

    }

    function storeMap($latlng,$id)
    {
        $branch = Branch::find($id);
        $branch->latlng = $latlng;
        $branch->save();
    }

    function isOwnder($slug)
    {
       
        if(Business::whereSlug($slug)->first()->user_id==Auth::user()->user()->id)
            return true;
        return false;
    }


}