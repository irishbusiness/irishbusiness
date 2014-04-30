<header class="section header-2 boxed">

<div class="header-top-wrapper">
<div class="zone-header-top zone clearfix">

<div class="header-top-left container-8">

<div class="user-links">
<div class="login">
<a href="#" id="login-link" class="login-link">Login</a>
<form id="login-form" class="login-form">
<input class="text-input-grey" type="text" placeholder="Login">
<input class="text-input-grey" type="text" placeholder="Password">
<a href="#" class="password-restore">Forgot Password?</a>
<input class="button-2-colorful" type="submit" value="Login">
</form>
</div>
</div>

</div>

<div class="header-top-right container-16">

<div class="social-links block">
<a href="{{ URL::to('http://www.facebook.com') }}">
<img src="images/facebook-icon.png" alt="" />
</a>
<a href="{{ URL::to('http://www.google.com') }}">
<img src="images/google-icon.png" alt="" />
</a>
<a href="{{ URL::to('http://www.twitter.com') }}">
<img src="images/twitter-icon.png" alt="" />
</a>
<a href="{{ URL::to('http://www.linkedin.com') }}">
<img src="images/linkedin-icon.png" alt="" />
</a>
<a href="{{ URL::to('http://www.pinterest.com') }}">
<img src="images/pinterest-icon.png" alt="" />
</a>
<a href="{{ URL::to('http://www.dribbble.com') }}">
<img src="images/dribbble-icon.png" alt="" />
</a>
</div>
</div>
</div><!-- end of .zone-header-top -->
</div><!-- end of .header-top-wrapper -->

<div class="header-wrapper">
<div class="zone-header zone clearfix">

<div class="header-left container-4">
<div class="logo block">
<a href="{{ URL::to('/') }}">
<img src="images/logo-2.png" alt="" />
</a>
</div>
</div>

<div class="header-right container-20">
<div class="main-menu block">
<ul id="sf-menu">
<li class="empty neighbour-left">
<div></div>
</li>
<li {{ (Request::is('/') ? ' class="first active"' : '') }}>
<a href="/">HOME</a>
</li>
<li {{ (Request::is('blog*') ? ' class="first active"' : '') }}>
<a href="about-us.html">BLOG</a>
</li>
<li {{ (Request::is('contact-us*') ? ' class="first active"' : '') }}>
<a href="price-register.html">CONTACT US</a>
</li>
<li {{ (Request::is('register*') ? ' class="first active"' : '') }}>
<a href="blog.html">REGISTER</a>
</div>
</div>
</div>
</div>
</header>