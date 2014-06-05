@extends("client.layouts.default")
@section("title")
	<title>Admin - Manage Commission</title>
@stop
@section("actual-body-content")
	<div class="blog-post block">
		<div class="block-title">
			<h1>Commission Management</h1>
		</div>
	</div>

	<div class="comments block">						
		<div class="comment-message">
			<div class="comment-message-title"></div>
			<table class="table" id="table-categories">
				<thead>
					<tr>
						<th>Type</th>
						<th>Commission</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($commissions))
						@foreach($commissions as $commission)
						<tr data-id="{{ $commission->id }}">
							<td><span class="commission-type">{{ ucwords($commission->type) }}</span></td>
							<td data-id="td-editable{{ $commission->id }}"><span class="commission">{{ $commission->commission }}</span></td>
							<td>
								<a href="javascript:void(0)" class="bs-btn btn-info btn-edit-commission" data-id="{{$commission->id}}">Edit</a>
							</td>
						</tr>
						@endforeach
					@else
					@endif
				</tbody>
			</table>
		</div>

	</div>
@stop