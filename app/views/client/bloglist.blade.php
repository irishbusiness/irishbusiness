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
								<div class="day">10</div>
								<div class="month">April</div>
								<div class="year">2013</div>
							</div>
						</div>
						<div class="blog-post-preview-right">
							<div class="blog-post-image">
								<img src="images/content/sunglasses.jpg" alt="" />
							</div>
							<div class="blog-post-description clearfix">
								<div class="blog-post-title-comments">
									<a href="#" class="blog-post-comments">0</a>
									<a href="blog-post.html" class="blog-post-title">{{ $blog->title }}</a>
								</div>
								<div class="blog-post-excerpt">{{ (strlen($blog->body) > 100) ? substr($blog->body,0,100) : stripslashes($blog->body) }}</div>
								<div class="blog-post-links">
									<a href="{{ URL::to('blog/'.$blog->id) }}" class="read-more-link">Read More</a>
									<div class="blog-post-author text-colorful">Admin</div>
									<div class="blog-post-category text-colorful">Uncategorized</div>
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