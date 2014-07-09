<div id="company-tabs-photogallery" class="company-tabs-content">
	<div class="blog block">
		@if( isOwner($branch->business->slug) || isAdmin() )
		<a id="add_new_blog" class="a-btn button-2-colorful add-coupon">Add Photos</a><br>
        <div class="content-container" id="add_blog_block" style="display:none">
		    <div class="blog-post block">
		        <div class="block-title marginize">
		            <h1>Upload Photos</h1>
		        </div>
		    </div>
		</div>
        @endif
	</div>
</div>