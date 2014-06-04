@extends('client.layouts.default')

@section('actual-body-content')
	<div class="content-wrapper">
		<div class="zone-content equalize zone clearfix">
			<div class="content-container container-16">

				<div class="blog-post block">
					<div class="block-title">
						<h1>{{ html_entity_decode(stripcslashes($blog->title)) }}</h1>
					</div>
					<div class="blog-post-image">
						<img src="{{ URL::asset($blog->blogheaderimage) }}" alt="" />
					</div>
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
			</div><!-- end of .content-container -->
		</div><!-- end of .zone-content -->
		
	</div><!-- end of .content-wrapper -->
@stop