@include('client.partials._header')

<section class="section content boxed">
	@include('client.partials._searchbar')
	@yield('slider')

	<!-- the green line -->
			<div class="industries-tabs-wrapper">
				<div class="zone-industries-tabs zone clearfix">
				</div>
			</div>
	<!-- the green line -->

	<!-- actual body -->
		<div class="content-wrapper">
			<div class="zone-content equalize zone clearfix">

			<!-- actual body content -->
				<div class="content-container container-16">

				@yield('actual-body-content')

				</div>
			<!-- actual body content -->

			<!-- sidebar -->
			@include('client.partials._sidebar')
			<!-- sidebar -->

			</div>
		</div>
	<!-- actual body -->

	@include('client.partials._footer')
	@include('client.partials._includes')
	@yield('scripts')
</section>

</body>

</html>