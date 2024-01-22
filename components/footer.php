<!-- Footer Area -->
<footer id="footer" class="footer mt-5">
	<!-- Footer Top -->
	<!-- <div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<div class="single-footer">
						<h2><?php echo $about_us; ?></h2>
						<p>Lorem ipsum dolor sit am consectetur adipisicing elit do eiusmod tempor incididunt ut labore dolore magna.</p>
						Social
						<ul class="social">
							<li><a href="#"><i class="icofont-facebook"></i></a></li>
							<li><a href="#"><i class="icofont-google-plus"></i></a></li>
							<li><a href="#"><i class="icofont-twitter"></i></a></li>
							<li><a href="#"><i class="icofont-vimeo"></i></a></li>
							<li><a href="#"><i class="icofont-pinterest"></i></a></li>
						</ul>
						End Social
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<div class="single-footer f-link">
						<h2><?php echo $quick_links; ?></h2>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-12">
								<ul>
									<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i><?php echo $home; ?></a></li>
									<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i><?php echo $about_us; ?></a></li>
									<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Services</a></li>
									<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Our Cases</a></li>
									<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Other Links</a></li>
								</ul>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<ul>
									<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Consuling</a></li>
									<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Finance</a></li>
									<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Testimonials</a></li>
									<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i><?php echo $FAQ; ?></a></li>
									<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i><?php echo $contact_us; ?></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<div class="single-footer">
						<h2><?php echo $OpenـHours; ?></h2>
						<p>Lorem ipsum dolor sit ame consectetur adipisicing elit do eiusmod tempor incididunt.</p>
						<ul class="time-sidual">
							<li class="day"><?php echo $satureday; ?> - <?php echo $wednesday; ?> <span>8:00-16:00</span></li>
							<li class="day"><?php echo $thursday; ?> <span>8:00-13:30</span></li>
							<li class="day">Monday - Thusday <span>9.00-15.00</span></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<div class="single-footer">
						<h2><?php echo $Newsletter; ?></h2>
						<p>
							<?php echo $Newsletter; ?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!--/ End Footer Top -->
	<!-- Copyright -->
	 <!-- <div class="footer-top" style="height: 0px !important"></div> -->
	<div class="copyright" style="position: absolute; bottom:0px; width: 100%">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-12">
					<div class="copyright-content">
						<p style="direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>;">
							<?php echo $copyright ?>
							<a href="https://aogc.gov.af" target="_blank">AOGC</a>
						</p>
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
<!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script> -->
<!-- Bootstrap JS -->
<script src="js/bootstrap.min.js"></script>
<!-- Main JS -->
<script src="js/main.js"></script>



<!-- JQUERY -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/own_js"></script>
<script src="js/filled_form_2.js"></script>

<script src="js/refre_1.js"></script>
<script src="js/edit_1.js"></script>
<script src="js/screen_1.js"></script>

<script>
	if ($('#phone').length) {
		const phoneInputField = document.querySelector("#phone");
		const phoneInput = window.intlTelInput(phoneInputField, {
			utilsScript: "js/utils.js",
		});
	}


	if ($('#phone1').length) {
		const phoneInputField1 = document.querySelector("#phone1");
		const phoneInput1 = window.intlTelInput(phoneInputField1, {
			utilsScript: "js/utils.js",
		});
	}
	if ($('#phone2').length) {
		const phoneInputField2 = document.querySelector("#phone2");
		const phoneInput2 = window.intlTelInput(phoneInputField2, {
			utilsScript: "js/utils.js",
		});
	}

	if ($('#phone3').length) {
		const phoneInputField3 = document.querySelector("#phone3");
		const phoneInput3 = window.intlTelInput(phoneInputField3, {
			utilsScript: "js/utils.js",
		});
	}

	if ($('#phone4').length) {
		const phoneInputField4 = document.querySelector("#phone4");
		const phoneInput4 = window.intlTelInput(phoneInputField4, {
			utilsScript: "js/utils.js",
		});
	}

	if ($('#phone5').length) {
		const phoneInputField5 = document.querySelector("#phone5");
		const phoneInput5 = window.intlTelInput(phoneInputField5, {
			utilsScript: "js/utils.js",
		});
	}
</script>

<script>
	$('.iti__country-list').eq(0).addClass('first');
	$('.first').children().addClass('contact');

	$('.iti__country-list').eq(1).addClass('second');
	$('.second').children().addClass('ref_contact');

	$('.iti__country-list').eq(2).addClass('third');
	$('.third').children().addClass('ref_contact_1');

	$(document).ready(function() {
		$(document).on("click", ".contact", function() {
			var dialCode = $(this).attr("data-dial-code"); // Get the dial code from the clicked element
			$("#phone").val('+' + dialCode);
		});
	});

	$(document).ready(function() {
		$(document).on("click", ".ref_contact", function() {
			var dialCode = $(this).attr("data-dial-code"); // Get the dial code from the clicked element
			$("#phone1").val('+' + dialCode);
		});
	});


	$(document).ready(function() {
		$(document).on("click", ".ref_contact_1", function() {
			var dialCode = $(this).attr("data-dial-code"); // Get the dial code from the clicked element
			$("#phone2").val('+' + dialCode);
		});
	});
</script>


</body>

</html>