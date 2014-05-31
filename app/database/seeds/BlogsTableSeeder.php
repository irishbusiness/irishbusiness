<?php

class BlogsTableSeeder extends Seeder {

    public function run()
    {
        Blog::create([
            'title' =>  'Zemiel Title',
            'blogheaderimage'   => 'images/blog/COMING-SOON.jpg',
            'body'    =>  '<h1>Sample Title</h1><p>Sample Body</p>',
            'facebook' => 'http://facebook.com/parokniedgar',
            'google' => 'http://google.com/parokniedgar',
            'twitter' => 'http://twitter.com/parokniedgar',
            'linkedin' => 'http://linkedin.com/parokniedgar',
            'business_id'  =>  Business::first()->id,
        ]);
    }

}