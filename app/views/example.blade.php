@extends('client.layouts.default')
@section('actual-content')
	haha
@stop
@section('scripts')
<script>

	$.getJSON('try', function(data) {
             
             console.log(data);
    }); 
</script>
@stop