@extends('client.layouts.default')

@section('actual-body-content')
	<div class="content-wrapper">
		<div class="zone-content equalize zone clearfix">
			<div class="content-container container-16">

				<div class="blog-post block">
					<div class="block-title">
                        {{ Form::open(['method' => 'DELETE', 'action' => ['BlogController@destroy', $blog->id]]) }}
                        {{ HTML::link('blog/'.$blog->id.'/edit', 'edit', ['class'=>'button-2-colorful']) }}
                        {{ Form::submit('Delete', ['class' => 'button-2-colorful', 'onclick' => 'return confirm("Are you sure you want to delete this blog?")'])}}
                        {{ Form::close() }}
                        <br><br>
						<h1>{{ $blog->title }}</h1>
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
					             {{ stripslashes($blog->body) }}
                            </div>
                        </div>
					</div>
					<div class="blog-post-info">
						<div class="social-links">
							<a href="http://www.facebook.com">
								<img src="{{ URL::asset('images/facebook-icon.png') }}" alt=""/>
							</a>
							<a href="http://www.google.com">
								<img src="{{ URL::asset('images/google-icon.png') }}" alt="" />
							</a>
							<a href="http://www.twitter.com">
								<img src="{{ URL::asset('images/twitter-icon.png') }}" alt="" />
							</a>
							<a href="http://www.linkedin.com">
								<img src="{{ URL::asset('images/linkedin-icon.png') }}" alt="" />
							</a>
							<a href="http://www.pinterest.com">
								<img src="{{ URL::asset('images/pinterest-icon.png') }}" alt="" />
							</a>
							<a href="http://www.dribbble.com">
								<img src="{{ URL::asset('images/dribbble-icon.png') }}" alt="" />
							</a>
						</div>
						<div class="blog-post-author text-colorful">{{ $blog->author }}</div>
						<div class="blog-post-category text-colorful">Uncategorized</div>
					</div>
				</div>

				<div class="comments block">
					<div class="block-title">
						<h3>2 comments</h3>
					</div>
					<div class="comments-tree">
						<div class="comment">
							<div class="user-picture">
								<img src="{{ URL::asset('images/content/crayons.png') }}" alt="" />
							</div>
							<div class="comment-body">
								<div class="comment-author">
									<span class="author">Admin</span> - <span class="date">April 10, 2013 at 7:34 pm</span> - <a href="#" class="reply-link text-colorful">Reply</a>
								</div>
								<div class="comment-text">
									Phasellus congue lacus eget neque. Phasellus ornare, ante vitae consectetuer consequat, purus sapien ultricies dolor, et mollis pede metus eget nisi.
								</div>
							</div>
						</div>
						<div class="comment reply">
							<div class="user-picture">
								<img src=" {{ URL::asset('images/content/crayons.png') }}" alt="" />
							</div>
							<div class="comment-body">
								<div class="comment-author">
									<span class="author">Admin</span> - <span class="date">April 10, 2013 at 7:34 pm</span> - <a href="#" class="reply-link text-colorful">Reply</a>
								</div>
								<div class="comment-text">
									Phasellus congue lacus eget neque. Phasellus ornare, ante vitae consectetuer consequat, purus sapien ultricies dolor, et mollis pede metus eget nisi.
								</div>
							</div>
						</div>
					</div>
					<div class="comment-message">
						<div class="comment-message-title">
							Leave a <span class="text-colorful">Comment</span>
						</div>
						<form class="comment-message-form">
							<input type="text" class="text-input-grey name" placeholder="Name *" />
							<input type="text" class="text-input-grey email" placeholder="Email *" />
							<input type="text" class="text-input-grey website" placeholder="Website" />
							<textarea class="text-input-grey comment-message-main" placeholder="Your Comments Here"></textarea>
							<input type="submit" class="button-2-colorful" value="Post Comment" name="comment" />
						</form>
					</div>
				</div>

			</div><!-- end of .content-container -->


		</div><!-- end of .zone-content -->
		
	</div><!-- end of .content-wrapper -->
@stop