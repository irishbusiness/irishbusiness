<?php


	Event::listen('illuminate.query',function($sql){
		var_dump($sql);
	});

	$subscription = User::with('subscription')->find(1)->first();

	dd($subscription->subscription->first());

?>

<h1> hi </h1>