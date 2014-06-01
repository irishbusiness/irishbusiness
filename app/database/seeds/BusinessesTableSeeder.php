<?php

class BusinessesTableSeeder extends Seeder {
    public function run()
    {
        Business::create([
            'name'  =>  "Zemiel's Ihaw-ihaw",
            'address'   =>  'panacan, lanang, sasa, rcastillo',
            'keywords'  => 'food, beverages, leisure',
            'locations' => 'philippines, davao city',
            'phone' =>  '09095331440',
            'website'  => 'http://zemiels-ihaw-ihaw.dvo',
            'email' =>  'lourdrivera123@gmail.com',
            'logo'  => 'images/companylogos/sample_company.jpg',
            'business_description'  =>  'This business is established last 1988, where jiriko was born',
            'profile_description'   =>  'We are one of the top ihaw-ihaw restaurants in the city',
            'mon_fri'   =>  '8:00 am - 8:00 pm',
            'sat'   =>  '800 am - 5:00 pm',
            'facebook'  =>  'http://facebook.com/zemiels-ihaw-ihaw',
            'twitter'   =>  'http://twitter.com/zemiels-ihaw-ihaw',
            'google'    =>  'http://google.com/zemiels-ihaw-ihaw',
            'user_id'   =>  User::first()->id
        ]);
    }

}
