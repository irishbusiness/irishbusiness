@extends('admin.layouts.default')

@section('actual-body-content')

	<div class="blog-post block">
		<div class="block-title">
			<h1>Region Management</h1>
		</div>
	</div>

	<div class="comments block">
		<table class="table datatable" id="table-regions">
			<thead>
				<tr>
					<th>Regions</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($regions as $region)
				<tr data-id="{{ $region->id }}">
					<td><span class="region-name">{{ $region->name }}</span></td>
					<td>
						<a href="javascript:void(0)" class="bs-btn btn-info btn-edit-region" data-id="{{$region->id}}">Edit</a>
						<a href="javascript:void(0)" class="bs-btn btn-danger btn-delete-region" data-id="{{$region->id}}">Delete</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
@stop