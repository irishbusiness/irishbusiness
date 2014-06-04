<?php

class SocialMediaTableSeeder extends Seeder {

    public function run()
    {
        SocialMedia::create([
            'facebook' => 'http://facebook.com/irishbusiness',
            'google' => '',
            'twitter'   =>  '',
            'linkedin'  => '',
            'pinterest' =>  '',
            'dribbble'  =>  '',
        ]);
    }

}
