<?php

class SocialMediaTableSeeder extends Seeder {

    public function run()
    {
        SocialMedia::create([
            'facebook' => 'http://facebook.com',
            'google' => 'http://google.com',
            'twitter'   =>  'http://twitter.com',
            'linkedin'  => 'http://linkedin.com',
            'pinterest' =>  'http://pinterest.com',
            'dribbble'  =>  'http://dribble.com',
        ]);
    }

}
