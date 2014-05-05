@include('client.partials._header')

<section class="section content boxed">

			@include('client.partials._searchbar')

			<div class="slideshow-wrapper">
				<img src="images/slideshow/spacer.png" alt="" />
			</div>

			<div class="industries-tabs-wrapper">
				<div class="zone-industries-tabs zone clearfix">
				</div><!-- end of .zone-industries-tabs -->
			</div><!-- end of .industries-tabs-wrapper -->

			<div class="content-wrapper">
				<div class="zone-content equalize zone clearfix">
					<div class="content-container container-16">
						@yield('actual-body-content')
				</div>
				</div>
				</div>
				</section>

	@include('client.partials._footer')
	@include('client.partials._includes')

</section>

</body>

</html>