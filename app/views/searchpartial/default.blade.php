<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{$title}}</title>
	{{ HTML::style('http://cdn.foundation5.zurb.com/foundation.css'); }}
	{{ HTML::script('http://code.jquery.com/jquery-1.11.0.min.js'); }}
	{{ HTML::script('http://code.jquery.com/jquery-migrate-1.2.1.min.js'); }}
	{{ HTML::script('http://cdn.foundation5.zurb.com/foundation.js'); }}


	<style>
		.center{
			text-align: center;

		}
		.colorbg{
			background:#e3e3e3;
		}
		.category{
			float:left;
			width:10%;
			color:blue;
			text-decoration: underline;
			margin-bottom:20px;
		}

	</style>
</head>
<body>
	@yield('content')
	
	@yield('scripts')
</body>
</html>