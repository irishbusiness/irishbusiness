<?php

use IrishBusiness\Repositories\AdminBlogRepository;

class AdminBlogController extends \BaseController {

    protected $blog;

    function __construct(AdminBlogRepository $blog) {
        $this->blog = $blog;
        $this->beforeFilter('csrf', ['on' => 'post']);
    }

    public function show($slug, $id)
    {
        // $blog = $this->blog->getBlog($id);
        $blog = $this->blog->getBlogById($id);

        return View::make('client.blogpost', compact('blog'));
    }

    public function edit($slug, $id)
    {
         $blog = $this->blog->getBlogById($id);

        return View::make('client.editblogpost', compact('blog'))->with("title", "Client - Edit Blog");
    }

    public function destroy($slug, $id)
    {
        $blog = $this->blog->getBlogById($id);
        $blog->delete();
        return Redirect::back();
    }

    public function index()
    {
        $blogs = $this->blog->getAll();

        return View::make('client.bloglist', compact('blogs'))->with("title", "Blogs");
    }

    public function create()
    {
        return View::make('admin.admin_manage_blog')->with("title", "Admin - Manage Blogs");
    }

    public function add()
    {
        return View::make('client.companytabs.addblog')->with('title', 'Add Blog');
    }

    public function manageblog()
    {
        $blogs = $this->blog->getAll();

        return View::make('admin.admin_manage_blog')->with('blogs', $blogs)->with('title', 'Admin - Manage Blogs');
    }

    public function store()
    {
        if( !isAdmin() ){
            $blog = $this->blog->create(Input::all());
        }else{
            $blog = $this->blog->createAdminBlog(Input::all());
        }

        return Redirect::to(Auth::user()->user()->business->branches()->first()->branchslug.'/blog/'.$blog->slug.'#company-tabs-blog');
    }

    public function update($id)
    {
        $blog = $this->blog->update($id, Input::all());
        $business_id = $blog->business_id;
        $branch = Branch::whereBusiness_id($business_id)->first();

        return Redirect::to($branch->branchslug.'/blog/'.$blog->slug.'#company-tabs-blog');
    }

    public function blogAjax(){
        if(Request::ajax())
        {
          $id = Input::get('id');
          $blog =   $this->getDecodedBlogById($id);
          
          return $blog;
        }
    }

}