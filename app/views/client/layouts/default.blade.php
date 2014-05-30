<!doctype html>
<html class="" lang="en">

	<head>

		<meta charset="utf-8">
		<title>Glocal</title>

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
		@include('client.partials._styles')
	</head>

	<body>
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
                @if(Request::is('settings*'))
                <div class="content-container container-24">
                    <div class="company-tabs-wrapper">
                        <div class="zone-company-tabs zone clearfix">
                            <div class="company-tabs-container container-24">
                                <ul id="company-tabs-active" class="company-tabs">
                                    <li class="active">
                                        <a class="company-tabs-page" href="#">COMPANY</a>
                                    </li>
                                    <li class="">
                                        <a class="company-tabs-custom" href="#">COUPON</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end of .company-tabs-container -->
                        </div>
                        <!-- end of .zone-company-tabs -->
                    </div>
                @endif

				@yield('actual-body-content')

				</div>
			<!-- actual body content -->

			<!-- sidebar -->
             @if(!Request::is('settings*'))
			    @include('client.partials._sidebar')
             @endif
			<!-- sidebar -->

			</div>
		</div>
	<!-- actual body -->

	@include('client.partials._footer')
	@include('client.partials._includes')
	@if(Session::has('errorNotify'))
		<script>
			$('#login-form').slideDown(500);
			$('#errordiv').text('{{Session::get('errorNotify')}}');
		</script>
	@endif
	@yield('scripts')

</section>

</body>

</html>