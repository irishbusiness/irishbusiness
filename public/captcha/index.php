<?php
	header ("Content-type: image/png");

	$captcha = $_GET['x']." + ".$_GET['y']." = ?";

	$handle = imagecreatefrompng( 'templates/template1.png' ); 
	$white = ImageColorAllocate ($handle, 255, 255, 255);

	//full name
	ImageTTFText ($handle, 14, 0, 10, 30, $white, "fonts/times/times.ttf", $captcha);


	imagealphablending( $handle, false );
	imagesavealpha( $handle, true );
	ImagePng ($handle);

	imagedestroy( $handle );

?>