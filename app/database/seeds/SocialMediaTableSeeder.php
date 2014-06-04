<?php

class SocialMediaTableSeeder extends Seeder {

    public function run()
    {
        SocialMedia::create([
            'facebook' => '',
            'google' => '',
            'twitter'   =>  '',
            'linkedin'  => '',
            'pinterest' =>  '',
            'dribbble'  =>  '',
        ]);
    }

}
