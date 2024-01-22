<?php

if (isset($_GET['registered'])) {
	$message = "You have previously filled in the form!!!";
	echo "<script>alert('$message');</script>";
}


?>


<?php include('./components/header.php') ?>


<div class="container" style="height: 5px; background: blue; border-radius: 10px; margin-bottom: 30px"></div>

<!-- Start Feautes -->
<section class="Feautes section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title" style="padding: 0px !important;">
					<p style="font-family: Garamond; text-align: <?php echo $lng != "en" ? 'right' : 'left' ?>; font-size:18pt; margin: 0;font-weight: bolder; color:black; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>">
						<?php echo $how_we_work_page_header_1 ?>
					</p>
					<p style="text-align: justify; font-size: 12pt; color: black; font-family: 'Times New Roman'; margin-top: 5px; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>">
						<?php echo $how_we_work_page_paragraph_1 ?>

					</p>
					<!-- <br />
					<h2 style="font-family: Garamond; font-size:14pt; text-align: left; margin-bottom: 0px">
						<b>Diversity & Inclusion</b>
					</h2>
					<p style="text-align: justify; font-size: 12pt; color: black; font-family: 'Times New Roman'; margin-top: 5px">
						We actively engage and facilitate all the potential contributors regardless of their gender, language, color, race, sect, religion, and political affiliations. For us, the only mission is to serve the Afghan nation and to help developing an innovation-led sustainable economy and society.
					</p> -->
					<br />
					<p style="font-family: Garamond; text-align: <?php echo $lng != "en" ? 'right' : 'left' ?>; font-size:18pt; margin: 0;font-weight: bolder; color:black; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>">
						<?php echo $how_we_work_page_header_2 ?>
					</p>
					<p style="text-align: justify;  direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>; font-size: 12pt; color: black; font-family: 'Times New Roman'; margin-top: 5px">
						<?php echo $how_we_work_page_paragraph_2 ?>
					</p>

					<br />
					<p style="font-family: Garamond; text-align: <?php echo $lng != "en" ? 'right' : 'left' ?>; font-size:18pt; margin: 0;font-weight: bolder; color:black; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>">
						<?php echo $how_we_work_page_header_3 ?>
					</p>
					<p style="text-align: justify; font-size: 12pt; color: black; font-family: 'Times New Roman'; margin-top: 5px; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>">
						<?php echo $how_we_work_page_paragraph_3 ?>
					</p>

					<br />
					<p style="font-family: Garamond; text-align: <?php echo $lng != "en" ? 'right' : 'left' ?>; font-size:18pt; margin: 0;font-weight: bolder; color:black; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>">
						<?php echo $how_we_work_page_header_4 ?>
					</p>
					<p style="text-align: justify; font-size: 12pt; color: black; font-family: 'Times New Roman'; margin-top: 5px; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>">
						<?php echo $how_we_work_page_paragraph_4 ?>
					</p>

					<br />
					<p style="font-family: Garamond; text-align: <?php echo $lng != "en" ? 'right' : 'left' ?>; font-size:18pt; margin: 0;font-weight: bolder; color:black; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>">
						<?php echo $how_we_work_page_header_5 ?>
					</p>
					<p style="text-align: justify; font-size: 12pt; color: black; font-family: 'Times New Roman'; margin-top: 5px; direction: <?php echo $lng != "en" ? 'rtl' : 'ltr' ?>">
						<?php echo $how_we_work_page_paragraph_5 ?>
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