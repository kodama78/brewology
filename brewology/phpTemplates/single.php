<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <title>Realtor</title>
    <meta name="description" content="Here goes description" />
    <meta name="author" content="author name" />
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Style CSS -->
	<link rel="stylesheet" href="css/global.css" />
	<link rel="stylesheet" href="css/font-awesome-4.4.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/theme_css/owl-carousel.css" />
	<link rel="stylesheet" href="css/theme_css/bootstrap.css" />
	<link rel="stylesheet" href="css/theme_css/lightbox.css" />
	<link rel="stylesheet" href="css/theme_css/animate.css" />
	<link rel="stylesheet" href="css/theme_css/bxslider.css" />
	<link rel="stylesheet" href="css/theme_css/nouislider.css" />
	<link rel="stylesheet" href="css/theme_css/icomoon.css" />
	<link rel="stylesheet" href="css/theme_css/screen.css" />
</head>
<body data-smooth-scroll="on">

	<!-- Page Wrapper -->
	<div id="page">
		<!-- Header -->
		<?php include 'header.php' ?>

		<!-- Main Content -->
		<div class="content-wrapper">
			<!-- Login Form -->
			<div class="login-form-popup">
				<div class="login-form" id="login-popup">
					<div class="brand-wrapper">
						<img src="img/brand.png" alt="login brand" />
					</div>

					<form id="login-form">
						<input class="js-input" type="text" placeholder="Login" />
						<input class="js-input" type="password" placeholder="Password" />

						<input type="submit" value="Login" class="submit-button" />

						<div class="options">
							<label>
								<input type="checkbox" />
								<span>Remember me</span>
							</label>
							<a class="remember-password" href="#">Forgotten the password</a>
						</div>
					</form>

					<form id="register-form">
						<input class="js-input" type="text" placeholder="First Name" />
						<input class="js-input" type="text" placeholder="Last Name" />
						<input class="js-input" type="text" placeholder="Login" />
						<input class="js-input" type="password" placeholder="Password" />
						<input class="js-input" type="password" placeholder="Confirm password" />

						<input type="submit" value="Register" class="submit-button" />
					</form>

					<div class="sign-in-options">
						<span>Sign in</span>
						<a class="facebook" href="my-profile.html">Facebook</a>
						<a class="google" href="my-profile.html">Google</a>
					</div>

					<p class="register-link"><i>Don't have an account?</i> <a href="#" class="register-btn">Register here</a></p>
				</div>
			</div>
			
			<!-- Single Property Container -->
			<section class="single-property-container">
				<div class="container">
					<div class="section-header no-icon">
						<h1><?php echo $name ?></h1>
						<p><?php echo $breweryDescription ?></p>
					</div>

					<div class="row main-wrapper">
						<div class="col-md-7 col-xs-24 col">
							<div class="row">
								<div class="col-sm-12 col-md-24">
									<div class="map-info">
										<div class="map-canvas">
											<div id="map-canvas" data-property-id="5">
												GOOGLE MAP WILL GO HERE
											</div>
										</div>
									</div>
								</div>

								<!--								<div class="col-sm-12 col-md-24">-->
								<!--									<div class="property-agent">-->
								<!--										<div class="agent">-->
								<!--											<h2 class="caption">Contact the agent</h2>-->
								<!--											<p class="position">agent</p>-->
								<!---->
								<!--											<div class="image">-->
								<!--												<a href="agent.html">-->
								<!--													<img src="img/agent-2.jpg" alt="agent photo" />-->
								<!--												</a>-->
								<!--											</div>-->
								<!---->
								<!--											<h3><a href="agent.html">Elias Doe</a></h3>-->
								<!---->
								<!--											<ul class="social-block">-->
								<!--												<li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
								<!--												<li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
								<!--												<li><a href="#"><i class="fa fa-github-alt"></i></a></li>-->
								<!--											</ul>-->
								<!---->
								<!--											<form class="simple-form">-->
								<!--												<input type="text" class="js-input" placeholder="Full name" />-->
								<!--												<input type="text" class="js-input" placeholder="Email" />-->
								<!--												<input type="text" class="js-input" placeholder="Subject" />-->
								<!--												<textarea class="js-input" placeholder="Message"></textarea>-->
								<!--												<button class="submit-btn">Write</button>-->
								<!--											</form>-->
								<!--										</div>-->
								<!--									</div>-->
								<!--								</div>-->
							</div>
						</div>
						<div class="col-md-17 col-xs-24 col">
							<div class="main-info">
								<div class="row">
									<div class="col-sm-15">
										<div class="item-cover">
											<div class="cover-photos">
												<p>Newsfeed goes here</p>
<!--												<ul class="slides">-->
<!--													<li>-->
<!--														<a href="img/item-cover-1.jpg" data-lightbox="Properties">-->
<!--															<i class="icon"></i>-->
<!--														</a>-->
<!--														<img src="img/item-cover-1.jpg" alt="property cover" />-->
<!--													</li>-->
<!--													<li>-->
<!--														<a href="img/item-cover-2.jpg" data-lightbox="Properties">-->
<!--															<i class="icon"></i>-->
<!--														</a>-->
<!--														<img src="img/item-cover-2.jpg" alt="property cover" />-->
<!--													</li>-->
<!--													<li>-->
<!--														<a href="img/item-cover-3.jpg" data-lightbox="Properties">-->
<!--															<i class="icon"></i>-->
<!--														</a>-->
<!--														<img src="img/item-cover-3.jpg" alt="property cover" />-->
<!--													</li>-->
<!--													<li>-->
<!--														<a href="img/item-cover-4.jpg" data-lightbox="Properties">-->
<!--															<i class="icon"></i>-->
<!--														</a>-->
<!--														<img src="img/item-cover-4.jpg" alt="property cover" />-->
<!--													</li>-->
<!--													<li>-->
<!--														<a href="img/item-cover-5.jpg" data-lightbox="Properties">-->
<!--															<i class="icon"></i>-->
<!--														</a>-->
<!--														<img src="img/item-cover-5.jpg" alt="property cover" />-->
<!--													</li>-->
<!--													<li>-->
<!--														<a href="img/item-cover-6.jpg" data-lightbox="Properties">-->
<!--															<i class="icon"></i>-->
<!--														</a>-->
<!--														<img src="img/item-cover-6.jpg" alt="property cover" />-->
<!--													</li>-->
<!--													<li>-->
<!--														<a href="img/item-cover-7.jpg" data-lightbox="Properties">-->
<!--															<i class="icon"></i>-->
<!--														</a>-->
<!--														<img src="img/item-cover-7.jpg" alt="property cover" />-->
<!--													</li>-->
<!--												</ul>-->
											</div>

<!--											<div class="thumbnail-carousel">-->
<!--												<ul class="slides">-->
<!--													<li><a data-slide-index="0" href="#"><img src="img/item-cover-1.jpg" alt="thumbnail cover" /></a></li>-->
<!--													<li><a data-slide-index="1" href="#"><img src="img/item-cover-2.jpg" alt="thumbnail cover" /></a></li>-->
<!--													<li><a data-slide-index="2" href="#"><img src="img/item-cover-3.jpg" alt="thumbnail cover" /></a></li>-->
<!--													<li><a data-slide-index="3" href="#"><img src="img/item-cover-4.jpg" alt="thumbnail cover" /></a></li>-->
<!--													<li><a data-slide-index="4" href="#"><img src="img/item-cover-5.jpg" alt="thumbnail cover" /></a></li>-->
<!--													<li><a data-slide-index="5" href="#"><img src="img/item-cover-6.jpg" alt="thumbnail cover" /></a></li>-->
<!--													<li><a data-slide-index="6" href="#"><img src="img/item-cover-7.jpg" alt="thumbnail cover" /></a></li>-->
<!--												</ul>-->
<!--											</div>-->
										</div>

<!--										<div class="featured-video">-->
<!--											<div class="cover visible">-->
<!--												<button class="start-media">-->
<!--													<i class="fa fa-play"></i>-->
<!--												</button>-->
<!--											</div>-->
<!--											<div class="embed-responsive embed-responsive-4by3">-->
<!--												<iframe src="https://player.vimeo.com/video/50457458?title=0&byline=0&portrait=0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>-->
<!--											</div>-->
<!--										</div>-->

										<!-- Comments Area -->
<!--										<div class="comments-area">-->
<!--											<div class="section-header small">-->
<!--												<h2>Review</h2>-->
<!--												<p>our visitors decided to share the impressions of visit of this hotel</p>-->
<!--											</div>-->
<!---->
<!--											<!-- Comments List -->-->
<!--											<div class="commments-wrapper">-->
<!--												<ul class="comments-list">-->
<!--													<li class="comment">-->
<!--														<div class="user">-->
<!--															<img src="img/blog-author-2.jpg" alt="user avatar" />-->
<!--														</div>-->
<!---->
<!--														<div class="comment-body">-->
<!--															<div class="message">-->
<!--																<p>Duis vel eros mi. Nunc eu sem dolor. Nulla<br />venenatis, augue at rhoncus tincidunt</p>-->
<!--															</div>-->
<!---->
<!--															<div class="comment-info">-->
<!--																<p class="author">Robert Doe</p>-->
<!--																<p class="date">2 days ago</p>-->
<!--																<a href="#" class="reply-link">Reply</a>-->
<!--															</div>-->
<!--														</div>-->
<!--													</li>-->
<!---->
<!--													<li class="comment">-->
<!--														<div class="user">-->
<!--															<img src="img/blog-author-1.jpg" alt="user avatar" />-->
<!--														</div>-->
<!---->
<!--														<div class="comment-body">-->
<!--															<div class="message">-->
<!--																<p>Duis vel eros mi. Nunc eu sem dolor. Nulla<br />venenatis, augue at rhoncus tincidunt</p>-->
<!--															</div>-->
<!---->
<!--															<div class="comment-info">-->
<!--																<p class="author">Robert Doe</p>-->
<!--																<p class="date">2 days ago</p>-->
<!--																<a href="#" class="reply-link">Reply</a>-->
<!--															</div>-->
<!--														</div>-->
<!--													</li>-->
<!--												</ul>-->
<!--											</div>-->
<!---->
<!--											<!-- Response Form -->-->
<!--											<form class="comment-form">-->
<!--												<div class="form-body clearfix">-->
<!--													<div class="message">-->
<!--														<textarea class="js-input form-input" placeholder="Leave a comment"></textarea>-->
<!--													</div>-->
<!--													<div class="row row-fit">-->
<!--														<div class="col-sm-12">-->
<!--															<input type="text" class="js-input form-input" placeholder="Enter your name" />-->
<!--														</div>-->
<!--														<div class="col-sm-12">-->
<!--															<input type="text" class="js-input form-input" placeholder="Enter your email address" />-->
<!--														</div>-->
<!--													</div>-->
<!---->
<!--													<input type="submit" value="post" class="submit-button" />-->
<!--												</div>-->
<!--											</form>-->
<!--										</div>-->
									</div>

									<div class="col-sm-9">
										<div class="property-description-box">
											<div class="property-description">
												<div class="rating-box">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>

												<h6><?php echo $addressOne ?></h6>
												<h6><?php echo $addressTwo ?></h6>
												<p class="address"></p>

												<div class="services">
													<p class="caption">Info</p>
													<ul>
														<li class="bathrooms"><p>Phone: <span><?php echo $phone ?></span></p></li>
														<li class="bedrooms"><p>website: <span><a href=<?php echo $website ?> target="_blank"><?php echo $website ?></a></span></p></li>
<!--														<li class="area"><p>Area: <span>100</span></p></li>-->
													</ul>
												</div>

												<div class="price">
<!--													<p>$450 000 <span>for sale</span></p>-->
												</div>
											</div>
										</div>

<!--										<div class="text-description">-->
<!--											<div class="section-header small">-->
<!--												<h2>Description</h2>-->
<!--											</div>-->
<!---->
<!--											<p>Duis vel eros mi. Nunc eu sem dolor. Nulla venenatis, augue at rhoncus tincidunt, nisi dolor fringilla nibh, sed tristique quam leo vel arcu. Sed ultricies, odio vel aliquet ultricies, turpis ipsum ultrices massa, vitae pulvinar nibh erat</p>-->
<!---->
<!--											<div class="features">-->
<!--												<h4>Features</h4>-->
<!--												<p>additional services</p>-->
<!---->
<!--												<div class="accordion-group">-->
<!--													<div class="accordion">-->
<!--														<h4 class="heading">Vivamus ac nulla lacus</h4>-->
<!--														<div class="body">-->
<!--															<p>Duis vel eros mi. Nunc eu sem dolor. Nulla venenatis, augue at rhoncus tincidunt, nisi dolor fringilla nibh</p>-->
<!--														</div>-->
<!--													</div>-->
<!---->
<!--													<div class="accordion">-->
<!--														<h4 class="heading">Etiam consequat rutrum soe</h4>-->
<!--														<div class="body">-->
<!--															<p>Duis vel eros mi. Nunc eu sem dolor. Nulla venenatis, augue at rhoncus tincidunt, nisi dolor fringilla nibh</p>-->
<!--														</div>-->
<!--													</div>-->
<!---->
<!--													<div class="accordion">-->
<!--														<h4 class="heading open">Proin molestie efficitur convallis</h4>-->
<!--														<div class="body">-->
<!--															<p>Duis vel eros mi. Nunc eu sem dolor. Nulla venenatis, augue at rhoncus tincidunt, nisi dolor fringilla nibh</p>-->
<!--														</div>-->
<!--													</div>-->
<!---->
<!--													<div class="accordion">-->
<!--														<h4 class="heading">Cras venenatis nunc sit amet</h4>-->
<!--														<div class="body">-->
<!--															<p>Duis vel eros mi. Nunc eu sem dolor. Nulla venenatis, augue at rhoncus tincidunt, nisi dolor fringilla nibh</p>-->
<!--														</div>-->
<!--													</div>-->
<!--												</div>-->
<!--											</div>-->
<!---->
<!--											<p>Duis vel eros mi. Nunc eu sem dolor. Nulla venenatis, augue at rhoncus tincidunt, nisi dolor fringilla nibh, sed tristique quam leo vel arcu. Sed ultricies, odio vel aliquet ultricies, turpis ipsum ultrices massa, vitae pulvinar nibh erat</p>-->
<!--										</div>-->

										<div class="widget_latest_listing">
											<p class="heading">Nearby Breweries</p>

											<ul class="listing-items row row-fit-10">
												<li class="item col-xs-8">
													<div class="image">
														<a href="single.html">
															<img src="img/sidebar-listing-1.jpg" alt="listing image" />
														</a>
													</div>

													<h5 class="title">
														<a href="single.html">Grand Hotel</a>
													</h5>
													<p class="address">LA 544</p>
													<span class="price">$150</span>
												</li>

												<li class="item col-xs-8">
													<div class="image">
														<a href="single.html">
															<img src="img/sidebar-listing-2.jpg" alt="listing image" />
														</a>
													</div>

													<h5 class="title">
														<a href="single.html">Grand Hotel</a>
													</h5>
													<p class="address">LA 544</p>
													<span class="price">$150</span>
												</li>

												<li class="item col-xs-8">
													<div class="image">
														<a href="single.html">
															<img src="img/sidebar-listing-3.jpg" alt="listing image" />
														</a>
													</div>

													<h5 class="title">
														<a href="single.html">Grand Hotel</a>
													</h5>
													<p class="address">LA 544</p>
													<span class="price">$150</span>
												</li>

												<li class="item col-xs-8">
													<div class="image">
														<a href="single.html">
															<img src="img/sidebar-listing-4.jpg" alt="listing image" />
														</a>
													</div>

													<h5 class="title">
														<a href="single.html">Grand Hotel</a>
													</h5>
													<p class="address">LA 544</p>
													<span class="price">$150</span>
												</li>

												<li class="item col-xs-8">
													<div class="image">
														<a href="single.html">
															<img src="img/sidebar-listing-5.jpg" alt="listing image" />
														</a>
													</div>

													<h5 class="title">
														<a href="single.html">Grand Hotel</a>
													</h5>
													<p class="address">LA 544</p>
													<span class="price">$150</span>
												</li>

												<li class="item col-xs-8">
													<div class="image">
														<a href="single.html">
															<img src="img/sidebar-listing-6.jpg" alt="listing image" />
														</a>
													</div>

													<h5 class="title">
														<a href="single.html">Grand Hotel</a>
													</h5>
													<p class="address">LA 544</p>
													<span class="price">$150</span>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		<!-- Footer -->
		<footer>
<!--			<div class="container">-->
<!--				<div class="footer-widgets">-->
<!--					<div class="row">-->
<!--						<div class="col-md-9">-->
<!--							<div class="footer-widget widget_info">-->
<!--								<div class="widget-body">-->
<!--									<img src="img/logo.png" alt="realtor logo" />-->
<!---->
<!--									<p>Duis vel eros mi. Nunc eu sem dolor. Nulla venenatis, augue at rhoncus tincidunt, nisi dolor fringilla nibh, sed tristique quam leo vel arcu. Sed ultricies, odio vel aliquet ultricies, turpis ipsum ultrices massa, vitae pulvinar nibh erat</p>-->
<!---->
<!--									<ul class="social-block">-->
<!--										<li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
<!--										<li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
<!--										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
<!--										<li><a href="#"><i class="fa fa-youtube"></i></a></li>-->
<!--									</ul>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!---->
<!--						<div class="col-md-9">-->
<!--							<div class="footer-widget widget_most_viewed">-->
<!--								<h4 class="widget-title">Most viewed</h4>-->
<!---->
<!--								<div class="widget-body">-->
<!--									<div class="most-viewed-property">-->
<!--										<div class="image">-->
<!--											<a href="single.html">-->
<!--												<img src="img/most-viewed-prop-1.jpg" alt="most viewed" />-->
<!--											</a>-->
<!--										</div>-->
<!--										<h2><a href="single.html">Grand hotel</a></h2>-->
<!--										<p class="price">$450</p>-->
<!--										<ul class="rating">-->
<!--											<li><i class="fa fa-star"></i></li>-->
<!--											<li><i class="fa fa-star"></i></li>-->
<!--											<li><i class="fa fa-star"></i></li>-->
<!--											<li><i class="fa fa-star-o"></i></li>-->
<!--											<li><i class="fa fa-star-o"></i></li>-->
<!--										</ul>-->
<!--									</div>-->
<!---->
<!--									<div class="most-viewed-property">-->
<!--										<div class="image">-->
<!--											<a href="single.html">-->
<!--												<img src="img/most-viewed-prop-2.jpg" alt="most viewed" />-->
<!--											</a>-->
<!--										</div>-->
<!--										<h2><a href="single.html">Golden vip room</a></h2>-->
<!--										<p class="price">$450</p>-->
<!--										<ul class="rating">-->
<!--											<li><i class="fa fa-star"></i></li>-->
<!--											<li><i class="fa fa-star"></i></li>-->
<!--											<li><i class="fa fa-star"></i></li>-->
<!--											<li><i class="fa fa-star-o"></i></li>-->
<!--											<li><i class="fa fa-star-o"></i></li>-->
<!--										</ul>-->
<!--									</div>-->
<!---->
<!--									<div class="most-viewed-property">-->
<!--										<div class="image">-->
<!--											<a href="single.html">-->
<!--												<img src="img/most-viewed-prop-1.jpg" alt="most viewed" />-->
<!--											</a>-->
<!--										</div>-->
<!--										<h2><a href="single.html">Grand hotel</a></h2>-->
<!--										<p class="price">$450</p>-->
<!--										<ul class="rating">-->
<!--											<li><i class="fa fa-star"></i></li>-->
<!--											<li><i class="fa fa-star"></i></li>-->
<!--											<li><i class="fa fa-star"></i></li>-->
<!--											<li><i class="fa fa-star-o"></i></li>-->
<!--											<li><i class="fa fa-star-o"></i></li>-->
<!--										</ul>-->
<!--									</div>-->
<!---->
<!--									<div class="most-viewed-property">-->
<!--										<div class="image">-->
<!--											<a href="single.html">-->
<!--												<img src="img/most-viewed-prop-2.jpg" alt="most viewed" />-->
<!--											</a>-->
<!--										</div>-->
<!--										<h2><a href="single.html">Golden vip room</a></h2>-->
<!--										<p class="price">$450</p>-->
<!--										<ul class="rating">-->
<!--											<li><i class="fa fa-star"></i></li>-->
<!--											<li><i class="fa fa-star"></i></li>-->
<!--											<li><i class="fa fa-star"></i></li>-->
<!--											<li><i class="fa fa-star"></i></li>-->
<!--											<li><i class="fa fa-star"></i></li>-->
<!--										</ul>-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!---->
<!--						<div class="col-md-6">-->
<!--							<div class="footer-widget widget_contact">-->
<!--								<h4 class="widget-title">Contact info</h4>-->
<!---->
<!--								<div class="widget-body">-->
<!--									<ul class="contact-info">-->
<!--										<li class="phone">-->
<!--											<p>012 125 856 587</p>-->
<!--										</li>-->
<!--										<li class="mail">-->
<!--											<p><a href="#">Info@realtor.com</a></p>-->
<!--										</li>-->
<!--										<li class="location">-->
<!--											<p>Realtor office<br />22 Pink Road<br />Holliday city, La 2211</p>-->
<!--										</li>-->
<!--									</ul>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!---->
<!--				<div class="copyrigts">-->
<!--					<p>Copyrights 2015. Designed by <a href="https://www.teslathemes.com" target="blank">TeslaThemes</a></p>-->
<!--				</div>-->
<!--			</div>-->
		</footer>
	</div>

	<!-- Scripts -->
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script src="js/infobox.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/bxslider.js"></script>
	<script src="js/marquee.js"></script>
	<script src="js/nouislider.js"></script>
	<script src="js/modernizr.js"></script>
	<script src="js/imagesloaded.js"></script>
	<script src="js/smooth-scroll.js"></script>
	<script src="js/owl-carousel.js"></script>
	<script src="js/isotope.js"></script>
	<script src="js/theia.js"></script>
	<script src="js/lightbox.js"></script>
	<script src="js/options.js"></script>
</body>
</html>