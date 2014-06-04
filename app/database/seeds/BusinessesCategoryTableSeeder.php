<?php

class BusinessesCategoryTableSeeder extends Seeder {
    public function run()
    {
    	$business = Business::findOrFail(1);
    	$business->categories()->attach(1);
    	$business->categories()->attach(2);
    }

}
