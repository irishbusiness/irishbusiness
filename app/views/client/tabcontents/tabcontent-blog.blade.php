<div id="company-tabs-blog" class="company-tabs-content">
	<div class="blog block">
		@if(Auth::user()->check())
		<a id="add_new_blog" class="a-btn button-2-colorful add-coupon">Add new blog</a><br>
        <div class="content-container" id="add_blog_block" style="display:none">
		    <div class="blog-post block">
		        <div class="block-title marginize">
		            <h1>Add Blog</h1>
		        </div>

		    </div>

		    <div class="comments block">
		        <div class="comment-message">
		                {{ Form::open([ 'method' => 'post', 'action' => 'BlogController@store', 'files' => true]) }}
		                
		                <div class="form-group">
		                    {{ Form::label('title', "Blog Title", ["class"=> "text-colorful"]) }}<br>
		                    {{ Form::text('title', '', ['class' => 'text-input-grey', 'placeholder' => 'Title', 'id' => 'addTitle', 'required' => 'required']) }}
		                    <br><br>
		                </div>
		                
		                <div class="form-group">
		                    {{ Form::label('blogheaderimage', "Blog Header", ["class"=> "text-colorful"]) }}<br>
		                    {{ Form::file('blogheaderimage', ["id"=>"btn-blog-settings-logo"]) }}
		                    <div class="render-blogheader-logo-preview">
		                        <img src="{{ URL::asset('/images/image-not-available.png') }}" id="img-render-blogheaderimage">
		                    </div>
		                </div>
		                
		                <div class="form-group">
		                    {{ Form::hidden('blogurl','', [
		                    "placeholder" => "your-blog-name ( Optional ) : Skip if you don't know this", "class"=>"text-input-grey full", 'id' => 'addblogurl']) }}
		                </div>
		                
		                <div class="form-group">
		                    {{ Form::label('content', 'Content', ["class"=> "text-colorful"]) }}
		                    {{ Form::textarea('content', '', ['id' => 'redactor1']) }}
		                </div>

		                <div class="form-group"><input id="addBlogButton" type="submit" value="Save" name="send" class="button-2-colorful"/>
		                    <input type="button" id="cancel_add_blog" class="button-2-red" value="Cancel"/>
		                    {{ Form::close() }}
		                </div>
		            </div>
		       

		    </div>
		</div>
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
								<a href="{{ URL::to('blog/'.$blog->slug.'/'.$blog->id) }}" class="blog-post-title">{{ html_entity_decode(stripcslashes($blog->title)) }}</a>
							</div>
							<div class="blog-post-excerpt">{{ html_entity_decode(stripcslashes($blog->body)) }}</div>
							<div class="blog-post-links">
							@if(isOwner($blog->business->slug) || isAdmin())
								<a href="{{ URL::to('blog/'.$blog->slug.'/delete/'.$blog->id) }}" onclick = "return confirm('Are you sure you want to remove this blog?')" class="read-more-link">Remove Blog</a>
								<a href="{{ URL::to('blog/'.$blog->slug.'/edit/'.$blog->id) }}" class="read-more-link">Edit Blog</a>
							@endif
								<a href="{{ URL::to('blog/'.$blog->slug.'/'.$blog->id) }}" class="read-more-link">Read More</a>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		@else

		@endif
	</div>
</div>