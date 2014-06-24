<?php

class SubscriptionsTableSeeder extends Seeder {
    public function run()
    {
        Subscription::create([
			     'name' => 'Premium',
			     'duration' => 'monthly',
			     'currency' => 'EUR',
			     'price' => 499,
			     'discounted_price' => 419,
			     'st_discounted_price' => 199,
			     'blogs_limit' => 3,
			     'max_location' => 3,
			     'max_categories' => 3,
		]);
    }

}
