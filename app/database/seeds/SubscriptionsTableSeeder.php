<?php

class SubscriptionsTableSeeder extends Seeder {
    public function run()
    {
        Subscription::create([
			     'name' => 'Premium',
			     'duration' => 'monthly',
			     'currency' => 'USD',
			     'price' => 300,
			     'discounted_price' => 250,
			     'blogs_limit' => 3,
			     'max_location' => 3,
			     'max_categories' => 3,
		]);
    }

}
