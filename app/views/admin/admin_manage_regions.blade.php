@extends('admin.layouts.default')

@section('actual-body-content')

	<div class="blog-post block">
		<div class="block-title">
			<h1>Region Management</h1>
		</div>
	</div>

	<div class="comments block">
        <div class="comment-message">
            <div class="comment-message-title"></div>
            <table class="table" id="table-categories">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                    <th><a href="#" class="bs-btn btn-success btn-add-region">Add new</a></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="text" class="cat-input-text" placeholder="Region Name" name="name">
                            <span class="category-name"></span>
                        </td>
                        <td>
                            <a href="#" class="bs-btn btn-info save-category">Save</a> 
                            <a href="#" class="bs-btn btn-danger cancel-category">Cancel</a> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
	</div>
	
@stop