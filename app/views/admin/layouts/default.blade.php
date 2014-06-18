<!doctype html>
<html class="" lang="en"  ng-app="app">

<head>

    <meta charset="utf-8">
     @yield('title')
     @yield('linksfirst')
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />


    {{ HTML::style("css/flexslider.css") }}
    {{ HTML::style("css/jquery-ui-1.10.3.custom.min.css") }}
    {{ HTML::style("css/jquery-selectbox.css") }}
    {{ HTML::style("css/styles.css") }}
    {{ HTML::style("css/green.css") }}
    {{ HTML::style("css/header-7.css") }}
    {{ HTML::style("css/responsive-grid.css") }}
   
    {{ HTML::style('css/bootstrap-formhelpers.css') }}
    {{ HTML::style('css/bootstrap-formhelpers.min.css') }}

    <!--[if lt IE 9]>
    <link rel="stylesheet" href="css/styles-ie8-and-down.css" />
    <![endif]-->

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

                $('#redactor1').redactor({
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

</head>

<body>
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
                    @yield('sidebar')

				</div><!-- end of .zone-content -->
				
			</div><!-- end of .content-wrapper -->

		</section>

		@include('admin.partials._footer')
		@include('admin.partials._includes')
        @yield('scripts')
	</body>

</html>