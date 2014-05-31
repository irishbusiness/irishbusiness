@extends('client.layouts.default')

@section('actual-body-content')
	<div class="content-wrapper">
		<div class="zone-content equalize zone clearfix">
			<div class="content-container container-16">

				<div class="blog block">
					<div class="block-title">
						<h1>Blog</h1>
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
								<img src="{{ URL::asset('/images/content/'.$blog->blogheaderimage) }}" alt="" />
							</div>
							<div class="blog-post-description clearfix">
								<div class="blog-post-title-comments">
									<a href="#" class="blog-post-comments">0</a>
									<a href="blog-post.html" class="blog-post-title">{{ $blog->title }}</a>
								</div>
								<div class="blog-post-excerpt">
                                    <div class="blog-post-image">
                                        {{ (strlen($blog->body) > 100) ? substr($blog->body,0,100) : stripslashes($blog->body) }}
                                    </div>
                                </div>
                                <div class="blog-post-links">
									<a href="{{ URL::to('blog/'.$blog->id) }}" class="read-more-link">Read More</a>
								</div>
							</div>
						</div>
					</div>
                    @endforeach
<!--					<div class="older-posts">-->
<!--						<input type="submit" class="button-2-colorful" value="Older Entries" />-->
<!--					</div>-->
				</div>
			</div><!-- end of .content-container -->
		</div><!-- end of .zone-content -->
	</div><!-- end of .content-wrapper -->
@stop