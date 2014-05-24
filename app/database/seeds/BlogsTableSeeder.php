<?php

class BlogsTableSeeder extends Seeder {

    public function run()
    {
        Blog::create([
            'title' =>  'Zemiel Title',
            'body'    =>  '<h1>Sample Title</h1><p>Sample Body</p>',
            'author'     =>  'zemiel',
            'business_id'  =>  Business::first()->id,
        ]);
    }

}