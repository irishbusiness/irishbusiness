<?php

class BlogController extends \BaseController {

    public function store()
    {
           $blog = new Blog;
           $blog->title = Input::get('title');
           $blog->subtitle = Input::get('subtitle');
           $blog->body = Input::get('content');
           $blog->save();

          return stripslashes(Input::get('content'));
    }

}