@extends('admin.layouts.default')

@section('actual-body-content')

		<div class="blog-post block">
		<div class="block-title">
			<h1>Manage Payment Gateway</h1>
		</div>
	
		</div>

		<div class="comments block">						
		<div class="comment-message">
			<form class="comment-message-form">
				<select class="text-input-grey full">
						<option value="volvo">Use Paypal</option>
						<option value="saab">Use Stripe</option>
				</select> 
				<input type="text" class="text-input-grey full" placeholder="Email Address" />
				<input type="text" class="text-input-grey full" placeholder="Currency" />
				<input type="text" class="text-input-grey full" placeholder="Tax Percentage" />
				<input type="text" class="text-input-grey full" placeholder="Tax Label" />
				<input type="text" class="text-input-grey full" placeholder="Base Cost" />
				<input type="text" class="text-input-grey full" placeholder="Additional Address Cost" />
				<input type="text" class="text-input-grey full" placeholder="Discount" />
				<div class="thin-separator"></div>													
				<input type="submit" class="button-2-colorful" value="Save" name="comment" />

			</form>
		</div>

	</div>

@stop