<?php namespace IrishBusiness\Repositories;

use Blog;
use Auth;
use Branch;

class BlogRepository {

	function getBlog($id)
	{
        $blog = Blog::where('slug', '=', $id)->first();

		return $blog;
	}
	
	function getBlogById($id)
	{
        $blog = Blog::findOrFail($id);

		return $blog;
	}

    function getBlogBySlug($slug){
        $blog = Blog::whereSlug($slug)->first();

        return $blog;
    }

	function getAll()
	{
        $blogs = Blog::orderBy('created_at', 'desc')->get();

		return $blogs;
	}

    function getAllAdminBlog(){
        $blogs = Blog::where('isAdmin', '1')->orderBy('created_at', 'desc')->get();
        return $blogs;
    }

	function create($input)
	{
        $blog = new Blog;
        $blog->title = $input['title'];
        $blog->body = $input['content'];
        
        $blog->business_id  =  Auth::user()->user()->business->id;

        // files storage folder
        $dir = public_path().'/images/blog/';
        if($input['blogurl'] == null){
            $title = stripcslashes(strtolower($input['title']));
            $tempSlug = trim(preg_replace("/[\']/", "", $title));
            $blog->slug = strtolower(preg_replace("/[\s_\']/", "-", $tempSlug));
        } else {
            $blog->slug = strtolower($input['blogurl']);
        }

        //check if the file isset
        if( !is_null($input['blogheaderimage']))
        {
            $image  =   $input['blogheaderimage'];
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
            $blog->blogheaderimage  =   '';
        }

        $blog->save();

        return $blog;
	}

	function update($id, $input)
	{
		// files storage folder
        $dir = public_path().'/images/blog/';
        // if( Input::hasFile('blogheaderimage') ){
        //     $image = Input::file('blogheaderimage');
        // }else{
        //     $image = "";
        // }

        $blog = Blog::findOrFail($id);
        $blog->title = $input['title'];
        $blog->body = $input['content'];
        $blog->facebook = isset($input['facebook']) ? $input['facebook'] : '';
        $blog->google = isset($input['google']) ? $input['google'] : '';
        $blog->twitter = isset($input['twitter']) ? $input['twitter'] : '';
        $blog->linkedin = isset($input['linkedin']) ? $input['linkedin'] : '';
        if( !isAdmin() ){ 
            $blog->business_id  =   Auth::user()->user()->business->id;
        }
        // $blog->business_id = 2;

        if($input['blogurl'] == null){
            $title = stripcslashes(strtolower($input['title']));
            $tempSlug = trim(preg_replace("/[\']/", "", $title));
            $blog->slug = strtolower(preg_replace("/[\s_\']/", "-", $tempSlug));
        } else {
            $blog->slug = strtolower($input['blogurl']);
        }

        //check if the file isset
        if( isset( $input['blogheaderimageedit'] ) )
        {
            $image  =   $input['blogheaderimageedit'];
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

        return $blog;
	}

	function getDecodedBlogById($id)
	{
        $blog = Blog::findOrFail($id);

        $blog->body = html_entity_decode(stripcslashes($blog->body));

        return $blog;
	}

    function getBranchByBlogId($id){
       $blog = Blog::findOrFail($id);
       $branch = Branch::where('business_id', '=', $blog->business_id)->first();

       return $branch;
    }
}