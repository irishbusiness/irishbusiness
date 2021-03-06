@extends('admin.layouts.default')

@section('actual-body-content')

	<div class="blog-post block">
		<div class="block-title">
			<h1>Category Management</h1>
		</div>
	</div>

	<div class="comments block">						
		<div class="comment-message">
			<div class="comment-message-title"></div>
			<table class="table datatable" id="table-categories">
				<thead>
					<tr>
						<th>Name</th>
						<th>Action</th>
						<th><a href="#" class="bs-btn btn-success btn-add-category">Add new</a></th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $category)
					<tr data-id="{{ $category->id }}">
						<td><span class="category-name">{{ $category->name }}</span></td>
						<td>
							<a href="javascript:void(0)" class="bs-btn btn-info btn-edit-category" onclick="editCategory($(this))" data-id="{{$category->id}}">Edit</a>
							<a href="javascript:void(0)" class="bs-btn btn-danger btn-delete-category" data-id="{{$category->id}}">Delete</a>
						</td>
						<td></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

	</div>

@stop