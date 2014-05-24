<?php

class DatabaseSeeder extends Seeder {
    public function run()
    {
        Business::create([
            'name'  =>  'Sample Business',
            'keywords'  => 'office, airplane, house',
            'locations' => 'iraq, iran, new york',
            'phone' =>  '09095331440',
            'website'  => 'novatel',
            'email' =>  'lourdrivera123@gmail.com',
            'mon_fri'   =>  '',
            'sat'   =>  '',
            'facebook'  =>  '',
            'twitter'   =>  '',
            'google'    =>  '',
            'user_id'   =>  1

        ]);
    }

}
