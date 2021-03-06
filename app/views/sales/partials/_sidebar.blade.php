<div class="sidebar-container container-8">

	<div class="recently-added block">
		<div class="block-title">
			<h3>Recently Added</h3>
		</div>
		<ul class="entries-list">
		
			@foreach($recentlyaddedcompany as $recentcompany)
				@if(!empty($recentcompany->branches->first()->id))
					<li class="clearfix">
						<a href="{{ URL::to($recentcompany->branches->first()->branchslug) }}" class="thumbnail">
							<img src="{{ ($recentcompany->logo == '') ? URL::asset('images/image-not-available.png') : URL::asset($recentcompany->logo) }}" alt="" />
						</a>
						<a href="{{ URL::to($recentcompany->branches->first()->branchslug) }}" class="entry-title">{{ decode($recentcompany->name) }}</a>
						<div class="entry-excerpt">{{ Str::limit(decode($recentcompany->business_description), 50) }}</div>
					</li>
				@endif	
			@endforeach
		</ul>

	<div class="latest-news block">
		<div class="block-title">
			<h3>Latest News</h3>
		</div>
		<ul class="entries-list">
		@foreach($recentlyaddedblog as $recentblog)
			<li class="clearfix">
				<a href="{{ URL::to('/blog/'.$recentblog->slug) }}" class="thumbnail">
					<img src="{{ ($recentblog->blogheaderimage == '') ? URL::asset('images/no_photo_available.jpg') : URL::asset($recentblog->blogheaderimage) }}" alt="" />
				</a>
				<a href="{{ URL::to('/blog/'.$recentblog->slug) }}" class="entry-title">{{ decode($recentblog->title) }}</a>
				<div class="entry-excerpt">{{ Str::limit(strip_tags(decode($recentblog->body)) , 50) }}</div>
			</li>
		@endforeach
		</ul>
		<div class="one-image-banner">
			<a href="#">
				<img src="{{ URL::asset('images/sidebar_banner.png') }}" alt="" />
			</a>
		</div>
	</div>

</div><!-- end of .sidebar-container -->