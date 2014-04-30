<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{$title}}</title>
	{{ HTML::style('http://cdn.foundation5.zurb.com/foundation.css'); }}
	{{ HTML::script('http://cdn.foundation5.zurb.com/foundation.js'); }}
	<style>
		.center{
			text-align: center;

		}
		.colorbg{
			background:#e3e3e3;
		}

	</style>
</head>
<body>
	@yield('content')
</body>
</html>