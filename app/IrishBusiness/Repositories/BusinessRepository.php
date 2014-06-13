<?php namespace IrishBusiness\Repositories;

use Business;
use Auth;
use Branch;
use Image;
use Coupon;
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

        if($input['slug'] == null){
            $name = stripcslashes(strtolower($input['name']));
            $business->slug = preg_replace("/[\s_]/", "-", $name).'-'.substr(md5(uniqid(rand(1,6))), 0, 5);
        } else {
            $business->slug = strtolower($input['slug']);
        }

        // logo
        if( !is_null($input['logo']))
        {
            // $dir = public_path().'public/images/companylogos/';
            $image  =   $input['logo'];
            $imagename = md5(date('YmdHis')).'.jpg';
            // $filename = $dir.$imagename;

            if ($image->getMimeType() == 'image/png'
                || $image->getMimeType() == 'image/jpg'
                || $image->getMimeType() == 'image/gif'
                || $image->getMimeType() == 'image/jpeg'
                || $image->getMimeType() == 'image/pjpeg')
            {
                // $image->move($dir, $filename);
                $path = public_path('images/companylogos/' . $imagename);
                Image::make($image->getRealPath())->resize(150, 150)->save($path);
                $business->logo  =   'images/companylogos/'.$imagename;
            } else {
                $business->logo  =   'images/companylogos/'.$imagename;
            }

        } else {
            $business->logo  =   'images/companylogos/sample_company.jpg';
        }

        if(!is_null($input['profilebanner']))
        {
            $image = $input['profilebanner'];
            $imagename = md5(date('YmdHis')).'.jpg';

            if ($image->getMimeType() == 'image/png'
                || $image->getMimeType() == 'image/jpg'
                || $image->getMimeType() == 'image/gif'
                || $image->getMimeType() == 'image/jpeg'
                || $image->getMimeType() == 'image/pjpeg')
            {
                // $image->move($dir, $filename);
                $path = public_path('images/companylogos/' . $imagename);
                Image::make($image->getRealPath())->save($path);
                $business->profilebanner  =   'images/companylogos/'.$imagename;
            }

        }

		$business->save();

		return $business;

	}

    function update($slug, $input, $branchId){
        $old_businessinfo = Business::whereSlug($slug)->first();
        $branch = Branch::find($branchId);

        $address = $input['address1'] ;
        if(trim($input['address2'])!='')
        $address .= '*' . $input['address2'];
        if(trim($input['address3'])!='')
        $address .= '*' . $input['address3'];
        if(trim($input['address4'])!='')
        $address .= '*' . $input['address4'];
        

        $business = $branch->business;

        $branch->business->name = $input['name'];
        $branch->business->keywords = $input['keywords'];
        
        $business->business_description    =   $input['business_description'];
        $business->profile_description   =   $input['profile_description'];

        $branch->mon_fri   =   $input['mon_fri'];
        $branch->sat   =   $input['sat'];
        $branch->facebook   =   $input['facebook'];
        $branch->twitter  =   $input['twitter'];
        $branch->google  =   $input['google'];
        $branch->address = $address;
        $branch->locations = $input["locations"];
        $branch->website = $input["website"];
        $branch->phone = $input["phone"];
        $branch->email = $input["email"];

        $branch->business->slug = $input['slug'];
        $branch->save();

        // logo
        if( !is_null($input["logo"]) )
        {
            // $dir = $dir = public_path().'/images/companylogos/';
            $image  =   $input['logo'];
            $imagename = md5(date('YmdHis')).'.jpg';
            // $filename = $dir.$imagename;

            if ($image->getMimeType() == 'image/png'
                || $image->getMimeType() == 'image/jpg'
                || $image->getMimeType() == 'image/gif'
                || $image->getMimeType() == 'image/jpeg'
                || $image->getMimeType() == 'image/pjpeg')
            {
                // $image->move($dir, $filename);
                $path = public_path('images/companylogos/' . $imagename);
                Image::make($image->getRealPath())->resize(150, 150)->save($path);
                
                $business->logo  =   'images/companylogos/'.$imagename;
            } else {
                $business->logo  =   'images/companylogos/'.$imagename;
            }

        } else {
            $business->logo  =   $old_businessinfo->logo;
        }

        
        if(!is_null($input['profilebanner']))
        {
            $image = $input['profilebanner'];
            $imagename = md5(date('YmdHis')).'.jpg';

            if ($image->getMimeType() == 'image/png'
                || $image->getMimeType() == 'image/jpg'
                || $image->getMimeType() == 'image/gif'
                || $image->getMimeType() == 'image/jpeg'
                || $image->getMimeType() == 'image/pjpeg')
            {
                // $image->move($dir, $filename);
                $path = public_path('images/companylogos/' . $imagename);
                Image::make($image->getRealPath())->save($path);
                $business->profilebanner  =   'images/companylogos/'.$imagename;
            }

        }

        $business->save();

        $id = $old_businessinfo->id;

        $business = Business::findOrFail($id);
        return $business->slug;
    }

    function storeBranch($input,$slug)
    {
        $business = Business::whereSlug($slug)->first();

        $address = $input['address1'] . '*' . $input['address2'] . '*' . $input['address3']  . '*' .$input['address4'];
        
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
        $branch->linkedin  =   $input['linkedin'];
        
        // $branch->branchslug = $slug."-".str_replace(" ", "-", $input['address1'].'-'.$input['address2'])."-".substr(md5(uniqid(rand(1,6))), 0, 5);
        $branch->branchslug = $input['branchslug'];
        $business->branches()->save($branch);


        return $branch->branchslug;
        
    }

    public function keywordExplode($keywordsraw){
        
        $output = "";
        $keywords = explode(",", $keywordsraw);
        $count = count($keywords);
        foreach($keywords as $index => $keyword)
        {
            $output.= trim($keyword);   
            if($index+1 != $count) $output.= '-';       
        }
        return $output;
    
    }

    function storeMap($latlng,$branchslug)
    {
        $branch = Branch::whereBranchslug($branchslug)->first();
        $branch->latlng = $latlng;
        $branch->save();
    }

    function isOwnder($slug)
    {
       
        if(Business::whereSlug($slug)->first()->user_id==Auth::user()->user()->id)
            return true;
        return false;
    }

    function createCoupon($input, $type){
        if( $type == "ajax" ){    
            $companyName = decode($input["companyName"]);
            $companySlogan = decode($input["companySlogan"]);
            $fullName = decode($input["fullName"]);
            $jobTitle = decode($input["jobTitle"]);
            $businessAddress = $input["businessAddress"];
            $businessAddress = decode($businessAddress);
            $phoneOne = $input["phoneOne"];
            $phoneTwo = $input["phoneTwo"];
            $emailAddress = $input["emailAddress"];
            $siteUrl = decode($input["siteUrl"]);

            $branch_id = $input["br"];


            $handle = imagecreatefrompng( public_path().'/scripts/templates/template.png' ); 
            $brown = ImageColorAllocate ($handle, 84, 48, 26);
            $lightBrown = ImageColorAllocate ($handle, 145, 116, 94);
            $white = ImageColorAllocate ($handle, 255, 255, 255);
            $peach = ImageColorAllocate ($handle, 238, 222, 200);

            //company name
            ImageTTFText ($handle, 18, 0, 20, 35, $brown, public_path()."/scripts/fonts/timesbd.ttf", $companyName);

            //company slogan
            ImageTTFText ($handle, 9, 0, 20, 50, $lightBrown, public_path()."/scripts/fonts/GOTHIC.TTF", $companySlogan);

            //full name
            ImageTTFText ($handle, 14, 0, 20, 110, $white, public_path()."/scripts/fonts/times.ttf", $fullName);

            //job title
            ImageTTFText ($handle, 9, 0, 19, 122, $peach, public_path()."/scripts/fonts/GOTHIC.TTF", $jobTitle);

            //business address
            ImageTTFText ($handle, 10, 0, 20, 160, $brown, public_path()."/scripts/fonts/GOTHIC.TTF", $businessAddress);

            //phone number #1
            ImageTTFText ($handle, 9, 0, 317, 160, $brown, public_path()."/scripts/fonts/GOTHIC.TTF", $phoneOne); 

            //phone number #2
            ImageTTFText ($handle, 9, 0, 317, 175, $brown, public_path()."/scripts/fonts/GOTHIC.TTF", $phoneTwo);

            //email address
            ImageTTFText ($handle, 9, 0, 275, 190, $brown, public_path()."/scripts/fonts/GOTHIC.TTF", $emailAddress);

            //site url (exmple of how to center copy)
            $fontSize = "10";
            $width = "420";
            $textWidth = $fontSize * strlen($siteUrl);
            $position_center = $width / 2 - $textWidth / 2.6;
            ImageTTFText ($handle, 9, 0, $position_center, 240, $brown, public_path()."/scripts/fonts/GOTHIC.TTF", $siteUrl);

            imagealphablending( $handle, false );
            imagesavealpha( $handle, true );
            // ImagePng ($handle);

            $temp_name = md5(date('l jS \of F Y H:i:s'));
            if(ImagePng($handle, public_path()."/images/coupons/temp/$temp_name.png")){
                imagedestroy( $handle );

                $bid = $input["b"];

                $business = Business::find($bid);

                $coupon = new Coupon;
                $coupon->name = '/images/coupons/temp/'.$temp_name.".png";
                $coupon->business_id = $bid;
                $coupon->save();

                // return "bid = ".$bid;

                return "New coupon has been added successfully!";

            }

            imagedestroy( $handle );
            return "Sorry, we can't save your coupon right now.";
        }else{
            $business_id = $input["b"];

            $business = Business::find($business_id);

            $branch_id = $input["br"];

            $coupon = new Coupon;

            if( !is_null($input["filecoupon"]))
            {
                $dir = $dir = public_path().'/images/coupons/temp/';
                $image  =   $input["filecoupon"];
                // dd($image);
                $imagename = md5(date('YmdHis')).'.jpg';
                $filename = $dir.$imagename;

                if ($image->getMimeType() == 'image/png'
                    || $image->getMimeType() == 'image/jpg'
                    || $image->getMimeType() == 'image/gif'
                    || $image->getMimeType() == 'image/jpeg'
                    || $image->getMimeType() == 'image/pjpeg')
                {
                    $image->move($dir, $filename);
                    $coupon->name  =   '/images/coupons/temp/'.$imagename;
                } else {
                    return "It seems the file you upload is invalid. Please upload image files only.";
                }

            } else {
                return "Please choose a file to continue.";
            }
            $coupon->business_id = $business_id;
            $coupon->save();

            return "Your coupon has been added successfully.";
        }
    }

    function delete_business($id){
        $business = Business::find($id);

        if($business->delete()){
            return true;
        }

        return false;
    }
}