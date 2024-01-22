<?php

if (isset($_GET['registered'])) {
	$message = "You have previously filled in the form!!!";
	echo "<script>alert('$message');</script>";
}


?>


<?php include('./components/header.php') ?>
<section class="slider">
	<div class="hero-slider">
		<!-- Start Single Slider -->
		<div class="single-slider" style="background-image:url('img/Banner 8.avif')">
			<div class="container">
				<div class="row">
					<div class="col-lg-7">
						<div class="text">
							<h1 style="color: white; font-family: Garamond">A nation in the making …</h1>
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
		<div class="single-slider" style="background-image:url('img/Banner 2.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-lg-7">
						<div class="text">
							<h1 style="font-family: Garamond">With a rising hope …</h1>
							<div class="button">
								<!-- <a href="#" class="btn">Get Appointment</a> -->
								<!-- <a href="#" class="btn primary">About Us</a> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Start End Slider -->
		<!-- Start Single Slider -->
		<div class="single-slider" style="background-image:url('img/Banner 3.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-lg-7">
						<div class="text">
							<h1 style="color: white; font-family: Garamond">For a better life …</h1>
							<div class="button">
								<!-- <a href="#" class="btn">Get Appointment</a>
									<a href="#" class="btn primary">Conatct Now</a> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="single-slider" style="background-image:url('img/Banner 4.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-lg-7">
						<div class="text">
							<h1 style="color: white; font-family: Garamond">With everyone’s participation …</h1>
							<div class="button">
								<!-- <a href="#" class="btn">Get Appointment</a>
									<a href="#" class="btn primary">Conatct Now</a> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="single-slider" style="background-image:url('img/Banner 5.webp')">
			<div class="container">
				<div class="row">
					<div class="col-lg-7">
						<div class="text">
							<h2 style="color: black; font-weight:bolder; font-family: Garamond">With dedication and excellence …</h2>
							<div class="button">
								<!-- <a href="#" class="btn">Get Appointment</a>
									<a href="#" class="btn primary">Conatct Now</a> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="single-slider" style="background-image:url('img/Banner 6.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-lg-7">
						<div class="text">
							<h1 style="color: white; font-family: Garamond">For a sustainable future …</h1>
							<div class="button">
								<!-- <a href="#" class="btn">Get Appointment</a>
									<a href="#" class="btn primary">Conatct Now</a> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="single-slider" style="background-image:url('img/Banner 7.jpg')">
			<div class="container">
				<div class="row">
					<div class="col-lg-7">
						<div class="text">
							<h1 style="font-family: Garamond">Join us to do it together …</h1>
							<div class="button">
								<!-- <a href="#" class="btn">Get Appointment</a>
									<a href="#" class="btn primary">Conatct Now</a> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Single Slider -->
	</div>
</section>
<!--/ End Slider Area -->

<!-- Start Schedule Area -->
<section class="schedule" style="margin-top: 100px">
	<div class="container">
		<div class="schedule-inner">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-12 ">
					<div class="single-schedule first">
						<div class="inner">
							<div class="icon">
								<i class="fa fa-ambulance"></i>
							</div>
							<div class="single-content">
								<!-- <span>Lorem Amet</span> -->
								<h4>What is STI Commission?</h4>
								<p style="text-align: justify;">The Science, Technology, and Innovation (STI) Commission is a new unit established under the Ministry of Finance (MoF) and it is supervised ... </p>
								<a href="./What_is_STI_Commission.php">LEARN MORE<i class="fa fa-long-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="single-schedule middle">
						<div class="inner">
							<div class="icon">
								<i class="icofont-prescription"></i>
							</div>
							<div class="single-content">
								<!-- <span>Fusce Porttitor</span> -->
								<h4>How do we work?</h4>
								<p style="text-align: justify">The STI Commission organizes its operations through effectively capitalizing on the personal and professional networks ...</p>
								<a href="./how_do_we_work.php">LEARN MORE<i class="fa fa-long-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-12 col-12">
					<div class="single-schedule last">
						<div class="inner">
							<div class="icon">
								<i class="icofont-ui-clock"></i>
							</div>
							<div class="single-content">
								<!-- <span>Fusce Porttitor</span> -->
								<h4>Communities of Practice (COPs)</h4>
								<p style="text-align: justify">The registered competences and submitted project ideas shall be clustered under the relevant themes ...</p>
								<a href="./Communities_of_Practice.php">LEARN MORE<i class="fa fa-long-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/End Start schedule Area -->

<!-- Start Feautes -->
<section class="Feautes section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title" style="padding: 0px !important;">
					<h2>What is STI Commission?</h2>
					<!-- <img src="img/section-img.png" alt="#"> -->
					<p style="text-align: justify;">
						The Science, Technology, and Innovation (STI) Commission is a new unit established under the Ministry of Finance (MoF) and it is supervised by the R&D department of Afghan State Oil & Gas Corporation (AOGC). The purpose of establishing the STI Commission is to systematically search, register, and facilitate all the potential competences, resources, aspirations, and project ideas within the STI framework for the national reconstruction and sustainable economic & social development of Afghanistan. Any Afghan or non-Afghan residing in the country or living abroad may register their competences, interests, and project ideas through this platform to jointly explore the development prospects in all walks of life through sharing their scientific knowledge, technological applications, and innovative solutions.
					</p>
				</div>
			</div>
		</div>
		<!-- <div class="row">
			<div class="col-lg-4 col-12">
				<div class="single-features">
					<div class="signle-icon">
						<i class="icofont icofont-ambulance-cross"></i>
					</div>
					<h3>Emergency Help</h3>
					<p>Lorem ipsum sit, consectetur adipiscing elit. Maecenas mi quam vulputate.</p>
				</div>
			</div>
			<div class="col-lg-4 col-12">
				<div class="single-features">
					<div class="signle-icon">
						<i class="icofont icofont-medical-sign-alt"></i>
					</div>
					<h3>Enriched Pharmecy</h3>
					<p>Lorem ipsum sit, consectetur adipiscing elit. Maecenas mi quam vulputate.</p>
				</div>
			</div>
			<div class="col-lg-4 col-12">
				<div class="single-features last">
					<div class="signle-icon">
						<i class="icofont icofont-stethoscope"></i>
					</div>
					<h3>Medical Treatment</h3>
					<p>Lorem ipsum sit, consectetur adipiscing elit. Maecenas mi quam vulputate.</p>
				</div>
			</div>
		</div> -->
	</div>
	<!-- Button trigger modal -->
	<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
		Launch static backdrop modal
	</button> -->

	<!-- Modal -->
	<?php include('./components/contribution.php') ?>
	<!-- End Modal -->

</section>
<!--/ End Feautes -->

<?php include('./components/footer.php') ?>