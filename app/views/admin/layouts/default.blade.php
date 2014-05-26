@include('admin.partials._admin_header')
		<section class="section content boxed">

			@include('admin.partials._searchbar')
			<div class="industries-tabs-wrapper">
				<div class="zone-industries-tabs zone clearfix">
				</div><!-- end of .zone-industries-tabs -->
			</div><!-- end of .industries-tabs-wrapper -->

			<div class="content-wrapper">
				<div class="zone-content equalize zone clearfix">
					<div class="content-container container-16">

					@yield('actual-body-content')

					</div><!-- end of .content-container -->

					@include('admin.partials._sidebar')

				</div><!-- end of .zone-content -->
				
			</div><!-- end of .content-wrapper -->

		</section>

		@include('admin.partials._footer')
		@include('admin.partials._includes')
	</body>

</html>