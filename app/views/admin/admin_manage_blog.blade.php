@extends('admin.layouts.default')


@section('actual-body-content')
        <div class="blog-post block">
            <div class="block-title">
                <h1>Blog Settings</h1>
            </div>
        </div>

        <!-- Add blog Form -->
            @include('client.companytabs.addblog')
        

        <!-- Edit Blog form -->
            @include('client.companytabs.editblog')

        <table class="table" id="table-categories">
            <thead>
            <tr>
                <th>Title</th>
                <th>Action</th>
                <th><a href="#company-tabs-blog" class="bs-btn btn-success btn-add-blog">Add new</a></th>
            </tr>
            </thead>
            <tbody>

            @if(isset($blogs) && !is_null($blogs))
            @foreach($blogs as $blog)
            <tr data-id="{{ $blog->id }}">
                <td><a href="blog/{{ $blog->id }}"><span class="category-name">{{ stripcslashes($blog->title) }}</span></a></td>
                <td>
                    <a href="javascript:void(0)" class="bs-btn btn-info btn-edit-category" onclick="editBlog($(this))" data-id="{{ $blog->id }}">Edit</a>
                    <a href="javascript:void(0)" class="bs-btn btn-danger btn-delete-blog" data-title="{{ stripcslashes($blog->title) }}" data-id="{{ $blog->id }}">Delete</a>
                </td>
            </tr>
            @endforeach
            @endif
            </tbody>
        </table>
@stop


