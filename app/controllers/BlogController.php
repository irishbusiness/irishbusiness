<?php

class BlogController extends \BaseController {

    public function store()
    {
           $blog = new Blog;
           $blog->title = Input::get('title');
           $blog->body = Input::get('content');
           $blog->save();

          return stripslashes(Input::get('content'));
    }

}