<?php

if (isset($_GET['registered'])) {
	$message = "You have previously filled in the form!!!";
	echo "<script>alert('$message');</script>";
}


if (!isset($_COOKIE['language_mode'])) {
	setcookie("language_mode", 'en', time() + (86400 * 1), "/");
}


?>


<?php include('./components/header.php') ?>
<section class="slider">
	<div class="hero-slider">
		<!-- Start Single Slider -->
		<div  class="single-slider" style="background-image:url('img/Banner 1.png');">
			<div class="container">
				<div class="row">
					<div class="col-lg-7">
						<div class="text">
							<h1 style="color: white; font-weight:100; font-family: Garamond; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>;"><?php echo $banner1; ?></h1>
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
							<h1 style="font-weight:100; font-family: Garamond; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>;"><?php echo $banner2; ?></h1>
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
							<h1 style="font-weight:100; color: white; font-family: Garamond; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>;"><?php echo $banner3; ?></h1>
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
							<h1 style="font-weight:100; color: white; font-family: Garamond; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>;"><?php echo $banner4; ?></h1>
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
							<h2 style="font-weight:100; color: black; font-family: Garamond; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>;"><?php echo $banner5; ?></h2>
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
							<h1 style="font-weight:100; color: white; font-family: Garamond; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>;"><?php echo $banner6; ?></h1>
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
							<h1 style="font-weight:100; font-family: Garamond; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>;"><?php echo $banner7; ?></h1>
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
							<div class="single-content" style="text-align: <?php echo $lng != "en" ? 'right' : 'left' ?>;">
								<!-- <span>Lorem Amet</span> -->
								<h4 style="font-family:garamond; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>; color: white; text-align: <?php echo $lng != "en" ? 'right' : 'left' ?>;">
									<?php echo $What_is_STI_Commission_header ?>
								</h4>
								<p style="text-align: <?php echo $lng != "en" ? 'right' : 'left' ?>; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>"><?php echo $badge1 ?> </p>
								<a href="./What_is_STI_Commission.php"><?php echo $learn_more ?><i class="fa fa-long-arrow-right"></i></a>
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
							<div class="single-content" style="text-align: <?php echo $lng != "en" ? 'right' : 'left' ?>;">
								<!-- <span>Lorem Amet</span> -->
								<h4 style="font-family:garamond; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>; color: white; text-align: <?php echo $lng != "en" ? 'right' : 'left' ?>;">
									<?php echo $how_we_work_page_header_1 ?>

								</h4>
								<p style="text-align: <?php echo $lng != "en" ? 'right' : 'left' ?>; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>"><?php echo $badge3 ?> </p>
								<a href="./how_do_we_work.php"><?php echo $learn_more ?><i class="fa fa-long-arrow-right"></i></a>
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
							<div class="single-content" style="text-align: <?php echo $lng != "en" ? 'right' : 'left' ?>;">
								<!-- <span>Lorem Amet</span> -->
								<h4 style="font-family:garamond;direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>; color: white; text-align: <?php echo $lng != "en" ? 'right' : 'left' ?>;"><?php echo $CommunitiesـofـPractice_head ?></h4>
								<p style="text-align: <?php echo $lng != "en" ? 'right' : 'left' ?>; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>"><?php echo $badge2 ?> </p>
								<a href="./Communities_of_Practice.php"><?php echo $learn_more ?><i class="fa fa-long-arrow-right"></i></a>
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
					<p style="font-size: 18pt;font-weight: bolder;color: black; font-family:garamond; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>;">
						<?php echo $What_is_STI_Commission_header ?>
					</p>
					<!-- <img src="img/section-img.png" alt="#"> -->
					<p style="text-align: justify; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>;">
						<?php echo $What_is_STI_Commission_paragraph ?>
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