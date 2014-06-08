<?php 
	$companyName = $_POST["companyName"];
	$companySlogan = $_POST["companySlogan"];
	$fullName = $_POST["fullName"];
	$jobTitle = $_POST["jobTitle"];
	$businessAddress = $_POST["businessAddress"];
	$businessAddress = str_replace("\\n","\n",$businessAddress);
	$businessAddress = str_replace("\\","",$businessAddress);
	$phoneOne = $_POST["phoneOne"];
	$phoneTwo = $_POST["phoneTwo"];
	$emailAddress = $_POST["emailAddress"];
	$siteUrl = $_POST["siteUrl"];


	$handle = imagecreatefrompng( 'templates/template1.png' ); 
	$brown = ImageColorAllocate ($handle, 84, 48, 26);
	$lightBrown = ImageColorAllocate ($handle, 145, 116, 94);
	$white = ImageColorAllocate ($handle, 255, 255, 255);
	$peach = ImageColorAllocate ($handle, 238, 222, 200);

	//company name
	ImageTTFText ($handle, 18, 0, 20, 35, $brown, "fonts/timesbd.ttf", $companyName);

	//company slogan
	ImageTTFText ($handle, 9, 0, 20, 50, $lightBrown, "fonts/GOTHIC.TTF", $companySlogan);

	//full name
	ImageTTFText ($handle, 14, 0, 20, 110, $white, "fonts/times.ttf", $fullName);

	//job title
	ImageTTFText ($handle, 9, 0, 19, 122, $peach, "fonts/GOTHIC.TTF", $jobTitle);

	//business address
	ImageTTFText ($handle, 10, 0, 20, 160, $brown, "fonts/GOTHIC.TTF", $businessAddress);

	//phone number #1
	ImageTTFText ($handle, 9, 0, 317, 160, $brown, "fonts/GOTHIC.TTF", $phoneOne); 

	//phone number #2
	ImageTTFText ($handle, 9, 0, 317, 175, $brown, "fonts/GOTHIC.TTF", $phoneTwo);

	//email address
	ImageTTFText ($handle, 9, 0, 275, 190, $brown, "fonts/GOTHIC.TTF", $emailAddress);

	//site url (exmple of how to center copy)
	$fontSize = "12";
	$width = "420";
	$textWidth = $fontSize * strlen($siteUrl);
	$position_center = $width / 2 - $textWidth / 2.6;
	ImageTTFText ($handle, $fontSize, 0, $position_center, 240, $brown, "fonts/GOTHICB.TTF", $siteUrl);

	imagealphablending( $handle, false );
	imagesavealpha( $handle, true );
	ImagePng ($handle);

	$temp_name = md5(date('l jS \of F Y H:i:s'));
	if(ImagePng($handle, "../images/coupons/temp/$temp_name.png")){
		imagedestroy( $handle );

		return "Your coupon has been saved.";
	}

	imagedestroy( $handle );
	return "Sorry, we can't save your coupon right now.";

	
?>