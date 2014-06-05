@extends('sales.layouts.default')

@section('slider')
	@include('sales.partials._slider')
@stop

@section('actual-body-content')
<div class="blog-post block">
        <div class="block-title">
            <h1>Profile</h1>
        </div>
    </div>
	<div class="comments block">
    
    	<div id="personal_info">
    		<span><strong>Email</strong>: </span>
    		<span>{{$salesperson->email}}</span><br>	
    		<span><strong>Name</strong>: </span>
    		<span>{{ucfirst($salesperson->firstname)}} </span>
    		<span>{{ucfirst($salesperson->lastname)}}</span>
    		<br>	
    		<span><strong>Coupon Code</strong>: </span>
    		<span><h1>{{$salesperson->coupon}}</h1></span>
    	</div>

    </div>
@stop

@section('scripts')

@stop