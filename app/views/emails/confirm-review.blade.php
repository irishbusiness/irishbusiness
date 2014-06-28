<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>

<body>
	<p>Hi {{ UCfirst($firstname) }},</p>
	<br>
	<p>You just submitted a review for {{ $business->name }}. </p>
	<p>If this was you, please confirm it <a href="{{URL::to('review/confirm', array($token)) }}">here</a>. </p>
	<br><hr>
	<p><small>If the link above doesn't work. Please copy and paste this url to your browser. </small></p>
	<p><small>{{URL::to('review/confirm', array($token)) }}</small></p>
	<br>
	<p>If you didn't do this review, please ignore this email or delete it immediately.</p>
	<br><hr>
	<p>Regards,</p>
	<p>IrishBusiness.ie</p>
</body>
</html>	