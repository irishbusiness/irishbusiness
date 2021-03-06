<!doctype html>
<html class="" lang="en">

	<head>

		<meta charset="utf-8">
		@yield('title')

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
        {{ HTML::script('scripts/jquery-1.10.2.min.js') }}
        <style type="text/css">
            body .redactor_toolbar li a.redactor_btn_button1 {
                background: url(img/button1.png) no-repeat;
            }
        </style>

        <script type="text/javascript">

            function testButton(obj, event, key)
            {
                obj.execCommand('underline');
            }

            $(document).ready(
                function()
                {
                    var buttons = ['formatting', '|', 'bold', 'italic', '|', 'unorderedlist', 'orderedlist', 'outdent', 'indent', '|', 'image', 'video', 'file', 'link', '|', 'horizontalrule'];

                    $('#redactor').redactor({
                        focus: true,
                        buttons: buttons,
                        buttonsCustom: {
                            button1: {
                                title: 'Button',
                                callback: testButton
                            }
                        }
                    });
                }
            );
        </script>
        @include('sales.partials._styles')
	</head>
	<body>
@include('sales.partials._header')

<section class="section content boxed">
	
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
                @if(Request::is('/settings*'))
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
                @else
                    <div class="content-container container-16">
                @endif

				@yield('actual-body-content')

				</div>
			<!-- actual body content -->

			<!-- sidebar -->
             @if(!Request::is('settings*'))
			    @include('sales.partials._sidebar')
             @endif
			<!-- sidebar -->

			</div>
		</div>
	<!-- actual body -->

	@include('sales.partials._footer')
	@include('sales.partials._includes')
	@if(Session::has('errorNotify'))
		<script>
			$('#login-form').slideDown(500);
			$('#errordiv').text('{{Session::get('errorNotify')}}');
		</script>
	@endif
    @if(Session::has('flash_message'))
        <script>
            $('#flashmessage').delay(5000).slideUp(50);
            $(document).on('click','#closeflash',function(){
                $(this).parent().hide();
            });

        </script>
    @endif
	@yield('scripts')

</section>

</body>

</html>