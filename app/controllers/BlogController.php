<?php

class BlogController extends \BaseController {

    public function __contruct() {

    }
    public function show($id)
    {
        $blog = Blog::find($id);
        return View::make('client.blogpost', compact('blog'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return View::make('admin.editblogpost', compact('blog'));
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return Redirect::to('/blog');
    }

    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        return View::make('client.bloglist', compact('blogs'));
    }

    public function create()
    {
        return View::make('admin.admin_manage_blog');
    }

    public function store()
    {
        // files storage folder
        $dir = public_path().'/images/blog/';

        $blog = new Blog;
        $blog->title = Input::get('title');
        $blog->body = Input::get('content');
        $blog->facebook = Input::get('facebook');
        $blog->google = Input::get('google');
        $blog->twitter = Input::get('twitter');
        $blog->linkedin = Input::get('linkedin');
        // $blog->business_id  =   Auth::user()->user()->business->id;
        $blog->business_id = 2;

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
                $blog->blogheaderimage  =   'images/blog/'.$imagename;
            } else {
                $blog->blogheaderimage  =   'images/blog/'.$imagename;
            }

        } else {
            $blog->blogheaderimage  =   'images/blog/COMING-SOON.jpg';
        }

        $blog->save();

//        return stripslashes(Input::get('content'));
        return Redirect::to('/blog/'.$blog->id);
    }

    public function update($id)
    {
        // files storage folder
        $dir = public_path().'/images/blog/';
        $image = Input::file('blogheaderimage');

        $blog = Blog::findOrFail($id);
        $blog->title = Input::get('title');
        $blog->body = Input::get('content');
        $blog->facebook = Input::get('facebook');
        $blog->google = Input::get('google');
        $blog->twitter = Input::get('twitter');
        $blog->linkedin = Input::get('linkedin');
        // $blog->business_id  =   Auth::user()->user()->business->id;
        $blog->business_id = 2;

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
                // unlink(public_path().'/'.$blog->blogheaderimage);

                $blog->blogheaderimage  =   'images/blog/'.$imagename;
            } else {
                $blog->blogheaderimage  =   'images/blog/'.$imagename;
            }

        }

        $blog->save();

//        return stripslashes(Input::get('content'));
        return Redirect::to('/blog/'.$blog->id);
    }

    public function yeah(){
        if(Request::ajax())
        {
          $id = Input::get('id');
          $blog =   Blog::findOrFail($id);
          return $blog;
        }
    }
}