<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>

<body>
	<p> Hi {{UCfirst($firstname)}}, 
	<br>	
	<p >Please confirm your email by clicking on this<a href="{{Request::root() . '/activate/' . $token }}"> link. </a></p>
	<p >Thank you.</p>


</body>
</html>