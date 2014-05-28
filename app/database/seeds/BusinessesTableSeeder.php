<?php

class BusinessesTableSeeder extends Seeder {
    public function run()
    {
        Business::create([
            'name'  =>  'Sample Business',
            'address'   =>  'galway, ireland',
            'keywords'  => 'office, airplane, house',
            'locations' => 'iraq, iran, new york',
            'phone' =>  '09095331440',
            'website'  => 'novatel.com',
            'email' =>  'lourdrivera123@gmail.com',
            'mon_fri'   =>  '9am - 5pm',
            'sat'   =>  '10am - 5pm',
            'facebook'  =>  '',
            'twitter'   =>  '',
            'google'    =>  '',
            'user_id'   =>  User::first()->id

        ]);
    }

}
