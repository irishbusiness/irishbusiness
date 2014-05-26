<?php

class BlogController extends \BaseController {

    public function store()
    {
        // files storage folder
        $dir = public_path().'/images/';
        $image = Input::file('blogheaderimage');
        $author =   'Static Author';
        $business_id    =  1;

        $blog = new Blog;
        $blog->title = Input::get('title');
        $blog->body = Input::get('content');
        $blog->business_id  =   $business_id;
        $blog->author  =   $author;

        //check if the file isset
        if( Input::hasFile('blogheaderimage'))
        {
            $image  =   Input::file('blogheaderimage');
            $imagename = md5(date('YmdHis')).'.jpg';
            $filename = $dir.$imagename;

            if ($image->getMimeType() == 'image/png'
                || $image->getMimeType() == 'image/jpg'
                || $image->getMimeType() == 'image/gif'
                || $image->getMimeType() == 'image/jpeg'
                || $image->getMimeType() == 'image/pjpeg')
            {
                $image->move($dir, $filename);
                $blog->blogheaderimage  =   'images/'.$imagename;
            } else {
                $blog->blogheaderimage  =   'images/'.$imagename;
            }

        } else {
            $blog->blogheaderimage  =   'images/2c651c1d7d13e007931855fa4a6c963b.jpg';
        }

        $blog->save();

        return stripslashes(Input::get('content'));
    }

    public function show($id)
    {
        $blog = Blog::find($id);
        return View::make('client.blogpost', compact('blog'));
//        return $id;
    }

    public function bloglist(){
        $blogs = Blog::all();
        return View::make('client.bloglist', compact('blogs'));
    }
}