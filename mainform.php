<?php

header('Content-Type: text/html; charset=utf-8');

if (!isset($_COOKIE['loggedIn'])) {
	header('location: ./login.php?user_not_logged_in');
}

$connection = mysqli_connect('localhost', 'akrami', 'afghan', 'sti');
$connection->set_charset("utf8");

$provinces = 'SELECT * FROM `z_countries`';
$result = mysqli_query($connection, $provinces);
$data_country = mysqli_fetch_all($result);

$districts = 'SELECT * FROM `z_provinces`';
$result1 = mysqli_query($connection, $districts);
$provinces_data = mysqli_fetch_all($result1);

$profession = 'SELECT * FROM `z_profession` ORDER by name';
$profession_result = mysqli_query($connection, $profession);
$profession_data = mysqli_fetch_all($profession_result);

$sectors = 'SELECT * FROM `z_sectors` ORDER by name';
$sectors_result = mysqli_query($connection, $sectors);
$sectors_data = mysqli_fetch_all($sectors_result);




if (isset($_COOKIE['loggedIn'])) {
	$email = $_COOKIE['loggedIn'];
	$pre_data_query = 'SELECT * FROM `main_form` where email ="' . $email . '"';
	$pre_result = mysqli_query($connection, $pre_data_query);
	$pre_data = mysqli_fetch_row($pre_result);

	if (mysqli_num_rows($pre_result) > 0) {
		header('location: ./filled_form.php');
	}
}

include('./components/header.php')

?>

<div class="container" style="background-color: blue; min-height: 50px; border-radius: 10px"></div>
<section class="contact-us section">
	<div class="container">
		<div class="inner">
			<div class="row">
				<div class="col-lg-12">
					<div class="contact-us-form">
						<h2 style="font-family:garamond; text-align: center;">Registeration form</h2>

						<!-- Form Start -->

						<form class="form" method="post" action="backend/form.php" enctype="multipart/form-data">

							<!-- Personal Information section -->
							<div class="row col-lg-12" style="margin-top: -50px;">
								<span style="background: purple;color: white;width: 220px;height: 30px;margin-left: 20px;padding:5px; font-size: 18px; font-weight:100" class="badge mt-5 text-bg-success">Personal Information</span>
								<div style="width: 96%; margin-left: 2%; border: 1px solid black; text-align: center"></div>

								<div class="col-lg-6">
									<input class="form-control p-2 m-2" type="text" name="first_name" placeholder="First Name *" required="">
								</div>
								<div class="col-lg-6">
									<input class="form-control p-2 m-2" type="text" name="last_name" placeholder="Last Name *" required="">
								</div>

								<div class="col-lg-6">
									<input placeholder="Date of birth *" name="date_of_birth" class="textbox-n form-control p-2 m-2 input_color" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" required />
								</div>

								<div class="col-lg-6">
									<select name="birth_country" class="form-control p-2 m-2 input_color" style="height: 42px; color: gray !important" required aria-placeholder="CHECK">
										<option class="input_color" value="" selected>Country (Birth) *</option>
										<?php foreach ($data_country as $value) { ?>
											<option value="<?php echo $value[2] ?>">
												<?php echo $value[2] ?>
											</option>
										<?php } ?>
									</select>
								</div>

								<div class="col-lg-6">

									<select name="nationality" class="form-control p-2 m-2" style="height: 42px;  color: gray !important" required>
										<option value="" class="nice-select hidden" selected disabled>Nationality *</option>
										<?php foreach ($data_country as $value) { ?>
											<option value='<?php echo $value[3]; ?>'>
												<?php echo $value[3] ?>
											</option>
										<?php } ?>
									</select>
								</div>

								<div class="col-lg-6">

									<select name="nationality_second" class="form-control p-2 m-2" style="height: 42px;  color: gray !important" required>
										<option class="nice-select hidden" selected>Second Nationality</option>
										<?php foreach ($data_country as $value) { ?>
											<option value="<?php echo $value[3] ?>">
												<?php echo $value[3] ?>
											</option>
										<?php } ?>
									</select>
								</div>
								<div class="col-lg-6">

									<select name="residential_country" id="residential_country" class="form-control p-2 m-2" style="height: 42px; color: gray !important" required>
										<option value="" class="nice-select hidden" selected disabled>Residential Country *</option>
										<?php foreach ($data_country as $value) { ?>
											<option value="<?php echo $value[2] ?>	">
												<?php echo $value[2] ?>
											</option>
										<?php } ?>
									</select>
								</div>

								<div class="col-lg-6">
									<input class="form-control p-2 m-2" type="text" name="district" placeholder="City *" required>
								</div>

								<!-- Afghan Origion -->
								<div class="col-lg-6">
									<div class="form-check form-switch" style="margin-top: 10px; margin-left: 30px;">
										<input name="afghan_check" style="width: 20px; height: 20px;" class="form-check-input" type="checkbox" role="switch" id="showHideCheckbox">
										<label class="form-check-label" for="showHideCheckbox" style="color:black; font-size:16px; margin-top: 3px">Afghan Origion ?</label>
									</div>
								</div>

								<div id="myElement" class="row col-lg-12">
									<div class="col-lg-6">
										<select name="volayat" id="province" class="form-control p-2 m-2" style="height: 42px;   color: gray">
											<option value="" class="nice-select hidden" hidden>Vilayat *</option>
											<?php foreach ($provinces_data as $value) { ?>
												<option value="<?php echo $value[1] ?>">
													<?php echo $value[1] ?>
												</option>
											<?php } ?>
										</select>
									</div>

									<div class="col-lg-6" style="margin-top: 8px;">
										<select name="volaswali" id="volaswali" class="form-control p-2 m-2;" style="height: 42px;   color: gray">
											<option value="" class="nice-select hidden" hidden>Volusvali *</option>
										</select>
									</div>
									<div class="col-lg-6">
										<input class="form-control p-2 m-2" type="text" id="tazkira" name="tazkira" placeholder="Afghan Tazkira/ID card">
									</div>
								</div>
							</div>

							<!-- Education section -->
							<div class="row col-lg-12" style="margin-top: 0px;">
								<span style="background: purple;color: white;width: 220px;height: 30px;margin-left: 20px;padding:5px; font-size: 18px; font-weight:100" class="badge mt-5 text-bg-success">Education & Experience</span>
								<div style="width: 96%; margin-left: 2%; border: 1px solid black; text-align: center"></div>

								<div class="col-lg-6" style="margin-top: 10px;">
									<input class="form-control p-2 m-2" list="datalistOptions1" id="exampleDataList1" name="qualification" placeholder="Qualification *" required>
									<datalist id="datalistOptions1">
										<option value="Doctoral Degree">Doctoral Degree</option>
										<option value="Master Degree">Master Degree</option>
										<option value="Bachelor Degree">Bachelor Degree</option>
										<option value="Diploma">Diploma</option>
										<option value="High school Diploma">High school Diploma</option>
									</datalist>
								</div>

								<div class="col-lg-6" style="margin-top: 10px;">
									<input class="form-control p-2 m-2" type="text" name="specialization" placeholder="Specialization *" required="">
								</div>
								<div class="col-lg-6">
									<input class="form-control p-2 m-2" type="text" name="university" placeholder="University Name *" required="">
								</div>


								<div class="col-lg-6">
									<select name="university_country" id="" class="form-control p-2 m-2" style="height: 42px; color: gray !important" required>
										<option value="" class="nice-select hidden" selected disabled>University Country *</option>
										<?php foreach ($data_country as $value) { ?>
											<option value="<?php echo $value[2] ?>">
												<?php echo $value[2] ?>
											</option>
										<?php } ?>
									</select>
								</div>


								<div class="col-lg-6">

									<input class="form-control p-2 m-2" list="datalistOptions" id="exampleDataList" name="profession" placeholder="Profession *">
									<datalist id="datalistOptions">
										<?php foreach ($profession_data as $value) { ?>
											<option value="<?php echo $value[1] ?>">
												<?php echo $value[1] ?>
											</option>
										<?php } ?>
									</datalist>
								</div>

								<div class="col-lg-6">
									<input class="form-control p-2 m-2" list="datalistOptions2" id="exampleDataList1" name="experience" placeholder="Experience (Years) *" required>
									<datalist id="datalistOptions2">
										<option data-value="1" class="option">1</option>
										<option data-value="2" class="option">2</option>
										<option data-value="3" class="option">3</option>
										<option data-value="4" class="option">4</option>
										<option data-value="5" class="option">5</option>
										<option data-value="6" class="option">6</option>
										<option data-value="7" class="option">7</option>
										<option data-value="8" class="option">8</option>
										<option data-value="9" class="option">9</option>
										<option data-value="10" class="option">10</option>
										<option data-value="10+" class="option">10+</option>
									</datalist>
								</div>

								<div class="col-lg-6">

									<input class="form-control p-2 m-2" type="text" name="job" placeholder="Current/Recenter Job Title">
								</div>

								<div class="col-lg-6">

									<input class="form-control p-2 m-2" type="text" name="last_employer" placeholder="Current/Last Employer">
								</div>



								<div class="col-lg-6">
									<select name="employement_country" id="" class="form-control p-2 m-2" style="height: 42px;  color: gray !important" required>
										<option value="" class="nice-select hidden" selected disabled>Employement Country *</option>
										<?php foreach ($data_country as $value) { ?>
											<option value="<?php echo $value[2] ?>">
												<?php echo $value[2] ?>
											</option>
										<?php } ?>
									</select>
								</div>

								<div class="col-lg-6">
									<input class="form-control input_size p-2 m-2" type="text" name="area_of_contribution" placeholder="Area of Contribution in the National Reconstruction of Afghanistan *" required="">
								</div>


								<div class="col-lg-12 row" style="margin-left: 5px; margin-top:20px">
									<div class="form-check form-switch col-lg-6" style="display: inline;">
										<label class="form-check-label" style="color:black; font-size:18px; padding:0;">
											Are you currently working or living in Afghanistan?
										</label>
									</div>
									<div style="margin-left: 15px; " class="col-lg-4">
										<span style="margin-left: 0px; margin-top: 20px">
											<span style="color: black; font-size: 16px">Yes</span>
											<input value="yes" style="width: 20px; height: 20px; margin-left: 10px" class="form-check-input" name="live_in_afg" type="radio" role="switch" id="live_in_afghanistan_yes">
										</span>

										<span style="margin-left:50px">
											<span style="color: black; font-size: 16px">No</span>
											<input value="no" style="width: 20px; height: 20px; margin-left: 13px" class="form-check-input" name="live_in_afg" type="radio" role="switch" id="live_in_afghanistan_no">
										</span>
									</div>
								</div>

								<div class="col-lg-12 row" style="margin-left: 5px; margin-top:20px; display: none" id="relocating_quesion">
									<div class="form-check form-switch col-lg-6" style="display: inline;">
										<label class="form-check-label" for="myElement" style="color:black; font-size:18px; padding:0;">Can you relocate to Afghanistan for work?</label>
									</div>
									<div style="margin-left: 15px; display:inline " class="col-lg-4">
										<span style="margin-left: 0px; margin-top: 20px">
											<span style="color: black; font-size: 16px">Yes</span>
											<input value="yes" style="width: 20px; height: 20px; margin-left: 10px" class="form-check-input" name="relocation" type="radio" role="switch" id="relocation_show">
										</span>

										<span style="margin-left:50px">
											<span style="color: black; font-size: 16px">No</span>
											<input value="no" style="width: 20px; height: 20px; margin-left: 13px" class="form-check-input" name="relocation" type="radio" role="switch" id="relocation_hide">
										</span>
									</div>
								</div>

							</div>

							<!-- Relocation -->
							<div class="row col-lg-12" style="margin-top: 30px; margin-bottom: 30px" id="relocation_content">
								<span style="background: purple;color: white;width: 150px;height: 30px;margin-left: 20px;padding:5px; font-size: 18px; font-weight:100" class="badge text-bg-success">Relocation</span>
								<div style="width: 96%; margin-left: 2%; border: 1px solid black; text-align: center; margin-bottom: 15px"></div>
								<div class="col-lg-6">
									<select name="perfered_city" id="city" class="form-control p-2 m-2" style="height: 42px;  color: gray">
										<option value="" class="nice-select" selected disabled>Preferred City for Relocation</option>
										<?php foreach ($provinces_data as $value) { ?>
											<option value="<?php echo $value[1] ?>">
												<?php echo $value[1] ?>
											</option>
										<?php } ?>
									</select>
								</div>
								<div class="col-lg-6">
									<select name="mode_of_engagement" id="engagement" class="form-control p-2 m-2" style="height: 42px;  color: gray">
										<option value="" class="nice-select" selected disabled>Mode of Engagement *</option>
										<option data-value="1" class="option">Online</option>
										<option data-value="2" class="option">Onsite</option>
										<option data-value="3" class="option">Hybrid</option>
									</select>
								</div>

								<div class="col-lg-6">
									<select name="period_of_engagement" id="period_of_engagement" class="form-control p-2 m-2" style="height: 42px;  color: gray">
										<option data-value="1" class="nice-select " selected disabled>Period of Engagement *</option>
										<option data-value="2" class="option">Less than a Week</option>
										<option data-value="3" class="option">For 2-4 Weeks</option>
										<option data-value="4" class="option">For 1-3 Months</option>
										<option data-value="5" class="option">For 6 Months</option>
										<option data-value="6" class="option">For 1 Year</option>
										<option data-value="7" class="option">For 1+ Years</option>
									</select>
								</div>
							</div>

							<!-- Proposal content -->
							<div class="col-lg-12 row" style="margin-top:20px ">
								<div class="col-lg-6" style="margin-left: 10px">
									<label class="form-check-label" for="myElement" style="color:black; font-size:18px; padding:0; margin-left: 10px !important">Do you have any (idea/project) proposal?</label>
								</div>
								<div style="margin-top: 0px; margin-left: 10px " class="col-lg-4">
									<span style="margin-left: 0px; margin-top: 20px">
										<span style="color: black; font-size: 16px">Yes</span>
										<input value="yes" style="width: 20px; height: 20px; margin-left: 10px" class="form-check-input" name="proposal" type="radio" role="switch" id="proposal_show">
									</span>
									<span style="margin-left:50px">
										<span style="color: black; font-size: 16px">No</span>
										<input value="no" style="width: 20px; height: 20px; margin-left: 13px" class="form-check-input" name="proposal" type="radio" role="switch" id="proposal_hide">
									</span>
								</div>

								<div class="row col-lg-12" style="margin-top: 20px; margin-bottom: 30px" id="proposal_content">
									<span style="background: purple;color: white;width: 170px;height: 30px;margin-left: 20px;padding:5px; font-size: 18px; font-weight:100" class="badge text-bg-success">Proposal content</span>
									<div style="width: 96%; margin-left: 2%; border: 1px solid black; text-align: center; margin-bottom: 15px"></div>

									<div class="col-lg-6" style="margin-top: 10px;">
										<input class="form-control p-2 m-2" list="datalistOptions11" name="sector" placeholder="Which sector your proposal belongs to? *" id="sectors">
										<datalist id="datalistOptions11">
											<?php foreach ($sectors_data as $value) { ?>
												<option value="<?php echo $value[1] ?>">
													<?php echo $value[1] ?>
												</option>
											<?php } ?>
										</datalist>
									</div>

									<div class="col-lg-6">
										<div class="">
											<div class="mb-3">
												<label for="proposal_attachments" class="form-label">Attach your Proposal
													<input class="d-block" type="file" id="proposal_attachments" name="proposal_attachment">
												</label>
											</div>
										</div>
									</div>

									<div class="col-lg-6">

										<select name="start_work" id="start_work" class="form-control p-2 m-2" style="height: 42px;  color: gray">
											<option value="" class="nice-select hidden" disabled selected>When you are ready to start? *</option>
											<option data-value="1" class="option">Within 1-7 Days</option>
											<option data-value="2" class="option">Within 2-4 Weeks</option>
											<option data-value="3" class="option">Within 1-12 Months</option>
											<option data-value="4" class="option">Within 2-5 Years</option>
										</select>
									</div>

									<div class="col-lg-6">
										<input class="form-control p-2 m-2" type="text" name="personal_requirements" id='proposal_message' placeholder="Personal requirements *">
									</div>

									<div class="col-lg-6">
										<input class="form-control p-2 m-2" type="text" name="project_requirements" id='' placeholder="Project Requirements *">
									</div>

								</div>
							</div>

							<!-- Contact -->
							<div class="col-lg-12 row" style="margin-top:20px">
								<span style="background: purple;color: white;width: 170px;height: 30px;margin-left: 20px;padding:5px; font-size: 18px; font-weight:100" class="badge text-bg-success">Contact Details</span>
								<div style="width: 96%; margin-left: 2%; border: 1px solid black; text-align: center; margin-bottom: 15px"></div>

								<div class="col-lg-6">
									<div style="margin-left: 8px;">
										<input class="form-control" required="true" id="phone" type="tel" name="phone" style=" height: 42px; padding-left: 65px;" placeholder="Phone Number *">
									</div>
								</div>

								<div class="col-lg-6">
									<input class="form-control p-2 m-2" type="email" name="email_address" placeholder="Email address *" required>
								</div>

								<div class="col-lg-6">
									<input class="form-control p-2 m-2" type="text" name="website_address" placeholder="Website Address">
								</div>

								<div class="col-lg-6">
									<input class="form-control p-2 m-2" type="text" name="linkedin_page" placeholder="LinkedIn Page">
								</div>


								<div class="col-lg-12">
									<input class="form-control p-2 m-2" type="text" name="feedback" placeholder="Any Feedback?">
								</div>

								<div class="col-lg-12 row" style="margin-left: 5px; margin-top:20px">
									<div class="form-check form-switch col-lg-5">
										<label class="form-check-label" for="myElement" style="color:black; font-size:18px; padding:0;">Do you want to refer us to someone else?</label>
									</div>
									<div style="margin-top: 0px; " class="col-lg-4">
										<span style="margin-left: 0px; margin-top: 20px">
											<span style="color: black; font-size: 16px">Yes</span>
											<input value="yes" style="width: 20px; height: 20px; margin-left: 10px" class="form-check-input" name="reference" type="radio" role="switch" id="refer_show">
										</span>
										<span style="margin-left:50px">
											<span style="color: black; font-size: 16px">No</span>
											<input value="no" style="width: 20px; height: 20px; margin-left: 13px" class="form-check-input" name="reference" type="radio" role="switch" id="refer_hide" checked>
										</span>
									</div>
								</div>
							</div>

							<!-- References -->
							<div class="row col-lg-12" style="margin-top: 50px;" id="refer_content">
								<span style="background: purple;color: white;width: 220px;height: 30px;margin-left: 20px;padding:5px; font-size: 18px; font-weight:100" class="badge text-bg-success">Referencing someone</span>
								<div style="width: 96%; margin-left: 2%; border: 1px solid black; text-align: center; margin-bottom: 15px"></div>

								<div class="row col-lg-12">
									<div class="col-lg-6">
										<input class="form-control p-2 m-2" type="text" id="ref_person_name" name="ref_person_name[]" placeholder="Referred (Ref.) Person Name *">
									</div>

									<div class="col-lg-6">
										<input class="form-control p-2 m-2" type="text" id="ref_relation_with" name="ref_relation_with[]" placeholder="Your relation with the referred person? *">
									</div>

									<div class="col-lg-6">
										<input class="form-control p-2 m-2" type="text" id="ref_email_address" name="ref_email_address[]" placeholder="Ref. Email Address *">
									</div>

									<div class="col-lg-6">
										<div style="margin-left: 8px;">
											<input class="form-control" id="phone1" type="tel" id="phone1" name="ref_phone[]" placeholder="Ref. Phone number *" style="padding-left: 65px; height: 42px" />
										</div>
									</div>

								</div>
								<div class="row col-lg-12 email-input__w inputs-set" id="" style="margin-left: 10px; margin-top:10px">
									<button class="btn-add-input" onclick="addEmailField()" type="button">
										Add more people+
									</button>
								</div>
							</div>

							<div class="row col-lg-12" id="email-list"></div>

							<div class="row" style="margin-top: 20px;">
								<div class="col-lg-12 form-group login-btn">
									<button style="width: 100%;" class="btn" name="submit" type="submit">Send</button>
								</div>
							</div>


							<!-- BOTTOM -->

						</form>
						<!--/ End Form -->
					</div>
				</div>
			</div>
		</div>

		<?php include('./components/contribution.php') ?>

		<!-- <div class="contact-info">
			<div class="row">
				<div class="col-lg-4 col-12 ">
					<div class="single-info">
						<i class="icofont icofont-ui-call"></i>
						<div class="content">
							<h3>+(000) 1234 56789</h3>
							<p>info@company.com</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-12 ">
					<div class="single-info">
						<i class="icofont-google-map"></i>
						<div class="content">
							<h3>2 Fir e Brigade Road</h3>
							<p>Chittagonj, Lakshmipur</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-12 ">
					<div class="single-info">
						<i class="icofont icofont-wall-clock"></i>
						<div class="content">
							<h3>Mon - Sat: 8am - 5pm</h3>
							<p>Sunday Closed</p>
						</div>
					</div>
				</div>
			</div>
		</div> -->
	</div>
</section>
<?php include('./components/footer.php') ?>