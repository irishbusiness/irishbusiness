<?php

class SubscriptionsTableSeeder extends Seeder {
    public function run()
    {
        Subscription::create(['Premium', 300, 'monthly', 3, 3, 3, 0]);
    }

}
