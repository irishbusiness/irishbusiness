@extends('client.layouts.default')

@section('actual-body-content')
<div class="content-container container-16">
	<div class="content-wrapper">
		<div class="zone-content equalize zone clearfix">
			<div class="content-container container-16">

				<div class="blog-post block">
					<div class="block-title">
						<h1>{{ decode($blog->title) }}</h1>
					</div>
					@if(!$blog->blogheaderimage == "")
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
                            	{{ decode($blog->body) }}
                            </div>
                        </div>
					</div>
					<div class="coupon-row">
						<p>
						  <a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::to('blog/'.$blog->slug) }}" class="share facebook">
						    Share on Facebook
						  </a>
						</p>
						<p>
						  <a href="https://twitter.com/intent/tweet?url={{ URL::to('blog/'.$blog->slug) }}&text={{ $blog->title }}&hashtags={{ hashtag($blog->title) }}" class="share twitter">
						    Share on Twitter
						  </a>
						</p>
						<p>
						  <a href="https://plus.google.com/share?url={{ URL::to('blog/'.$blog->slug) }}" class="share google">
						    Share on Google+
						  </a>
						</p>
						<p>
						  <a href="http://www.linkedin.com/shareArticle?mini=true&url={{ URL::to('blog/'.$blog->slug) }}&source=IrishBusiness.ie&title={{ decode($blog->title) }}" class="share linkedin">
						    Share on LinkedIn
						  </a>
						</p>
						<div class="separator"></div>
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

@section('scripts')
	<script type="text/javascript">
		$(window).ready(function(){

		// create social networking pop-ups
		  (function() {
		    
			var Config = {
		      Link: "a.share",
		      Width: 500,
		      Height: 500
			}
		        ;
		  
		  // add handler links
		  var slink = document.querySelectorAll(Config.Link);
		  for (var a = 0; a < slink.length; a++) {
		    slink[a].onclick = PopupHandler;
		  }
		  
		  // create popup
		  function PopupHandler(e) {
		    
		    e = (e ? e : window.event);
		    var t = (e.target ? e.target : e.srcElement);
		    
		    // popup position
		    var
		        px = Math.floor(((screen.availWidth || 1024) - Config.Width) / 2),
		        py = Math.floor(((screen.availHeight || 700) - Config.Height) / 2);
		    
		    // open popup
		    var popup = window.open(t.href, "social", "width="+Config.Width+",height="+Config.Height+",left="+px+",top="+py+",location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1");
		    if (popup) {
		      popup.focus();
		      if (e.preventDefault) e.preventDefault();
		      e.returnValue = false;
		    }
		    
		    return !!popup;
		  }
		  
		}
		 ());
	});
	</script>
@stop