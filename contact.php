<?php

if (isset($_GET['thankyou'])) {
	$message = "Thank you for your feedback!";
	echo "<script>alert('$message');</script>";
}

?>

<?php include('./components/header.php') ?>
<!-- Breadcrumbs -->
<div class="breadcrumbs overlay">
	<div class="container">
		<div class="bread-inner">
			<div class="row">
				<div class="col-12">
					<p style="color: white; font-family: garamond; font-size: 25pt !important;"><?php echo $contact_page_head ?></p>
					<ul class="bread-list">
						<!-- <li><a href="index.html">Home</a></li>
								<li><i class="icofont-simple-right"></i></li>
								<li class="active">Contact Us</li> -->
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Contact Us -->
<section class="contact-us section" style="padding: 0px; margin-top: 20px; margin-bottom: 100px">
	<div class="container">
		<div class="inner">
			<div class="row">
				<div class="col-lg-6">
					<div class="contact-us-left">
						<!--Start Google-map -->
						<div>
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.7274420538884!2d69.0863233!3d34.58576250000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38d16592f96d02eb%3A0x720487f7e86fc2cc!2z2K8g2YbZgdiq2Ygg2KfZiCDaq9in2LLZiCDYr9mI2YTYqtmKINi02LHaqdiq!5e0!3m2!1sen!2s!4v1704952726483!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>

						<!--/End Google-map -->
					</div>
				</div>
				<div class="col-lg-6">
					<div class="contact-us-form">
						<p style="font-size: 25pt !important; font-family: garamond; text-align: <?php echo $lng != "en" ? 'right' : 'left' ?>;">
							<?php echo $contact_middle_head ?>
						</p>
						<p style="font-family:'Times New Roman'; margin-top: -20px; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>; text-align: <?php echo $lng != "en" ? 'right' : 'left' ?>;">
							<?php echo $contact_middle_paragraph ?>
						</p>
						<!-- Form -->
						<form class="form" method="post" action="./backend/contact.php">
							<div class="row">
								<div class="col-lg-6">
									<input type="text" name="name" placeholder="Name" required="" class="form-control" style="height: 50px; padding-left: 5px; margin-top: 15px">
								</div>
								<div class="col-lg-6">

									<input type="email" name="email" placeholder="Email" required="" class="form-control" style="height: 50px; padding-left: 5px; margin-top: 15px">

								</div>
								<div class="col-lg-6">

									<input type="text" name="phone" placeholder="Phone" required="" class="form-control" style="height: 50px; padding-left: 5px; margin-top: 15px">
								</div>
								<div class="col-lg-6">

									<input type="text" name="subject" placeholder="Subject" required="" class="form-control" style="height: 50px; padding-left: 5px; margin-top: 15px">
								</div>
								<div class="col-lg-12">
									<textarea style="margin-top: 15px" name="message" placeholder="Your Message" required="" class="form-control"></textarea>
								</div>
								<div class="col-12">
									<div class="form-group login-btn">
										<button class="btn" type="submit" name="submit" style="margin-top: 15px">Send</button>
									</div>
									<!-- <div class="checkbox">
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">Do you want to subscribe our Newsletter ?</label>
									</div> -->
								</div>
							</div>
						</form>
						<!--/ End Form -->
					</div>
				</div>
			</div>
		</div>
		<div class="contact-info">
			<div class="row">
				<!-- single-info -->
				<div class="col-lg-4 col-12 ">
					<div class="single-info">
						<i class="icofont icofont-ui-call"></i>
						<div class="content">
							<h3 style="font-family: garamond;" class="text-center">+93 79 592 5750</h3>
							<p style="font-family: garamond;" class="text-center">stic@aogc.gov.af</p>
						</div>
						<p class="text-center" style="font-family: garamond; position: absolute; color:white; bottom:20px; left:30px; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>; text-align: <?php echo $lng != "en" ? 'right' : 'left' ?>;"><?php echo $en_ps_contact ?></p>
					</div>
				</div>
				<!--/End single-info -->
				<!-- single-info -->
				<div class="col-lg-4 col-12 ">
					<div class="single-info">
						<i class="icofont icofont-ui-call"></i>
						<div class="content">
							<h3 style="font-family: garamond;" class="text-center">+93 78 001 6052</h3>
							<p style="font-family: garamond;" class="text-center">stic@aogc.gov.af</p>
						</div>
						<p class="text-center" style="font-family: garamond; position: absolute; color:white; bottom:20px; left:30px; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>; text-align: <?php echo $lng != "en" ? 'right' : 'left' ?>;"><?php echo $en_dr_contact ?></p>
					</div>
				</div>
				<!--/End single-info -->
				<!-- single-info -->
				<div class="col-lg-4 col-12 ">
					<div class="single-info">
						<i class="icofont-google-map"></i>
						<div class="content">
							<h5 class="text-center" style="font-family:garamond; font-weight: 500; color: white"><?php echo $footer_location_head ?></h5>
						</div>
						<p class="text-center" style=" font-family:garamond; font-size: 13px; position: absolute; color:white; bottom:20px; left:30px"><?php echo $footer_location_paragraph ?></p>
					</div>
				</div>
				<!--/End single-info -->
			</div>
		</div>
	</div>
</section>
<!--/ End Contact Us -->
<?php include('./components/contribution.php') ?>

<?php include('./components/footer.php') ?>