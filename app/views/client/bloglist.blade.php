@extends('client.layouts.default')

@section('actual-body-content')
<div class="content-container container-16">

				<div class="blog block">
					<div class="block-title marginize">
						<h1>Blog</h1>
					</div>
					<div>
						<h3>Coming <span class="text-colorful">Soon...</span></h3>
					</div>
                    @foreach($blogs as $blog)
					<div class="blog-post-preview">
						<div class="blog-post-preview-left">
							<div class="blog-post-date">
								<div class="day">{{ $blog->created_at->format('d') }}</div>
								<div class="month">{{ $blog->created_at->format('F') }}</div>
								<div class="year">{{ $blog->created_at->format('Y') }}</div>
							</div>
						</div>
						<div class="blog-post-preview-right">
							<div class="blog-post-image">
								<img src="{{ ($blog->blogheaderimage == '') ? URL::asset('images/no_photo_available.jpg') : URL::asset($blog->blogheaderimage) }}" class="attachment-post-thumbnail wp-post-image"/>
							</div>
							<div class="blog-post-description clearfix">
								<div class="blog-post-title-comments">
									<a href="#" class="blog-post-comments">0</a>
									<a href="{{ URL::to('blog/'.$blog->slug.'/'.$blog->id) }}" class="blog-post-title">{{ $blog->title }}</a>
								</div>
								<div class="blog-post-excerpt">
                                    <div class="blog-post-image">
                                        {{ Str::limit(html_entity_decode(stripcslashes($blog->body)), 255) }}
                                    </div>
                                </div>
                                <div class="blog-post-links">
								@if(isOwner($blog->business->slug))
									<a href="{{ URL::to('blog/'.$blog->slug.'/delete/'.$blog->id) }}" onclick = "return confirm('Are you sure you want to remove this blog?')" class="read-more-link">Remove Blog</a>
									<a href="{{ URL::to('blog/'.$blog->slug.'/edit/'.$blog->id) }}" class="read-more-link">Edit Blog</a>
								@endif
									<a href="{{ URL::to('blog/'.$blog->slug.'/'.$blog->id) }}" class="read-more-link">Read More</a>
								</div>
							</div>
						</div>
					</div>
                    @endforeach
				</div>
</div>
@stop

@section('sidebar')
	@include('client.partials._sidebar')
@stop