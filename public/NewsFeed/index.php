<?php 
	include "helpers.php";
	$helper = new helpers();


	$final_array = array();

	$posts = array();
	$media_array = array();

	try {
		$channel = $_GET['channel'];
		$category = $_GET['category'];
		$sub_category = isset($_GET['sub_category']) ? $_GET['sub_category'] : "";
		$author = "";

		if ( $channel == "gma" ) {
			$_url = "http://www.gmanetwork.com/news/rss/$category/$sub_category";
			$author = "GMA News";
		} else if( $channel == "rappler" ) {
			$_url = "http://feeds.feedburner.com/rappler/$category";
			$author = "Rappler News";
		} else if( $channel == "abc") {
			switch ($_GET['category']) {
				case 'sports':
					$category = '45924';
					break;
				
				case 'entertainment':
					$category = '46800';
					break;

				case 'business':
					$category = '51892';
					break;

				case 'topstories':
					$category = '45910';
					break;

				case 'world':
					$category = '52278';
					break;
			}
			$_url = 'http://www.abc.net.au/news/feed/'.$category.'/rss.xml';
			$author = "ABC News";

		}else if( $channel == "cnn" ){
			$_url = "http://rss.cnn.com/rss/edition_".trim($category).".rss";
		}

		$xml = simplexml_load_file($_url);

		if(!$xml){
			throw new Exception("Error Processing Request", 1);
		}
		$namespaces = $xml->getNamespaces(true); // get namespaces

		$x = count($xml->channel->item);

		if ($channel== "gma") {
			foreach ($xml->channel->item as $news) {
				$url = $helper->clean_str( $news->link );
				$id = $helper->get_id($url, $channel);

				$tmp = array(
					'id' => $helper->generateRandomInt(10),
					'author' => $author,
					'title' => $helper->encode_str( $helper->clean_str( $news->title ) ), 
					// 'title' =>  $helper->encode_str( $news->title ), 
					'url' => $helper->clean_str( $news->link ),
					'description' =>  $helper->clean_str( $news->description ),
					// 'description' =>   $helper->encode_str( $news->description ),
					'date' => $helper->clean_str( $news->pubDate ),
					'thumbnail' => $helper->clean_str( $news->children($namespaces['media'])->content->attributes()->url )
					);
				array_push($final_array, $tmp);
			} 
			echo json_encode($final_array);

		}else if ($channel== "rappler") {
				// die ($helper->pre($xml));

				foreach ($xml->channel->item as $news) {

					$url = $helper->clean_str( $news->link );

					$tmp = array(
						'id' => $helper->generateRandomInt(10),
						'author' => $author,
						'title' => $helper->encode_str( $helper->clean_str( $news->title ) ), 
						'url' => $helper->clean_str( $news->guid ),
						'description' =>  $helper->clean_str( $news->description ),
						'date' => $helper->clean_str( $news->pubDate ),
						);
					array_push($final_array, $tmp);
				}
			echo json_encode($final_array);
		}else if ($channel== "abc") {
			foreach ($xml->channel->item as $news) {
				$url = $helper->clean_str( $news->link );

				// $media = $news->children( $namespaces['media'] );
				// $image =$news->children( $namespaces['media'] )->group->thumbnail;
				// $image_link = json_encode( $image );
				// $image_link = json_decode( $image );

				$tmp = array(
					'id' => $helper->generateRandomInt(10),
					'author' => $author,
					'title' => $helper->encode_str( $helper->clean_str( $news->title ) ), 
					'url' => $helper->clean_str( $news->guid ),
					'description' =>  $helper->clean_str( $news->description ),
					'date' => $helper->clean_str( $news->pubDate ),
					// 'thumbnail' => $helper->clean_str( $media->group->content->attributes()->url )
					'thumbnail' => ''
					);

					array_push($final_array, $tmp);
				// array_push($posts, $tmp);
			}
			echo json_encode($final_array);
			// $final_array["posts"] = $posts;	
			
		
		}elseif ($channel == "cnn") {
			// die($xml);
			foreach ($xml->channel->item as $news) {


					$url = $helper->clean_str( $news->link );

					$tmp = array(
						'id' => $helper->generateRandomInt(10),
						'author' => $author,
						'title' => $helper->encode_str( $helper->clean_str( $news->title ) ), 
						'url' => $helper->clean_str( $news->guid ),
						'description' =>  $helper->clean_str( $news->description ),
						'thumbnail' => '',
						'date' => $helper->clean_str( $news->pubDate ),
						);
					array_push($final_array, $tmp);
				}
			echo json_encode($final_array); 
		}
}catch (Exception $e) {
	//echo 'MALI!';

}


?>