<?php namespace IrishBusiness\Repositories;

use Business;
use Review;
use Auth;
use Branch;
use Image;
use Coupon;
use Photogallery;

class BusinessRepository {

	function getAll(){
		return $businesses = Business::all();
	}

    function getAllwithLimit(){
        return $businesses = Business::orderBy('id','DESC')->limit(12)->get();
    }	

	function create($input){
        $hasCommonWords = false;

		$business = new Business;
		$business->name = $input['name'];

        $business_keywords = trim($input['keywords']);
        $business_keywords = preg_replace("/[&]/", " and ", $business_keywords);

        $new_keywords = removeCommonWords($business_keywords);

        $new_keywords = preg_replace('/amp[;]/', '', $new_keywords );

		$business->keywords = $new_keywords;



        $business->business_description    =   $input['business_description'];
        $business->user_id = Auth::user()->user()->id;

        if($input['slug'] == null){
            $name = clean_str(decode($input['name']));
            $business->slug = $name.'-'.substr(md5(uniqid(rand(1,6))), 0, 5);
        } else {
            $business->slug = clean_str($input['slug']);
        }

        // logo
        if( !is_null($input['logo'])){
            $image  =   $input['logo'];
            $imagename = md5(date('YmdHis')).'.jpg';

            if ($image->getMimeType() == 'image/png'
                || $image->getMimeType() == 'image/jpg'
                || $image->getMimeType() == 'image/gif'
                || $image->getMimeType() == 'image/jpeg'
                || $image->getMimeType() == 'image/pjpeg')
            {
                $path = public_path('images/companylogos/' . $imagename);
                $path = str_replace('\\', '/', $path);
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
                $path = public_path('images/companylogos/' . $imagename);
                $path = str_replace('\\', '/', $path);
                Image::make($image->getRealPath())->save($path);
                $business->profilebanner  =   'images/companylogos/'.$imagename;
            }

        }

		$business->save();

		return $business;

	}

    function update($slug, $input, $branchId){
        $old_businessinfo = Business::where('slug', $slug)->first();
        $branch = Branch::where('branchslug', $branchId)->first();

        $branch_ID = $branch->id;

        $address = $input['address1'] ;
        if(trim($input['address2'])!='')
        $address .= '*' . $input['address2'];
        if(trim($input['address3'])!='')
        $address .= '*' . $input['address3'];
        if(trim($input['address4'])!='')
        $address .= '*' . $input['address4'];
        

        $business = $branch->business;

        $business->name = $input['name'];
        
        $business->business_description    =   $input['business_description'];

        $branch->mon_fri   =   $input['mon_fri'];
        $branch->facebook   =   $input['facebook'];
        $branch->twitter  =   $input['twitter'];
        $branch->google  =   $input['google'];
        $branch->linkedin = $input['linkedin'];
        $branch->address = $address;
        $branch->locations = $input["locations"];
        $branch->website = $input["website"];
        $branch->phone = $input["phone"];
        $branch->email = $input["email"];
        

        if(!$branch->save()){
            $branch->save();
        }

        // logo
        if( !is_null($input["logo"]) )
        {
            $image  =   $input['logo'];
            $imagename = md5(date('YmdHis')).'.jpg';

            if ($image->getMimeType() == 'image/png'
                || $image->getMimeType() == 'image/jpg'
                || $image->getMimeType() == 'image/gif'
                || $image->getMimeType() == 'image/jpeg'
                || $image->getMimeType() == 'image/pjpeg')
            {
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
                $path = public_path('images/companylogos/' . $imagename);
                Image::make($image->getRealPath())->save($path);
                $business->profilebanner  =   'images/companylogos/'.$imagename;
            }

        }

        if($input['slug'] == null){
            $name = stripcslashes(strtolower($input['name']));
            $name = str_replace("'", "", $name);
            $business->slug =  preg_replace("/[\s_]/", "-", $name).'-'.substr(md5(uniqid(rand(1,6))), 0, 5);
        } else {
            $business->slug = strtolower($input['slug']);
        }

        
        $business->save();

        $branch = Branch::find($branch_ID);
        return $branch->branchslug;

        $branch = Branch::where('branchslug', $branchslug)->first();
        return $branch->branchslug;


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
        
        $branchslug =  remove_duplicate( $input['branchslug'] );
        
        $branch->branchslug = removeCommonWords( preg_replace('/amp;/', '', $branchslug ) );
        $business->branches()->save($branch);
    

        return $branch->branchslug;
        
    }

    public function keywordExplode($keywordsraw){
        
        $output = "";

        $keywordsraw = str_replace(" ", "-", $keywordsraw);
        $keywordsraw = str_replace(",", "-", $keywordsraw);
        $keywordsraw = preg_replace('/[^A-Za-z0-9\-]/', '', $keywordsraw); // Removes special chars.

        $keywordsraw = preg_replace('/-+/', '-', $keywordsraw);

        $keywords = explode(",", $keywordsraw);
        $count = count($keywords);
        foreach($keywords as $index => $keyword)
        {
            $rawwords = str_replace(" ", "-", $keyword);
            $rawwords = explode(" ", $keyword);
            $count2 = count($rawwords);
            foreach($rawwords as $index2 => $word) 
            {   
                $output.= trim($word);
                    if($index2+1 !=$count2) $output.= '-';    
            }    
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

    function createCouponVersion2($input, $type){
        if( $type == "ajax" ){
            $bid = $input["bid"];
            $expiry_date = $input['expires_at'];

            $business = Business::find($bid);
            $filename = keywordExplode($business->name);

            $img = $input['img'];
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $filename = strtolower( keywordExplode($business->name).uniqid().'.png' );
            $success = file_put_contents(public_path()."/images/coupons/temp/".$filename, $data);

            $coupon = new Coupon;
            $coupon->name = '/images/coupons/temp/'.$filename;
            $coupon->expiry_date = $expiry_date;
            $coupon->business_id = $bid;
            
            if( $coupon->save() ){
                return json_encode( array( 'responseCode' => 'ok', 'message' => 'New coupon has been successfully added!.' ) );
            }

            return json_encode( array( 'responseCode' => 'failed', 'message' => "Sorry, we can't save your coupon right now." ) );;
        }
    }

    function createCoupon($input, $type){
        if( $type == "ajax" ){    

            $companyName = decode($input["companyName"]);
            $companySlogan = decode($input["companySlogan"]);
            $fullName = decode($input["fullName"]);
            $jobTitle = decode($input["jobTitle"]);
            $businessAddress = decode($input["businessAddress"]);
            $businessAddress = str_replace("\\n","\n",$businessAddress);
            $businessAddress = str_replace("\\","",$businessAddress);
            $phoneOne = decode($input["phoneOne"]);
            $phoneTwo = decode($input["phoneTwo"]);
            $emailAddress = decode($input["emailAddress"]);
            $siteUrl = decode($input["siteUrl"]);
            $template = decode($input['template']);

            if( $template == 1 ){
                $template_name = 'template';
            }else if( $template == 2 ){
                $template_name = 'template1';
            }

            $handle = imagecreatefrompng( public_path().'/scripts/templates/'.$template_name.'.png' ); 
            $brown = ImageColorAllocate ($handle, 84, 48, 26);
            $lightBrown = ImageColorAllocate ($handle, 145, 116, 94);
            $white = ImageColorAllocate ($handle, 255, 255, 255);
            $peach = ImageColorAllocate ($handle, 238, 222, 200);

            $companyName_FontSize = 18;
            $companySlogan_FontSize = 9;
            $fullName_FontSize = 14;
            $businessAddress_FontSize = 10;





            if( $template == 1 ){
                //company name
                ImageTTFText ($handle, $companyName_FontSize, 0, 20, 35, $brown, public_path()."/scripts/fonts/timesbd.ttf", $companyName);
                //company slogan
                ImageTTFText ($handle, $companySlogan_FontSize, 0, 20, 50, $lightBrown, public_path()."/scripts/fonts/GOTHIC.TTF", $companySlogan);
                //full name
                ImageTTFText ($handle, $fullName_FontSize, 0, 20, 110, $white, public_path()."/scripts/fonts/times.ttf", $fullName);
                //job title
                ImageTTFText ($handle, $companySlogan_FontSize, 0, 19, 122, $peach, public_path()."/scripts/fonts/GOTHIC.TTF", $jobTitle);
                //business address
                ImageTTFText ($handle, $businessAddress_FontSize, 0, 20, 160, $brown, public_path()."/scripts/fonts/GOTHIC.TTF", $businessAddress);
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

            }else if( $template == 2 ){

                $companyName_FontSize = 40;
                $companySlogan_FontSize = 9;
                $fullName_FontSize = 14;

                $fontStyle = public_path()."/scripts/fonts/GOTHIC.TTF";

                //company name
                ImageTTFText ($handle, $companyName_FontSize, 0, 40, 100, $white, $fontStyle, $companyName);
                //full name
                ImageTTFText ($handle, $fullName_FontSize, 0, 40, 140, $white, $fontStyle, $fullName);
                //job title
                ImageTTFText ($handle, $companySlogan_FontSize, 0, 40, 300, $white, $fontStyle, $companySlogan);
            }

            imagealphablending( $handle, false );
            imagesavealpha( $handle, true );
            // ImagePng ($handle);

            // imagedestroy( $handle );


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

    function update_branch_keywords($old_branchslug, $new_keywords, $business_id, $operation){
        try {

            $branch = Branch::where('branchslug', $old_branchslug)->first();
            $business = Business::find($business_id);


            $old_keywords = $business->keywords;
            $old_additional_keywords = $business->additional_keywords;

            $new_branch_slug = "";
            $new_additional_keywords = "";

            if( $operation == "add" ){
                $new_keywords = trim( removeCommonWords( $new_keywords ) );

                $old_additional_keywords_arr = explode(',', $old_additional_keywords);
                $old_keywords_arr = explode(',', $old_keywords);

                $flag = 0;

                foreach ($old_keywords_arr as $key => $value) {
                    if( $new_keywords == trim( $value ) ){
                        $flag  = 1;
                        
                    }
                }

                foreach ($old_additional_keywords_arr as $key => $value) {
                    if( $new_keywords == ( $value ) ){
                        $flag  = 1;
                        
                    }
                }

                if( $flag === 1 ){
                    throw new \Exception("This keyword already exists!", 1);
                }

                $new_branch_slug = $old_keywords.','.$old_additional_keywords.','.$new_keywords;
                $new_branch_slug = preg_replace("/\b(\w+)\s+\\1\b/i", "$1", $new_branch_slug);
                $new_branch_slug = remove_duplicate( cleanSlug( keywordExplode( $new_branch_slug ) ) );

                $branch->branchslug = $new_branch_slug;
                $business->additional_keywords = $old_additional_keywords.','.$new_keywords;
            }else{

                $old_additional_keywords_arr = explode(",", $old_additional_keywords);

                foreach ($old_additional_keywords_arr as $key => $value) {
                    if( $value != $new_keywords ){
                        $new_additional_keywords .= $value.',';
                    }
                }

                $new_additional_keywords = substr($new_additional_keywords, 0, strlen($new_additional_keywords)-1);

                $new_branch_slug = remove_duplicate( cleanSlug( keywordExplode( $old_keywords.','.$new_additional_keywords ) ) );

                $branch->branchslug = $new_branch_slug;
                $business->additional_keywords = $new_additional_keywords;

            }

            if( $branch->save() && $business->save() ){
                return remove_duplicate( cleanSlug( keywordExplode($new_branch_slug) ) );
            }

            return false;

        } catch (\Exception $e) {
            return false;
        }
    }


    function update_branch_keyphrase($old_branchslug, $keyphrase, $business_id, $operation){
        try {
            $branch = Branch::where('branchslug', $old_branchslug)->first();
            $business = Business::find($business_id);


            $old_keyphrase = $business->keywords;
            $old_additional_keywords = $business->additional_keywords;

            $new_branch_slug = "";
            $new_keyphrase = "";

            if( $operation == 'add' ){
                $keyphrase = trim(removeCommonWords($keyphrase));

                $old_keyphrase_arr = explode(',', $old_keyphrase);
                $old_additional_keywords_arr = explode(',', $old_additional_keywords);

                $flag = 0;

                foreach ($old_keyphrase_arr as $key => $value) {
                    if( $keyphrase == trim($value) ){
                        $flag  = 1;
                    }
                }

                foreach ($old_additional_keywords_arr as $key => $value) {
                    if( $keyphrase == trim($value) ){
                        $flag  = 1;
                    }
                }

                if( $flag === 1 ){
                    throw new \Exception("This keyphrase already exists!", 1);
                }

                $new_branch_slug = $old_keyphrase.','.trim($keyphrase).','.$old_additional_keywords;

                $new_branch_slug = preg_replace("/\b(\w+)\s+\\1\b/i", "$1", $new_branch_slug);

                $new_branch_slug = keywordExplode( removeCommonWords( $new_branch_slug ) );

                $keyphrase = remove_duplicate( cleanSlug( removeCommonWords( $keyphrase ) ) );

                $branch->branchslug = cleanSlug( remove_duplicate( $new_branch_slug ) );
                $business->keywords = $old_keyphrase.','.$keyphrase;

            }else if( $operation == 'delete' ){
                $old_keyphrase_arr = explode(",", $old_keyphrase);

                foreach ($old_keyphrase_arr as $key => $value) {
                    if( trim($value) != trim($keyphrase) ){
                        $new_keyphrase .= trim($value).',';
                    }
                }

                $new_keyphrase = substr($new_keyphrase, 0, strlen($new_keyphrase)-1);

                $new_branch_slug = cleanSlug( keywordExplode( $new_keyphrase.",".$old_additional_keywords ) );

                $branch->branchslug = removeCommonWords( $new_branch_slug );
                $business->keywords = $new_keyphrase;
            }

            if( $branch->save() && $business->save() ){
                return  remove_duplicate( cleanSlug( removeCommonWords( keywordExplode($new_branch_slug) ) ) );
            }

            return false;

        } catch (\Exception $e) {
            return false;
        }
    }

    function getBranches($category, $query1)
    {
        $branches = Branch::Join('businesses','businesses.id', '=', 'branches.business_id')
        ->with('business.categories')
        ->join('business_category','business_category.business_id', '=', 'businesses.id'  )
        ->join('categories','business_category.category_id', '=', 'categories.id'  )
        ->whereRaw("(businesses.name like '%$category%' or businesses.keywords like '%$category%' or categories.name like '$category') $query1 ")
        ->groupBy('branches.id')
        ->paginate(7, ['branches.*','businesses.id as bid','businesses.name',
            'businesses.business_description','businesses.profile_description','businesses.slug','businesses.logo']);

        return $branches;
    }

    function getBranch($branchslug)
    {
        $branch = Branch::whereBranchslug($branchslug)->first();

        return $branch;
    }

    function getBranchById($id)
    {
        $branch = Branch::find($id);

        return $branch;
    }

    function getQuery($addresses)
    {
        $query1 = 'and ';
        /*$query1='';*/
        foreach($addresses as $address)
        {
            $query1 .= '(';
            $string = trim(preg_replace('/\*/', '', $address));
            $query1 .= "branches.address like '%$string%' or branches.locations like '%$string%'"; 
            $query1 .= ') and ';
        }
        $query1 .= "branches.locations like '%%'";

        return $query1;
    }

    function getRatings($branches)
    {
        $rating = array();

        foreach ($branches as $branch) {
            
            array_push($rating, Review::where('business_id', '=', $branch->bid)->where('confirmed', '=', 1)->avg('rating'));
            
        }

        return $rating;
    }

    function getNumOfReviews($branches){
        $numOfReviews = array();
        foreach ($branches as $branch) {
            $review = Review::where('business_id', '=', $branch->bid)->where('confirmed', '=', 1)->get();
            array_push( $numOfReviews, $review->count() );
        }

        return $numOfReviews;
    }

    function getBusiness($businessSlug)
    {
        $business = Business::whereSlug($businessSlug)->first();     

        return $business;   

    }

    function getBusinessById($id)
    {
        $business = Business::find($id);

        return $business;
    }

    function getRawBranch($name)
    {
        $branch = Branch::join('businesses','businesses.id', '=', 'branches.business_id')
                    ->whereRaw("branches.branchslug = '".$name."'")->first();

        return $branch;
    }

    function getBranchBySlug($slug){
        $branch = Branch::where('branchslug', '=', $slug)->first();
        return $branch;
    }

    function getBranchReviews($branch)
    {
        $reviews = $branch->business->reviews()->withTrashed()->where('confirmed', 1)->orderBy('created_at', 'desc')->get();

        return $reviews;
    }

    function getBranchBlogs($branch)
    {
        $blogs = $branch->business->blogs()->orderBy('created_at', 'desc')->get();

        return $blogs;
    }

    function getBranchCoupons($branch){
        $coupons = $branch->business->coupons()->orderBy('created_at', 'desc')->get();

        return $coupons;
    }

    function getBusinessWithReviews($branch)
    {
        $business = Business::with('branches', 'reviews')->whereSlug($branch->business->slug)->first();

        return $business;
    }

     function getBusinessWithReviewsBySlug($businessSlug)
    {
        $business = Business::with('branches', 'reviews')->whereSlug($businessSlug)->first();   

        return $business;
    }

    function getBusinessBranches($business)
    {
        $branches1 = $business->branches;

        return $branches1;
    }

    function getBusinessBranch($business)
    {
        $branch = $business->branches->first();

        return $branch;
    }

    function getBranchWithBusiness($branchslug)
    {
        $branch = Branch::with('business')->where('branchslug', $branchslug)->first();

        return $branch;
    }

    function explodeAddresses($branch)
    {
        $addresses = $branch->address;
        $addresses = explode("*", $addresses);

        return $addresses;
    }

    function getBusinessCategory($business, $category)
    {
        $business_category =  $business->with(['categories' => function($q){
                    $q->where('category_id', '=', $category);
                }])->first();

        return $business_category;
    }

    function getNotSelectedCategories($categories, $selected_categories){
        $notselected_categories = $categories;

        for($x=1; $x<count($categories); $x++){
            // echo "<hr>";
            for($y=0; $y<count($selected_categories); $y++){
                if( isset($categories[$x]) ){
                    if($categories[$x] === $selected_categories[$y]["name"]){
                        unset($notselected_categories[$x]);
                    }
                }
            }
            
        }

        return $notselected_categories;
    }

    function attachCategory($business, $category_id)
    {
        $success = $business->categories()->attach($category_id);

        return $success;
    }

    function getCoupon($id)
    {
        $coupon = Coupon::find($id);

        return $coupon;
    }

    function deleteBranch($branch)
    {
        $branch->delete();

        return true;
    }

    function getPhotos($branchid)
    {
        $photos = Photogallery::where('branch_id', $branchid)->get();

        return $photos;
    }

    function getRecentlyAddedBusiness(){
        $branches = Branch::orderBy('id', 'DESC')->limit(14)->get();
        return $branches;
    }
}