@extends('client.layouts.default')

@section('actual-body-content')
<div class="content-container container-16">
	<div class="content-wrapper">
		<div class="zone-content equalize zone clearfix">
			<div class="content-container container-16">

				<div class="blog-post block">
					<div class="block-title">
						<h1>{{ html_entity_decode(stripcslashes($blog->title)) }}</h1>
					</div>
					@if(!is_null($blog->blogheaderimage))
					<div class="blog-post-image">
						<img src="{{ URL::asset($blog->blogheaderimage) }}" alt="" />
					</div>
					@endif
					<div class="blog-post-subtitle">
						{{ $blog->subtitle }}
					</div>
					<div class="blog-post-body">
                        <div class="blog-post block">
                            <div class="blog-post-image">
                            	{{ html_entity_decode(stripcslashes($blog->body)) }}
                            </div>
                        </div>
					</div>
				</div>

				@if(isOwner($blog->business->slug))
                    <a href="{{ URL::to('blog/'.$blog->slug.'/edit') }}"><input type="button" value="Edit" name="edit" class="button-2-blue"/></a>
                    <a href="{{ URL::to('blog/'.$blog->id.'/delete') }}" onclick = "return confirm('Are you sure you want to remove this blog?')" class="button-2-red paditup">Remove Blog</a>
				@endif
			</div><!-- end of .content-container -->
		</div><!-- end of .zone-content -->
		
	</div><!-- end of .content-wrapper -->
</div>
@stop

@section('sidebar')
	@include('client.partials._sidebar')
@stop