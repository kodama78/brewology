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
		<header>
			<!-- Navigation -->
			<nav>
				<ul>
					<li class="home current-menu-item"><a href="my-profile.php">Home</a></li>
					<li class="listing menu-item-has-children">
						<a href="#">Favorite Breweries</a>
						<ul class="sub-menu">
							<li><a href="properties-grid.php">Grid</a></li>
							<li><a href="properties-list.php">List</a></li>
						</ul>
					</li>
					<!--<li class="property"><a href="single-full-width.php">Single Brewery</a></li>-->
					<!--<li class="agents"><a href="agents.php">Agents</a></li>-->
					<!--<li class="blog"><a href="blog.php">Blog</a></li>-->
					<!--<li class="error"><a href="404.php">404 Page</a></li>-->
				</ul>
			</nav>

			<!-- Social Block & Login -->
			<div class="right-block">
				<!--<ul class="social-block">-->
				<!--<li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
				<!--<li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
				<!--<li><a href="#"><i class="fa fa-instagram"></i></a></li>-->
				<!--<li><a href="#"><i class="fa fa-pinterest"></i></a></li>-->
				<!--</ul>-->

				<p><a class="login" href="#">Login</a> / <a href="#" class="register">Register</a></p>
			</div>

			<!-- Menu Toggle -->
			<span class="menu-toggle cmn-toggle-switch cmn-toggle-switch__htx">
				<span>toggle menu</span>
			</span>

			<!-- Identity image -->
			<a href="index.php" class="brand">
				<img src="img/logo.png" alt="logo" />
			</a>
		</header>

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
			
			<!--  Single Agent Section -->
			<section class="single-agent">
				<div class="container">
					<div class="row">
						<div class="col-lg-16 col-md-17">
							<!-- Agent Info -->
							<div class="agent single">
								<div class="row row-fit">
									<div class="col-sm-15">									
										<div class="image">
											<img src="img/single-agent-photo.jpg" alt="agent photo" />
										</div>
									</div>

									<div class="col-sm-9">
										<div class="description">
											<h3><a href="agent.html">Elias Doe</a></h3>
											<p class="position">agent</p>

											<ul class="social-block">
												<li><a href="#"><i class="fa fa-facebook"></i></a></li>
												<li><a href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a href="#"><i class="fa fa-github-alt"></i></a></li>
											</ul>

											<p>Duis vel eros mi. Nunc eu sem dolor. Nulla venenatis, augue at rhoncus tincidunt, nisi dolor fringilla nibh, sed tristique quam leo vel arcu. Sed ultricies, odio vel aliquet ultricies.</p>
										</div>
									</div>
								</div>
							</div>

							<!-- Agent's Properties -->
							<div class="listed-properties">
								<div class="section-header les-padding">
									<h1>Currently listed properties by John</h1>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam nec viverra erat. Aenean elit tellus mattis quis maximus et malesuada congue velit</p>
								</div>

								<div class="row row-fit-10">
									<div class="col-sm-12 col-md-8">
										<div class="agent-property">
											<div class="cover">
												<div class="hover">
													<div class="text">
														<a href="single.html">Info</a>
														<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
													</div>
												</div>

												<img src="img/agent-property-1.jpg" alt="list property" />
											</div>

											<div class="property-body">
												<h4><a href="single.html">Grand Hotel</a></h4>
												<p>LA 544</p>
												<span>$150</span>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-md-8">
										<div class="agent-property">
											<div class="cover">
												<div class="hover">
													<div class="text">
														<a href="single.html">Info</a>
														<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
													</div>
												</div>

												<img src="img/agent-property-2.jpg" alt="list property" />
											</div>

											<div class="property-body">
												<h4><a href="single.html">Grand Hotel</a></h4>
												<p>LA 544</p>
												<span>$150</span>
											</div>
										</div>
									</div>

									<div class="col-sm-12 col-md-8">
										<div class="agent-property">
											<div class="cover">
												<div class="hover">
													<div class="text">
														<a href="single.html">Info</a>
														<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
													</div>
												</div>
												
												<img src="img/agent-property-3.jpg" alt="list property" />
											</div>

											<div class="property-body">
												<h4><a href="single.html">Grand Hotel</a></h4>
												<p>LA 544</p>
												<span>$150</span>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Comment Form -->
							<div class="comment-form-wrapper">
								<div class="section-header small">
									<h2>Contact the agent</h2>
									<p>Our visitors decided to share the impressions of visit of this hotel</p>
								</div>

								<form class="comment-form">
									<div class="form-body clearfix">
										<div class="message">
											<textarea class="js-input form-input" placeholder="Leave a comment"></textarea>
										</div>
										<div class="row row-fit">
											<div class="col-sm-12">
												<input type="text" class="js-input form-input" placeholder="Enter your name" />
											</div>
											<div class="col-sm-12">
												<input type="text" class="js-input form-input" placeholder="Enter your email address" />
											</div>
										</div>

										<input type="submit" value="post" class="submit-button" />
									</div>
								</form>
							</div>
						</div>

						<div class="col-md-7 col-lg-7 col-lg-offset-1">
							<div class="sidebar">
								<div class="sidebar-widgets">
									<div class="row isotope-container">
										<div class="col-md-24 col-sm-12 col-xs-24 isotope-item">
											<div class="sidebar-widget widget_search">
												<form class="search-form">
													<label>
														<input type="text" class="search-input js-input" />
														<span>Search</span>
													</label>
													<button type="sumit" class="search-submit">
														<i class="icon icon-search"></i>
													</button>
												</form>
											</div>
										</div>

										<div class="col-md-24 col-sm-12 col-xs-24 isotope-item">
											<div class="sidebar-widget widget_latest_listing">
												<p class="heading">Latest listing</p>

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

										<div class="col-md-24 col-sm-12 col-xs-24 isotope-item">
											<div class="sidebar-widget widget_categories">
												<h4 class="widget-title">Category</h4>

												<ul>
													<li><a href="#">Properties</a></li>
													<li><a href="#">Hotel</a></li>
													<li><a href="#">White</a></li>
												</ul>
											</div>
										</div>

										<div class="col-md-24 col-sm-12 col-xs-24 isotope-item">
											<div class="sidebar-widget widget_popular_listing">
												<h4 class="widget-title">Popular listing</h4>

												<ul class="popular-listing">
													<li class="list-item">
														<div class="photo">
															<a href="single.html">
																<img src="img/sidebar-popular-1.jpg" alt="sidebar popular" />
															</a>
														</div>

														<h4><a href="single.html">VIP Room in NY luxury hotel</a></h4>
														<p class="price">$235 per day</p>
														<a class="link" href="single.html">View</a>
													</li>

													<li class="list-item">
														<div class="photo">
															<a href="single.html">
																<img src="img/sidebar-popular-2.jpg" alt="sidebar popular" />
															</a>
														</div>

														<h4><a href="single.html">VIP Room in NY luxury hotel</a></h4>
														<p class="price">$235 per day</p>
														<a class="link" href="single.html">View</a>
													</li>

													<li class="list-item">
														<div class="photo">
															<a href="single.html">
																<img src="img/sidebar-popular-3.jpg" alt="sidebar popular" />
															</a>
														</div>

														<h4><a href="single.html">VIP Room in NY luxury hotel</a></h4>
														<p class="price">$235 per day</p>
														<a class="link" href="single.html">View</a>
													</li>
												</ul>
											</div>
										</div>

										<div class="col-md-24 col-sm-12 col-xs-24 isotope-item">
											<div class="sidebar-widget widget_promo">
												<a href="single.html">
													<img class="promo-bg" src="img/promo-bg.jpg" alt="promo widget background" />
													<img class="promo-fg" src="img/promo-fg.png" alt="foreground image" />
													<div class="text">
														<h6>Best deal</h6>
														<p>New house</p>
														<span>$1000 per month</span>
													</div>
												</a>
											</div>
										</div>

										<div class="col-md-24 col-sm-12 col-xs-24 isotope-item">
											<div class="sidebar-widget widget_custom_archive">
												<h4 class="widget-title">Archives</h4>

												<div class="tabs">
													<ul class="heading">
														<li><a href="#2014">2014</a></li>
														<li><a href="#2015">2015</a></li>
													</ul>

													<div id="2014" class="calendar">
														<ul>
															<li class="month">
																<p><i class="icon-plus2"></i>January</p>
																<ul>
																	<li><a href="#">Meeting with our agents</a></li>
																	<li><a href="#">New hotel was opened</a></li>
																</ul>
															</li>

															<li class="month">
																<p><i class="icon-plus2"></i>February</p>
																<ul>
																	<li><a href="#">Meeting with our agents</a></li>
																	<li><a href="#">New hotel was opened</a></li>
																</ul>
															</li>
														</ul>
													</div>

													<div id="2015" class="calendar">
														<ul>
															<li class="month">
																<p><i class="icon-plus2"></i>January</p>
																<ul>
																	<li><a href="#">Meeting with our agents</a></li>
																	<li><a href="#">New hotel was opened</a></li>
																</ul>
															</li>

															<li class="month">
																<p><i class="icon-plus2"></i>February</p>
																<ul>
																	<li><a href="#">Meeting with our agents</a></li>
																	<li><a href="#">New hotel was opened</a></li>
																</ul>
															</li>

															<li class="month">
																<p><i class="icon-plus2"></i>March</p>
																<ul>
																	<li><a href="#">Meeting with our agents</a></li>
																	<li><a href="#">New hotel was opened</a></li>
																</ul>
															</li>
														</ul>
													</div>
												</div>
											</div>
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
			<div class="container">
				<div class="footer-widgets">
					<div class="row">
						<div class="col-md-9">
							<div class="footer-widget widget_info">
								<div class="widget-body">
									<img src="img/logo.png" alt="realtor logo" />

									<p>Duis vel eros mi. Nunc eu sem dolor. Nulla venenatis, augue at rhoncus tincidunt, nisi dolor fringilla nibh, sed tristique quam leo vel arcu. Sed ultricies, odio vel aliquet ultricies, turpis ipsum ultrices massa, vitae pulvinar nibh erat</p>

									<ul class="social-block">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="#"><i class="fa fa-youtube"></i></a></li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-md-9">
							<div class="footer-widget widget_most_viewed">
								<h4 class="widget-title">Most viewed</h4>

								<div class="widget-body">
									<div class="most-viewed-property">
										<div class="image">
											<a href="single.html">
												<img src="img/most-viewed-prop-1.jpg" alt="most viewed" />
											</a>
										</div>
										<h2><a href="single.html">Grand hotel</a></h2>
										<p class="price">$450</p>
										<ul class="rating">
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star-o"></i></li>
											<li><i class="fa fa-star-o"></i></li>
										</ul>
									</div>

									<div class="most-viewed-property">
										<div class="image">
											<a href="single.html">
												<img src="img/most-viewed-prop-2.jpg" alt="most viewed" />
											</a>
										</div>
										<h2><a href="single.html">Golden vip room</a></h2>
										<p class="price">$450</p>
										<ul class="rating">
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star-o"></i></li>
											<li><i class="fa fa-star-o"></i></li>
										</ul>
									</div>

									<div class="most-viewed-property">
										<div class="image">
											<a href="single.html">
												<img src="img/most-viewed-prop-1.jpg" alt="most viewed" />
											</a>
										</div>
										<h2><a href="single.html">Grand hotel</a></h2>
										<p class="price">$450</p>
										<ul class="rating">
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star-o"></i></li>
											<li><i class="fa fa-star-o"></i></li>
										</ul>
									</div>

									<div class="most-viewed-property">
										<div class="image">
											<a href="single.html">
												<img src="img/most-viewed-prop-2.jpg" alt="most viewed" />
											</a>
										</div>
										<h2><a href="single.html">Golden vip room</a></h2>
										<p class="price">$450</p>
										<ul class="rating">
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="footer-widget widget_contact">
								<h4 class="widget-title">Contact info</h4>

								<div class="widget-body">
									<ul class="contact-info">
										<li class="phone">
											<p>012 125 856 587</p>
										</li>
										<li class="mail">
											<p><a href="#">Info@realtor.com</a></p>
										</li>
										<li class="location">
											<p>Realtor office<br />22 Pink Road<br />Holliday city, La 2211</p>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="copyrigts">
					<p>Copyrights 2015. Designed by <a href="https://www.teslathemes.com" target="blank">TeslaThemes</a></p>
				</div>
			</div>
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