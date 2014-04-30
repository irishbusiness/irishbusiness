<html lang="en">
	@yield('links')
	@include('client.partials._header')
<body>	
	@include('client.partials._navbar') 
	<section class="section content boxed">
	@yield('searchbar')
		<div class="content-wrapper">
			<div class="zone-content equalize zone clearfix">
				<div class="content-container container-16">
					@yield('content')
				</div><!-- end of .content-container -->
				@include('client.partials._sidebar')
			</div><!-- end of .zone-content -->
		</div><!-- end of .content-wrapper -->
	</section>
	@include('client.partials._footer') 
	@yield('scripts')
</body>
</html>
