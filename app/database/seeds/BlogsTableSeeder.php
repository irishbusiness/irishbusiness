<?php

class BlogsTableSeeder extends Seeder {

    public function run()
    {
        Blog::create([
            'title' =>  'Zemiel Title',
            'blogheaderimage'   => 'images/2c651c1d7d13e007931855fa4a6c963b.jpg',
            'body'    =>  '<h1>Sample Title</h1><p>Sample Body</p>',
            'author'     =>  'zemiel',
            'business_id'  =>  Business::first()->id,
        ]);
    }

}