<div id="company-tabs-blog" class="company-tabs-content">
	<div class="blog block">
		@if(Auth::user()->check())
		<a href="{{ URL::to('/blog/add') }}" class="a-btn button-2-colorful add-coupon">Add new blog</a><br>
        @endif
		@if(count($blogs)>0)
			@foreach($blogs as $blog)
				<div class="blog-post-preview">
					<div class="blog-post-preview-left">
						<div class="blog-post-date">
							<div class="day">{{ date("d",strtotime($blog->created_at)) }}</div>
							<div class="month">{{ date("F",strtotime($blog->created_at)) }}</div>
							<div class="year">{{ date("Y",strtotime($blog->created_at)) }}</div>
						</div>
					</div>
					<div class="blog-post-preview-right">
						<div class="blog-post-image">
							<img src="{{ URL::asset($blog->blogheaderimage) }}" alt="" />
						</div>
						<div class="blog-post-description clearfix">
							<div class="blog-post-title-comments">
								<a href="{{ URL::to('blog/'.$blog->slug) }}" class="blog-post-title">{{ html_entity_decode(stripcslashes($blog->title)) }}</a>
							</div>
							<div class="blog-post-excerpt">{{ Str::limit(html_entity_decode(stripcslashes($blog->body)), 255) }}</div>
							<div class="blog-post-links">
							@if(isOwner($blog->business->slug))
								<a href="{{ URL::to('blog/'.$blog->id.'/delete') }}" onclick = "return confirm('Are you sure you want to remove this blog?')" class="read-more-link">Remove Blog</a>
								<a href="{{ URL::to('blog/'.$blog->slug.'/edit') }}" class="read-more-link">Edit Blog</a>
							@endif
								<a href="{{ URL::to('blog/'.$blog->slug) }}" class="read-more-link">Read More</a>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		@else

		@endif
	</div>
</div>