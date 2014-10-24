<?php 
	include "helpers.php";
	$helper = new helpers();

	$data = file_get_contents("http://www.gmanetwork.com/news/story/383394/sports/running/pistorius-should-get-house-arrest-community-service-social-worker-says");
	// $c='<p>test<font>two</p>';
    $dom = new DOMDocument('1.0', 'UTF-8');

	$n=$dom->appendChild($dom->createElement('info')); // make a root element

	if( $valueXml= $helper->tryToXml($dom,$data) ) {
	  $n->appendChild($valueXml);


	}
	print_r( $n );
?>