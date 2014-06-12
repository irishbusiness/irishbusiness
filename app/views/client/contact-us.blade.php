@extends('client.layouts.default')

@section('actual-body-content')
<div class="content-container container-16">
	<div class="content-wrapper">
		<div class="zone-content equalize zone clearfix">
			<div class="content-container container-16">

				<div class="contact-us block">
					<div class="block-title">
						<h1>Contact Us</h1>
					</div>
					<div class="comment-message">
						<div class="comment-message-title">
							Send Us a <span class="text-colorful">Message</span>
						</div>
						<form method="post" action="/glo/contact-us.php" id="contact-us-form" class="comment-message-form">
							<input type="text" name="name" class="text-input-grey name" placeholder="Name *" />
							<input type="text" name="email" class="text-input-grey email" placeholder="Email *" />
							<input type="text" name="website" class="text-input-grey website" placeholder="Website" />
							<textarea name="message" class="text-input-grey comment-message-main" placeholder="Your Comments Here"></textarea>
							<input type="submit" name="submit" value="Send Message" class="button-2-colorful" />
																								</form>
					</div>
				</div>

				<div class="separator"></div>

				<div class="company-details block">
					<div class="company-address">
						<div class="details-title">Address Details:</div>
						<div class="detail address">1234 Street<br />Mountain View, CA 94043</div>
						<div class="detail phone">Phone: +1 123-456-7890<br />Fax: +1 123-456-7890</div>
						<div class="detail email">
							E-mail: <a href="mailto:email@example.com" class="text-colorful">email@example.com</a><br />Website: <a href="http://themeforest.net/" class="text-colorful">www.example.com</a>
						</div>
					</div>
					<div class="company-hours">
						<div class="details-title">Opening Hours:</div>
						<div class="detail">
							<span class="detail-label">Monday-Friday:</span>9am - 5pm
						</div>
						<div class="detail">
							<span class="detail-label">Saturday:</span>10am - 3pm
						</div>
						<div class="detail">
							<span class="detail-label">Sunday:</span>Closed
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="company-map">
						<iframe src="https://maps.google.com/maps?q=33.874976,-117.566814&amp;num=1&amp;ie=UTF8&amp;t=m&amp;ll=33.878112,-117.566414&amp;spn=0.054727,0.20977&amp;z=12&amp;output=embed"></iframe>
					</div>
				</div>

			</div><!-- end of .content-container -->

		</div><!-- end of .zone-content -->
		
	</div><!-- end of .content-wrapper -->
	</div>
@stop

@section('sidebar')
	@include('client.partials._sidebar')
@stop