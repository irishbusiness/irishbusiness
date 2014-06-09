@extends('client.layouts.default')

@section('title')
	<title>404 - Page not found</title>
@stop

@section('actual-body-content')
<div class="content-container container-16">
    <div class="content-wrapper">
        <div class="zone-content equalize zone clearfix">
            <div class="content-container container-16">
                <h2>We tried - we really did - but we can't find the page you're looking for.</h2><br>
                Sorry, the page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
            </div><!-- end of .content-container -->
        </div><!-- end of .zone-content -->
    </div><!-- end of .content-wrapper -->
@stop

@section('sidebar')
	@include('client.partials._sidebar')
@stop