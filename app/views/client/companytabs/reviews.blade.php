
		<div class="comments block">
			<div class="review-messages">
				<div id="company-tabs-review" class="company-tabs-content">
					<div class="blog block">
						<div class="block-title">
							<h1>Reviews</h1>
						</div>
						@if(count($reviews)>0)
							<table class="table" id="table-categories">
					            <thead>
					            <tr>
					                <th>Name</th>
					                <th>Comment</th>
					                <th>Action</th>
					            </tr>
					            </thead>
					            <tbody>

					            @if(isset($reviews) && !is_null($reviews))
					            @foreach($reviews as $review)
					            	<tr>
					            	<td>{{ $review->name }}</td>
					            	<td>{{ html_entity_decode(stripcslashes($review->description)) }}</td>
					            	<td>
					            		<a href="javascript:void(0)" class="bs-btn btn-info btn-edit-category" onclick="actionReview($(this))" data-id="{{ $review->id }}">Approve</a>
					            	</td>
					            	</tr>
					            @endforeach
					            @endif
					            </tbody>
					        </table>
						@else

						@endif
					</div>
				</div>
			</div>
		</div>   