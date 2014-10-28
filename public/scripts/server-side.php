<?php
header ("Content-type: image/png");
$companyName = $_GET["companyName"];
$companySlogan = $_GET["companySlogan"];
$fullName = $_GET["fullName"];
$jobTitle = $_GET["jobTitle"];
$businessAddress = $_GET["businessAddress"];
$businessAddress = str_replace("\\n","\n",$businessAddress);
$businessAddress = str_replace("\\","",$businessAddress);
$phoneOne = $_GET["phoneOne"];
$phoneTwo = $_GET["phoneTwo"];
$emailAddress = $_GET["emailAddress"];
$siteUrl = $_GET["siteUrl"];
$template = $_GET['template'];

if( $template == 1 ){
    $template_name = 'template';
}else if( $template == 2 ){
    $template_name = 'template1';
}

$handle = imagecreatefrompng( 'templates/'.$template_name.'.png' ); 
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
	ImageTTFText ($handle, $companyName_FontSize, 0, 20, 35, $brown, "fonts/timesbd.ttf", $companyName);
	//company slogan
	ImageTTFText ($handle, $companySlogan_FontSize, 0, 20, 50, $lightBrown, "fonts/GOTHIC.TTF", $companySlogan);
	//full name
	ImageTTFText ($handle, $fullName_FontSize, 0, 20, 110, $white, "fonts/times.ttf", $fullName);
	//job title
	ImageTTFText ($handle, $companySlogan_FontSize, 0, 19, 122, $peach, "fonts/GOTHIC.TTF", $jobTitle);
	//business address
	ImageTTFText ($handle, $businessAddress_FontSize, 0, 20, 160, $brown, "fonts/GOTHIC.TTF", $businessAddress);
	//phone number #1
	ImageTTFText ($handle, 9, 0, 317, 160, $brown, "fonts/GOTHIC.TTF", $phoneOne); 
	//phone number #2
	ImageTTFText ($handle, 9, 0, 317, 175, $brown, "fonts/GOTHIC.TTF", $phoneTwo);
	//email address
	ImageTTFText ($handle, 9, 0, 275, 190, $brown, "fonts/GOTHIC.TTF", $emailAddress);

	//site url (exmple of how to center copy)

	$fontSize = "10";
	$width = "420";
	$textWidth = $fontSize * strlen($siteUrl);
	$position_center = $width / 2 - $textWidth / 2.6;
	ImageTTFText ($handle, 9, 0, $position_center, 240, $brown, "fonts/GOTHIC.TTF", $siteUrl);
}else if( $template == 2 ){

	$companyName_FontSize = 40;
	$companySlogan_FontSize = 9;
	$fullName_FontSize = 14;

	$fontStyle = "fonts/GOTHIC.ttf";

	//company name
	ImageTTFText ($handle, $companyName_FontSize, 0, 40, 100, $white, $fontStyle, $companyName);
	//full name
	ImageTTFText ($handle, $fullName_FontSize, 0, 40, 140, $white, $fontStyle, $fullName);
	//job title
	ImageTTFText ($handle, $companySlogan_FontSize, 0, 40, 300, $white, $fontStyle, $companySlogan);
}


imagealphablending( $handle, false );
imagesavealpha( $handle, true );
ImagePng ($handle);

imagedestroy( $handle );

?>

