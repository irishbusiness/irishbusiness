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

$handle = imagecreatefrompng( 'templates/template.png' ); 
$brown = ImageColorAllocate ($handle, 84, 48, 26);
$lightBrown = ImageColorAllocate ($handle, 145, 116, 94);
$white = ImageColorAllocate ($handle, 255, 255, 255);
$peach = ImageColorAllocate ($handle, 238, 222, 200);



// Set and get all parameters here....
$backgroundColor = $_GET['bg'];
$companyNameFontSize = ( isset($_GET['companyNameFontSize']) ?  $_GET['companyNameFontSize'] : 10 );

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

$fontSize = "10";
$width = "420";
$textWidth = $fontSize * strlen($siteUrl);
$position_center = $width / 2 - $textWidth / 2.6;
ImageTTFText ($handle, 9, 0, $position_center, 240, $brown, "fonts/GOTHIC.TTF", $siteUrl);

imagealphablending( $handle, false );
imagesavealpha( $handle, true );
ImagePng ($handle);

imagedestroy( $handle );
?>




