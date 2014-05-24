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

    public function show($id)
    {
        $blog = Blog::find($id);
        return View::make('client.blogpost');
//        return $id;
    }

    public function bloglist(){
        $blogs = Blog::all();
        return View::make('client.bloglist', compact('blogs'));
    }
}