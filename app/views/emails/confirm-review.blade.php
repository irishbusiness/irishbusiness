<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>

	<body>
		<p>Hi {{ UCfirst($name) }},</p>
		<br>
		<p>You just submitted a review for {{ $business_name }}. </p>
		<p>If this was you, please confirm it <a href="{{URL::to('review/confirm/'.$token) }}">here</a>.</p>
		<br>
		<p>Regards,</p>
		<p>IrishBusiness.ie</p>
		<hr>
		<p><small>If the link above doesn't work. Please copy and paste this url to your browser. </small></p>
		<p><small>{{URL::to('review/confirm'.$token) }}</small></p>
		<p><small>If you didn't do this review, please ignore this email or delete it immediately.</small></p>
	</body>
</html>	