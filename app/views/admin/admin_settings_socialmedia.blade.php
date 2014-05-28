@extends('admin.layouts.default')

@section('actual-body-content')

		<div class="blog-post block">
			<div class="block-title">
				<h1>Social Media Settings</h1>
			</div>
		</div>

		<div class="comments block">
			<div class="comment-message">
				<div class="comment-message-title">
					Put Directory <span class="text-colorful">Social Media</span> Links Below
				</div>
				<form class="comment-message-form">
                    <div class="social-links block">
                        <a class="social-link" href="#" data-placeholder="Facebook Link" data-value="{{ $social->facebook }}" data-socialtype="facebook">
                            <img src="{{ URL::asset('images/facebook-icon.png') }}" alt="" />
                        </a>
                        <a class="social-link" href="#" data-placeholder="Google Link" data-value="{{ $social->google }}" data-socialtype="google">
                            <img src="{{ URL::asset('images/google-icon.png') }}" alt="" />
                        </a>
                        <a class="social-link" href="#" data-placeholder="Twitter Link" data-value="{{ $social->twitter }}" data-socialtype="twitter">
                            <img src="{{ URL::asset('images/twitter-icon.png') }}" alt="" />
                        </a>`
                        <a class="social-link" href="#" data-placeholder="LinkedIn Link" data-value="{{ $social->linkedin }}" data-socialtype="$linkedin">
                            <img src="{{ URL::asset('images/linkedin-icon.png') }}" alt="" />
                        </a>
                        <a class="social-link" href="#" data-placeholder="Pinterest Link" data-value="{{ $social->pinterest }}" data-socialtype="pinterest">
                            <img src="{{ URL::asset('images/pinterest-icon.png') }}" alt="" />
                        </a>
                        <a class="social-link" href="#" data-placeholder="Dribbble Link" data-value="{{ $social->dribbble }}" data-socialtype="dribbble">
                            <img src="{{ URL::asset('images/dribbble-icon.png') }}" alt="" />
                        </a>
                    </div>
                    <div class="social-textfield"></div>
					</form>
			</div>
		</div>
		
@stop