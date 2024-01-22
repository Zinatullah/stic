<?php

isset($_COOKIE['language_mode']) ? $_COOKIE['language_mode'] : setcookie('language_mode', 'en', time() + (86400 * 1), "/");


if (!isset($_COOKIE['loggedIn'])) {
	header('location: ./login.php');
}


if (isset($_GET['registered'])) {
	$message = "You have previously filled in the form!!!";
	echo "<script>alert('$message');</script>";
}


$display = 'none';
if (isset($_COOKIE['loggedIn'])) {
	$display = 'block';
}


?>
<!doctype html>
<html class="no-js" lang="zxx">

<!-- <head style=""> -->

<head>
	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="Site keywords here">
	<meta name="description" content="">
	<meta name='copyright' content=''>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Title -->
	<title>STI</title>

	<!-- Favicon -->
	<link rel="icon" href="img/favicon.png">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Nice Select CSS -->

	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/nunito-font.css">
	<!-- Main Style Css -->
	<link rel="stylesheet" href="css/style.css" />

	<link rel="stylesheet" href="css/nice-select.css">
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- icofont CSS -->
	<link rel="stylesheet" href="css/icofont.css">
	<!-- Slicknav -->
	<link rel="stylesheet" href="css/slicknav.min.css">
	<!-- Owl Carousel CSS -->
	<link rel="stylesheet" href="css/owl-carousel.css">
	<!-- Datepicker CSS -->
	<link rel="stylesheet" href="css/datepicker.css">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="css/animate.min.css">
	<!-- Magnific Popup CSS -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Medipro CSS -->
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/responsive.css">

	<!-- Alpine JS  -->
	<script src="js/alpinejs.js" defer></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
	<script src="js/intlTelInput.min.js"></script>

</head>

<body style="overflow: hidden; padding-right: 17px;" class="modal-open" data-bs-overflow="hidden" data-bs-padding-right="17px">
	<!-- <body  style="overflow: hidden; padding-right: 17px;" class="modal-open" data-bs-overflow="hidden" data-bs-padding-right="17px"> -->

	<!-- Preloader -->
	<div class="preloader preloader-deactivate">
		<div class="loader">
			<div class="loader-outter"></div>
			<div class="loader-inner"></div>

			<div class="indicator">
				<svg width="16px" height="12px">
					<polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
					<polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
				</svg>
			</div>
		</div>
	</div>
	<header class="header">
		<!-- Topbar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-5 col-12">
						<!-- Contact -->
						<ul class="top-link">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Join</a></li>
							<li><a href="#">Contact</a></li>
							<li><a href="#">FAQ</a></li>
						</ul>
						<!-- End Contact -->
					</div>
					<div class="col-lg-6 col-md-7 col-12">
						<!-- Top Contact -->
						<ul class="top-contact">
							<li><i class="fa fa-phone"></i>+46 72171 3488</li>
							<li><i class="fa fa-envelope"></i><a href="mailto:support@yourmail.com">rdi@aogc.gov.af</a></li>
						</ul>
						<!-- End Top Contact -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Topbar -->
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-1 col-md-1 col-12">
							<!-- Start Logo -->
							<div class="logo">
								<a href="index.php"><img src="img/logo.png" alt="#"></a>
							</div>
							<!-- End Logo -->
							<!-- Mobile Nav -->
							<div class="mobile-nav"></div>
							<!-- End Mobile Nav -->
						</div>

						<div class="col-lg-11 col-md-11 col-12">
							<!-- Main Menu -->
							<div class="main-menu">
								<nav class="navigation">
									<ul class="nav menu">
										<li class=""><a href="#">About Us <i class="icofont-rounded-down"></i></a>
											<ul class="dropdown">
												<li><a href="index.php">What is STI Commission?</a></li>
												<li><a href="index.php">How we work?</a></li>
												<!-- <li><a href="index.php">What we aim for?</a></li> -->
												<!-- <li><a href="index.php">Why to join us?</a></li> -->
											</ul>
										</li>
										<li><a href="#">Join Us <i class="icofont-rounded-down"></i></a>
											<ul class="dropdown">
												<li><a data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="mainform.php">Fill the form to join us</a></li>
											</ul>
										</li>
										<!-- <li><a href="#">Resources <i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="index.php">Documents/Reports</a></li>
                                                <li><a href="index.php">Statistics/Figures</a></li>
                                                <li><a href="index.php">Strategic plans</a></li>
                                                <li><a href="index.php">Documentaries</a></li>
                                                <li><a href="index.php">Multimedia contents</a></li>
                                            </ul>
                                        </li> -->

										<!-- COP section -->
										<li><a href="#">Communities of Practice<i class="icofont-rounded-down"></i></a>
											<ul class="dropdown">
												<!-- <li><a href="index.php">CoPs within identified industries/sectors</a></li>
                                                <li><a href="index.php">Sign In within assigned CoPs</a></li>
                                                <li><a href="index.php">Chatrooms/forums within Cops</a></li>
                                                <li><a href="index.php">Document sharing within CoPs</a></li> -->
											</ul>
										</li>

										<!-- Login section -->

										<?php

										$display_signin = $display == 'none' ? 'block' : 'none';

										?>
										<li style="display: <?php echo $display_signin ?>;"><a href="login.php">Sgin in/up</a>
											<!-- <li style="display: <?php echo $display_signin ?>;"><a href="#">Sign In<i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="login.php">Sign In for existing users</a></li> -->
											<!-- <li><a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Sign up for new users</a></li> -->
											<!-- <li><a href="external_verify.php">Verify the email address</a></li> -->
											<!-- </ul> -->
											<!-- </li> -->

										<li><a href="#">News and Updates</a>
											<!-- <ul class="dropdown">
                                                <li><a href="index.php">Google Map</a></li>
                                                <li><a href="index.php">Address</a></li>
                                                <li><a href="index.php">Email</a></li>
                                                <li><a href="index.php">Phone</a></li>
                                                <li><a href="index.php">Contact/Feedback Form</a></li>
                                            </ul> -->
										</li>

										<!-- Contact section -->
										<li><a href="#">Contacts Us<i class="icofont-rounded-down"></i></a>
											<ul class="dropdown">
												<li><a href="index.php">Google Map</a></li>
												<li><a href="index.php">Address</a></li>
												<li><a href="index.php">Email</a></li>
												<li><a href="index.php">Phone</a></li>
												<li><a href="index.php">Contact/Feedback Form</a></li>
											</ul>
										</li>

										<li>
											<a href="#">
												<span>
													<svg width="25" height="25" viewBox="0 0 64 64" xml:space="preserve">
														<path fill="none" stroke="#000" stroke-width="2" stroke-miterlimit="10" d="M32.001.887C49.185.887 63.114 14.816 63.113 32 63.114 49.185 49.184 63.115 32 63.113 14.815 63.114.887 49.185.888 32.001.885 14.816 14.815.887 32.001.887zM32 1v62m31-31H1" />
														<path fill="none" stroke="#000" stroke-width="2" stroke-miterlimit="10" d="M30 1S16 12 16 32s14 31 14 31m4-62s14 11 14 31-14 31-14 31" />
														<path fill="none" stroke="#000" stroke-width="2" stroke-miterlimit="10" d="M8 12s5 10 24 10 24-10 24-10M8 52s5-10 24-10 24 10 24 10" />
													</svg>
												</span>
											</a>
											<ul class="dropdown" style="width: 150px; margin-top:10px">
												<li><a href="index.php">English</a></li>
												<li><a href="index.php">Pashto</a></li>
												<li><a href="index.php">Persian</a></li>
											</ul>
										</li>

										<!-- Contact section -->
										<li style="display: <?php echo $display ?>;">
											<a href="#" style="position:absolute; left: 50px">
												<svg height="25" width="25" viewBox="0 0 448 512" fill="black" style="border: 2px solid black; border-radius: 50%; padding: 2px">
													<path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
												</svg>
											</a>
											<ul class="dropdown" style="width: 150px">
												<li><a href="filled_form.php">Profile</a></li>
												<!-- <li><a href="index.php">Form</a></li> -->
												<li><a href="backend/logout.php">logout</a></li>
											</ul>
										</li>
									</ul>
								</nav>
							</div>
							<!--/ End Main Menu -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<section class="slider">
		<div class="hero-slider">
			<!-- Start Single Slider -->
			<div class="single-slider" style="background-image:url('img/Banner 7.jpg')">
				<div class="container">
					<div class="row">
						<div class="col-lg-7">
							<div class="text">
								<h1 style="font-family: Garamond">Join us to do it together …</h1>
								<div class="button">
									<!-- <a href="#" class="btn">Get Appointment</a>
									<a href="#" class="btn primary">Learn More</a> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Single Slider -->
			<!-- Start Single Slider -->

			<!-- Start End Slider -->
			<!-- Start Single Slider -->
			<div class="single-slider" style="background-image:url('img/Banner 7.jpg')">
				<div class="container">
					<div class="row">
						<div class="col-lg-7">
							<div class="text">
								<h1 style="font-family: Garamond">Join us to do it together …</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Single Slider -->
		</div>
	</section>

	<div class="modal fade show" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-modal="true" role="dialog" style="display: block;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="display: block;">
					<!-- <h3 class="modal-title fs-5" id="staticBackdropLabel" style="text-align: center;">Contribution</h3> -->
				</div>
				<div class="modal-body">
					Are you willing to contribute within your professional capacity in the national reconstruction of Afghanistan?
				</div>
				<div class="modal-footer">
					<a href="./index.php">
						<button style="padding: 5px; width:50px" type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
					</a>
					<a href="./login.php">
						<button style="padding: 5px; width: 50px;" type="button" class="btn btn-primary">Yes</button>
					</a>
				</div>
			</div>
		</div>
	</div>



	<!-- Footer Area -->
	<footer id="footer" class="footer ">
		<!-- Footer Top -->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-footer">
							<h2>About Us</h2>
							<p>Lorem ipsum dolor sit am consectetur adipisicing elit do eiusmod tempor incididunt ut labore dolore magna.</p>
							<!-- Social -->
							<ul class="social">
								<li><a href="#"><i class="icofont-facebook"></i></a></li>
								<li><a href="#"><i class="icofont-google-plus"></i></a></li>
								<li><a href="#"><i class="icofont-twitter"></i></a></li>
								<li><a href="#"><i class="icofont-vimeo"></i></a></li>
								<li><a href="#"><i class="icofont-pinterest"></i></a></li>
							</ul>
							<!-- End Social -->
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-footer f-link">
							<h2>Quick Links</h2>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-12">
									<ul>
										<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Home</a></li>
										<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>About Us</a></li>
										<!-- <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Services</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Our Cases</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Other Links</a></li>	 -->
									</ul>
								</div>
								<div class="col-lg-6 col-md-6 col-12">
									<ul>
										<!-- <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Consuling</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Finance</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Testimonials</a></li> -->
										<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>FAQ</a></li>
										<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Contact Us</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-footer">
							<h2>Open Hours</h2>
							<!-- <p>Lorem ipsum dolor sit ame consectetur adipisicing elit do eiusmod tempor incididunt.</p> -->
							<ul class="time-sidual">
								<li class="day">Monday - Fridayp <span>8.00-20.00</span></li>
								<li class="day">Saturday <span>9.00-18.30</span></li>
								<li class="day">Monday - Thusday <span>9.00-15.00</span></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<div class="single-footer">
							<h2>Newsletter</h2>
							<p>subscribe to our newsletter to get allour news in your inbox.. Lorem ipsum dolor sit amet, consectetur adipisicing elit,</p>
							<!-- <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
									<input name="email" placeholder="Email Address" class="common-input" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Your email address'" required="" type="email">
									<button class="button"><i class="icofont icofont-paper-plane"></i></button>
								</form> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Footer Top -->
		<!-- Copyright -->
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-12">
						<div class="copyright-content">
							<p>© Copyright 2023 | All Rights Reserved by <a href="https://aogc.gov.af" target="_blank">AOGC</a> </p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Copyright -->
	</footer>
	<!--/ End Footer Area -->

	<!-- jquery Min JS -->
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<!-- jquery Migrate JS -->
	<script src="js/jquery-migrate-3.0.0.js"></script>
	<!-- jquery Ui JS -->
	<script src="js/jquery-ui.min.js"></script>
	<!-- Easing JS -->
	<script src="js/easing.js"></script>
	<!-- Color JS -->
	<script src="js/colors.js"></script>
	<!-- Popper JS -->
	<script src="js/popper.min.js"></script>
	<!-- Bootstrap Datepicker JS -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Jquery Nav JS -->
	<script src="js/jquery.nav.js"></script>
	<!-- Slicknav JS -->
	<script src="js/slicknav.min.js"></script>
	<!-- ScrollUp JS -->
	<script src="js/jquery.scrollUp.min.js"></script>
	<!-- Niceselect JS -->
	<script src="js/niceselect.js"></script>
	<!-- Tilt Jquery JS -->
	<script src="js/tilt.jquery.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="js/owl-carousel.js"></script>
	<!-- counterup JS -->
	<script src="js/jquery.counterup.min.js"></script>
	<!-- Steller JS -->
	<script src="js/steller.js"></script>
	<!-- Wow JS -->
	<script src="js/wow.min.js"></script>
	<!-- Magnific Popup JS -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<!-- Counter Up CDN JS -->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Main JS -->
	<script src="js/main.js"></script>


	<!-- JQUERY -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/own.js"></script>
	<script src="js/filled_form.js"></script>


	<script>
		const phoneInputField = document.querySelector("#phone");
		const phoneInput = window.intlTelInput(phoneInputField, {
			utilsScript: "js/utils.js",
		});

		const phoneInputField1 = document.querySelector("#phone1");
		const phoneInput1 = window.intlTelInput(phoneInputField1, {
			utilsScript: "js/utils.js",
		});
	</script>

	<script>
		$('.iti__country-list').eq(0).addClass('first');
		$('.first').children().addClass('contact');

		$('.iti__country-list').eq(1).addClass('second');
		$('.second').children().addClass('ref_contact');

		$(document).ready(function() {
			$(document).on("click", ".contact", function() {
				var dialCode = $(this).attr("data-dial-code"); // Get the dial code from the clicked element
				$("#phone").val('+' + dialCode);
			});
		});

		$(document).ready(function() {
			$(document).on("click", "contact", function() {
				var dialCode = $(this).attr("data-dial-code"); // Get the dial code from the clicked element
				$("#phone2").val('+' + dialCode);
			});
		});

		$(document).ready(function() {
			$(document).on("click", ".ref_contact", function() {
				var dialCode = $(this).attr("data-dial-code"); // Get the dial code from the clicked element
				$("#phone1").val('+' + dialCode);

			});
		});
	</script>



	<div class="modal-backdrop fade show"></div>
</body>