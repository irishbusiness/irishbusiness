<!doctype html>
<html class="" lang="en">

	<head>
        
		<meta charset="utf-8">
        @yield('title')
        
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{ HTML::script('scripts/jquery-1.10.2.min.js') }}

        @yield('linksfirst')
        
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

                $('#redactor2').redactor({
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
        
        @include('client.partials._styles')
        @yield('couponstyle')
	</head>
	<body>
        @if(Auth::user()->guest())
            @include('client.partials._header')
        @elseif(Auth::user()->user()->access_level == 3)
            @include('admin.partials._admin_header')
        @else
            @include('client.partials._header2')
        @endif
    

<section class="section content boxed">

	@include('client.partials._searchbar')
	@yield('slider')

	<!-- actual body -->
        <div class="industries-tabs-wrapper">
            <div class="zone-industries-tabs zone clearfix">
            </div><!-- end of .zone-industries-tabs -->
        </div><!-- end of .industries-tabs-wrapper -->

        <div class="content-wrapper">
            <div class="zone-content equalize zone clearfix">
                <div class="content-container container-24">
                @yield('actual-body-content')
                </div><!-- end of .content-container -->
                

                 @if(!Request::is('admin*') && !Request::is('*/map') && !Request::is('company*') && !Request::is('edit/business/*'))
                    @include('client.partials._sidebar')
                 @endif
             </div>
            </div><!-- end of .zone-content -->
            
        </div><!-- end of .content-wrapper -->
   
    @yield('scripts')
    @yield('scripts2')
	@include('client.partials._footer')
	@include('client.partials._includes')
	
    @if(Session::has('errorNotify'))
		<script>
			$('#login-form').slideDown(500);
			$('#errordiv').text("{{Session::get('errorNotify')}}");
		</script>
	@endif
    

    @if(Session::has('flash_message'))
        <script>
            $('#flashmessage').delay(20000).slideUp(50);
            $(document).on('click','#closeflash',function(){
                $(this).parent().hide();
            });

        </script>
    @endif
	

</section>

</body>

</html>