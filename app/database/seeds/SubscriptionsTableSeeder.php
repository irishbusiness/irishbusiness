<?php

class SubscriptionsTableSeeder extends Seeder {
    public function run()
    {
        Subscription::create([
			     'name' => 'Premium',
			     'price' => 300,
			     'duration' => 'monthly',
			     'blogs_limit' => 3,
			     'max_location' => 3,
			     'max_categories' => 3,
		]);
    }

}
