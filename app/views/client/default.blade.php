<html lang="en">
<head>
	
	@yield('links')
	@include('client.partials._header')

</head>
<body>	

	@include('client.partials._navbar') 
	
	<section class="section content boxed">
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
