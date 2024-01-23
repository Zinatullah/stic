<?php

$connection = mysqli_connect('localhost', 'akrami', 'afghan', 'sti');
$connection->set_charset("utf8");

header('Content-Type: text/html; charset=utf-8');

if (!isset($_COOKIE['loggedIn'])) {
	header('location: ./login.php');
	exit();
}

$email = $_COOKIE['loggedIn'];
$account_profile_check = 'SELECT * FROM `main_form` where email = "' . $email . '"';
$account_result = mysqli_query($connection, $account_profile_check);
$data_account = mysqli_fetch_row($account_result);

if (mysqli_num_rows($account_result) < 0) {
	header('location: ./mainform.php');
	exit();
}

if (isset($_GET['thankyou'])) {
	$message = "Registeration success";
	echo "<script>alert('$message');</script>";
}

if (isset($_GET['Faild'])) {
	$message = "No updates!";
	echo "<script>alert('$message');</script>";
}

if (isset($_GET['success'])) {
	$message = "Profile Updated!";
	echo "<script>alert('$message');</script>";
}

if (isset($_GET['refre_update'])) {
	$message = "Reference Updated!";
	echo "<script>alert('$message');</script>";
}

if (isset($_GET['remove'])) {
	$message = "Reference Removed!";
	echo "<script>alert('$message');</script>";
}


$provinces = 'SELECT * FROM `z_countries`';
$result = mysqli_query($connection, $provinces);
$data_country = mysqli_fetch_all($result);

$districts = 'SELECT * FROM `z_provinces`';
$result1 = mysqli_query($connection, $districts);
$provinces_data = mysqli_fetch_all($result1);

$profession = 'SELECT * FROM `z_profession` ORDER by name';
$profession_result = mysqli_query($connection, $profession);
$profession_data = mysqli_fetch_all($profession_result);

if (isset($_COOKIE['loggedIn'])) {
	$email = $_COOKIE['loggedIn'];
	$pre_data_query = 'SELECT * FROM `main_form` where email ="' . $email . '"';
	$pre_result = mysqli_query($connection, $pre_data_query);
	$pre_data = mysqli_fetch_row($pre_result);

	$ref_query = 'SELECT * FROM `references_people` WHERE main_email = "' . $email . '"';
	$ref_result = mysqli_query($connection, $ref_query);
	$ref_data = mysqli_fetch_all($ref_result);

	// print_r($ref_data);
}



include('./components/header.php');

?>

<div class="container" style="background-color: blue; min-height: 10px; border-radius: 10px"></div>
<section class="contact-us section" style="padding: 50px !important;">

	<div class="container">
		<div class="inner">
			<div class="row">
				<div class="col-lg-12">
					<h2 style="text-align: center; margin-top: 50px;">Profile information</h2>
					<!-- Personal Information section -->
					<div class="row col-lg-12" style="margin-top: 0px;">
						<div class="container text-center" style="width: 98%; margin-left: 1%; border-bottom: 2px solid black; text-align: center;">
							<div class="row align-items-start">
								<div class="col-3">
									<span style="background: purple;color: white;width: 220px;height: 30px;padding:5px; font-size: 18px; font-weight:100" class="badge mt-5 text-bg-success">Personal Information</span>
								</div>
								<div class="col"></div>
								<div class="col-1" style="margin-top: 50px;" id="personal_info">
									<span id="personal_edit">
										<svg width="25" height="25" viewBox="0 0 16 16" version="1.1" style="margin-top: -4px; cursor:pointer">
											<path fill="blue" d="M16 4c0 0 0-1-1-2s-1.9-1-1.9-1l-1.1 1.1v-2.1h-12v16h12v-8l4-4zM6.3 11.4l-0.6-0.6 0.3-1.1 1.5 1.5-1.2 0.2zM7.2 9.5l-0.6-0.6 5.2-5.2c0.2 0.1 0.4 0.3 0.6 0.5zM14.1 2.5l-0.9 1c-0.2-0.2-0.4-0.3-0.6-0.5l0.9-0.9c0.1 0.1 0.3 0.2 0.6 0.4zM11 15h-10v-14h10v2.1l-5.9 5.9-1.1 4.1 4.1-1.1 2.9-3v6z"></path>
										</svg>
									</span>
								</div>
							</div>
						</div>
						<!-- Form -->
						<form action="./backend/edits.php" class="row container ml-1" method="post">
							<div class="col-lg-6">
								<label class="mt-1" style="margin: 0;">First Name</label>
								<input class="form-control p-2 mb-0" type="text" name="first_name" placeholder="First Name *" required="" disabled id="first_name" value="<?php echo $pre_data[1] ?>">
							</div>
							<div class="col-lg-6">
								<label class="mt-1" style="margin: 0;">Last Name</label>
								<input class="form-control p-2 mb-2" type="text" name="last_name" placeholder="Last Name *" required="" disabled id="last_name" value="<?php echo $pre_data[2] ?>">
							</div>

							<div class="col-lg-6">
								<label class="mt-1" style="margin: 0;">Date of birth</label>

								<input placeholder="Date of birth *" name="date_of_birth" class="textbox-n form-control p-2 mb-2 input_color" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" required disabled id="date" value="<?php echo $pre_data[3] ?>">
							</div>

							<div class="col-lg-6">
								<label class="mt-1" style="margin: 0;">City of birth</label>
								<select name="birth_country" class="form-control p-2 mb-2 input_color" style="height: 42px; color: gray !important" required aria-placeholder="CHECK" disabled id="birth">
									<option disabled style="background-color: lightblue;" class="input_color" value="<?php echo $pre_data[4] ?>" selected>
										<?php echo $pre_data[4] ?>
									</option>
									<?php foreach ($data_country as $value) { ?>
										<option value="<?php echo $value[2] ?>">
											<?php echo $value[2] ?>
										</option>
									<?php } ?>
								</select>
							</div>

							<div class="col-lg-6">
								<label class="mt-1" style="margin: 0;">Nationality</label>
								<select name="nationality" class="form-control p-2 mb-2" style="height: 42px;  color: gray !important" required disabled id="nationality">
									<option value="<?php echo $pre_data[5] ?>" class="nice-select hidden" selected disabled>
										<?php echo $pre_data[5] ?>
									</option>
									<?php foreach ($data_country as $value) { ?>
										<option value='<?php echo $value[3]; ?>'>
											<?php echo $value[3] ?>
										</option>
									<?php } ?>
								</select>
							</div>

							<div class="col-lg-6">
								<label class="mt-1" style="margin: 0;">Second Nationality</label>
								<select name="nationality_second" id="nationality_second" class="form-control p-2 mb-2" style="height: 42px;  color: gray !important" required disabled>
									<option value="<?php echo $pre_data[6] ?>" class="nice-select hidden" selected>
										<?php echo $pre_data[6] ?>
									</option>
									<?php foreach ($data_country as $value) { ?>
										<option value="<?php echo $value[3] ?>">
											<?php echo $value[3] ?>
										</option>
									<?php } ?>
								</select>
							</div>
							<div class="col-lg-6">
								<label class="mt-1" style="margin: 0;">Residential Country</label>
								<select name="residential_country" id="residential_country" class="form-control p-2 mb-2" style="height: 42px; color: gray !important" required disabled>
									<option value="<?php echo $pre_data[7] ?>" class="nice-select hidden" selected disabled>
										<?php echo $pre_data[7] ?>
									</option>
									<?php foreach ($data_country as $value) { ?>
										<option value="<?php echo $value[2] ?>	">
											<?php echo $value[2] ?>
										</option>
									<?php } ?>
								</select>
							</div>

							<div class="col-lg-6">
								<label class="mt-1" style="margin: 0;">City</label>
								<input value="<?php echo $pre_data[8] ?>" class="form-control p-2 mb-2" type="text" id="pdistrict" name="district" placeholder="City *" required disabled>
							</div>

							<!-- Afghan Origion -->
							<div class="col-lg-6">
								<div class="form-check form-switch" style="margin-top: 10px; margin-left: 30px;">
									<input name="afghan_check" style="width: 20px; height: 20px;" class="form-check-input" type="checkbox" role="switch" id="filled_showHideCheckbox" <?php echo $pre_data[9] == 'on' ? 'checked' : '' ?>>
									<label class="form-check-label" for="filled_showHideCheckbox" style="color:black; font-size:16px; margin-top: 3px">Afghan Origion ?</label>
								</div>
							</div>

							<div id="filled_myElement" class="col-lg-12 row" style="margin-left: 0px; display:  <?php echo $pre_data[9] == 'on' ? '' : 'none' ?>">
								<div class="col-lg-6">
									<label class="mt-1" style="margin: 0;">Valayat</label>
									<select name="volayat" id="province" class="form-control p-2 mb-2" style="height: 42px;   color: gray" disabled>
										<option value="<?php echo $pre_data[10] ?>" class="nice-select hidden" hidden>
											<?php echo $pre_data[10] ?>
										</option>
										<?php foreach ($provinces_data as $value) { ?>
											<option value="<?php echo $value[1] ?>">
												<?php echo $value[1] ?>
											</option>
										<?php } ?>
									</select>
								</div>

								<div class="col-lg-6">
									<label class="mt-1" style="margin: 0;">Volusvali</label>
									<select name="volaswali" id="volaswali" class="form-control p-2 mb-2;" style="height: 42px;   color: gray" disabled>
										<option value="<?php echo $pre_data[11] ?>" class="nice-select hidden" hidden>
											<?php echo $pre_data[11] ?>
										</option>
									</select>
								</div>
								<div class="col-lg-6">
									<label class="mt-1" style="margin: 0;">Tazkira</label>
									<input class="form-control p-2 mb-2" type="text" id="tazkira" name="tazkira" placeholder="<?php echo $pre_data[12] ?>" disabled value="<?php echo $pre_data[12] ?>">
								</div>
							</div>
							<div class="col-lg-12 row" style="margin-left: 15px; margin-top: 15px; display: none" id="personal_info_btn">
								<button class="btn btn-lg col-lg-12" name="personal_info_submit" type="submit">Update</button>
							</div>
						</form>
					</div>

					<!-- Education section -->
					<div class="row col-lg-12" style="margin-top: 0px;">
						<form action="./backend/edits.php" class="row container ml-1" method="POST">
							<div class="container text-center" style="width: 98%; margin-left: 1%; border-bottom: 2px solid black; text-align: center;">
								<div class="row align-items-start">
									<div class="col-3">
										<span style="background: purple;color: white;width: 220px;height: 30px;padding:5px; font-size: 18px; font-weight:100" class="badge mt-5 text-bg-success">Education & Experience</span>
									</div>
									<div class="col"></div>
									<div class="col-1" style="margin-top: 50px;" id="education">
										<span id="">
											<svg width="25" height="25" viewBox="0 0 16 16" version="1.1" style="margin-top: -4px; cursor:pointer">
												<path fill="blue" d="M16 4c0 0 0-1-1-2s-1.9-1-1.9-1l-1.1 1.1v-2.1h-12v16h12v-8l4-4zM6.3 11.4l-0.6-0.6 0.3-1.1 1.5 1.5-1.2 0.2zM7.2 9.5l-0.6-0.6 5.2-5.2c0.2 0.1 0.4 0.3 0.6 0.5zM14.1 2.5l-0.9 1c-0.2-0.2-0.4-0.3-0.6-0.5l0.9-0.9c0.1 0.1 0.3 0.2 0.6 0.4zM11 15h-10v-14h10v2.1l-5.9 5.9-1.1 4.1 4.1-1.1 2.9-3v6z"></path>
											</svg>
										</span>
									</div>
								</div>
							</div>

							<div class="col-lg-6" style="margin-top: 10px;">
								<label class="mt-1" style="margin: 0;">Qualification</label>
								<input value="<?php echo $pre_data[13] ?>" class="form-control p-2 mb-2" list="datalistOptions1" id="qualification" name="qualification" placeholder="Qualification" required disabled>
								<datalist id="datalistOptions1">
									<option value="Doctoral degree">Doctoral degree</option>
									<option value="Masters degree">Masters degree</option>
									<option value="Graduate diploma">Graduate diploma</option>
									<option value="Graduate certificate">Graduate certificate</option>
									<option value="Bachelor degree">Bachelor degree</option>
									<option value="Diploma">Diploma</option>
									<option value="Advanced diploma/Associates degree">Advanced diploma/Associates degree</option>
								</datalist>
							</div>

							<div class="col-lg-6" style="margin-top: 10px;">
								<label class="mt-1" style="margin: 0;">Specialization</label>
								<input value="<?php echo $pre_data[14] ?>" id="specialization" class="form-control p-2 mb-2" type="text" name="specialization" placeholder="Specialization *" required="" disabled>
							</div>
							<div class="col-lg-6">
								<label class="mt-1" style="margin: 0;">University Name</label>
								<input value="<?php echo $pre_data[15] ?>" id="university" class="form-control p-2 mb-2" type="text" name="university" placeholder="University Name *" required="" disabled>
							</div>


							<div class="col-lg-6">
								<label class="mt-1" style="margin: 0;">University country</label>
								<select name="university_country" id="university_country" class="form-control p-2 mb-2" style="height: 42px; color: gray !important" required disabled>
									<option value="<?php echo $pre_data[16] ?>" class="nice-select hidden" selected disabled>
										<?php echo $pre_data[16] ?>
									</option>
									<?php foreach ($data_country as $value) { ?>
										<option value="<?php echo $value[2] ?>">
											<?php echo $value[2] ?>
										</option>
									<?php } ?>
								</select>
							</div>


							<div class="col-lg-6">
								<label class="mt-1" style="margin: 0;">Profession</label>
								<input class="form-control p-2 mb-2" list="datalistOptions" id="profession" name="profession" placeholder="Profession *" required disabled value="<?php echo $pre_data[17] ?>">
								<datalist id="datalistOptions">
									<?php foreach ($profession_data as $value) { ?>
										<option value="<?php echo $value[1] ?>">
											<?php echo $value[1] ?>
										</option>
									<?php } ?>
								</datalist>
							</div>

							<div class="col-lg-6">
								<label class="mt-1" style="margin: 0;">Experience (Years)</label>
								<input class="form-control p-2 mb-2" list="datalistOptions2" id="experience" name="experience" placeholder="Experience (Years) *" required disabled value="<?php echo $pre_data[18] ?>">
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
								<label class="mt-1" style="margin: 0;">Current/Recenter Job Title</label>
								<input id="job_titile" class="form-control p-2 mb-2" type="text" name="job" placeholder="Current/Recenter Job Title" disabled value="<?php echo $pre_data[19] ?>">
							</div>

							<div class="col-lg-6">
								<label class="mt-1" style="margin: 0;">Current/Last Employer</label>
								<input id="employer" class="form-control p-2 mb-2" type="text" name="last_employer" placeholder="Current/Last Employer" disabled value="<?php echo $pre_data[20] ?>">
							</div>

							<div class="col-lg-6">
								<label class="mt-1" style="margin: 0;">Employment country</label>
								<select id='employement_country' name="employement_country" class="form-control p-2 mb-2" style="height: 42px;  color: gray !important" required disabled>
									<option value="<?php echo $pre_data[21] ?>" class="nice-select hidden" selected disabled>
										<?php echo $pre_data[21] ?>
									</option>
									<?php foreach ($data_country as $value) { ?>
										<option value="<?php echo $value[2] ?>">
											<?php echo $value[2] ?>
										</option>
									<?php } ?>
								</select>
							</div>

							<div class="col-lg-6">
								<label class="mt-1" style="margin: 0;">
									Area of Contribution in the National Reconstruction of Afghanistan
								</label>
								<input id="area_of_contirubution" class="form-control input_size p-2 mb-2" type="text" name="area_of_contribution" placeholder="Area of Contribution in the National Reconstruction of Afghanistan *" required="" disabled value="<?php echo $pre_data[22] ?>">
							</div>
							<div class="col-lg-12 row" style="margin-left: 15px; margin-top: 15px; display: none" id="education_info_btn">
								<button class="btn btn-lg col-lg-12" name="education_info_btn" type="submit">Update</button>
							</div>
						</form>
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
								<input style="width: 20px; height: 20px; margin-left: 10px" class="form-check-input" name="live_in_afg" type="radio" role="switch" id="filled_live_in_afghanistan_yes" <?php echo $pre_data[23] == 'yes' ? 'checked' : '' ?>>
							</span>

							<span style="margin-left:50px">
								<span style="color: black; font-size: 16px">No</span>
								<input style="width: 20px; height: 20px; margin-left: 13px" class="form-check-input" name="live_in_afg" type="radio" role="switch" id="filled_live_in_afghanistan_no" <?php echo $pre_data[23] == 'no' ? 'checked' : '' ?>>
							</span>
						</div>
					</div>

					<div class="col-lg-12 row" style="margin-left: 5px; margin-top:20px; display: <?Php echo $pre_data[23] == 'no' ? '' : 'none' ?>" id="filled_relocating_quesion">
						<div class="form-check form-switch col-lg-6" style="display: inline;">
							<label class="form-check-label" style="color:black; font-size:18px; padding:0;">
								Can you relocate to Afghanistan for work?
							</label>
						</div>
						<div style="margin-left: 15px; " class="col-lg-4">
							<span style="margin-left: 0px; margin-top: 20px">
								<span style="color: black; font-size: 16px">Yes</span>
								<input style="width: 20px; height: 20px; margin-left: 10px" class="form-check-input" name="relocation" type="radio" role="switch" id="filled_relocation_show" <?php echo $pre_data[24] == 'yes' ? 'checked' : '' ?>>
							</span>

							<span style="margin-left:50px">
								<span style="color: black; font-size: 16px">No</span>
								<input style="width: 20px; height: 20px; margin-left: 13px" class="form-check-input" name="relocation" type="radio" role="switch" id="filled_relocation_hide">
							</span>
						</div>
					</div>

					<!-- Relocation -->
					<div class="row col-lg-12" style="margin-top: 30px; margin-bottom: 30px; display: <?php echo $pre_data[24] == 'yes' ? 'block' : 'none' ?>" id="filled_relocation_content">
						<form action="./backend/edits.php" class="row container ml-1" method="POST">
							<div class="container text-center" style="width: 98%; margin-left: 1%; border-bottom: 2px solid black; text-align: center;">
								<div class="row align-items-start">
									<div class="col-3">
										<span style="background: purple;color: white;width: 220px;height: 30px;padding:5px; font-size: 18px; font-weight:100" class="badge mt-5 text-bg-success">Relocation</span>
									</div>
									<div class="col"></div>
									<div class="col-1" style="margin-top: 50px;" id="education">
										<span id="relocation">
											<svg width="25" height="25" viewBox="0 0 16 16" version="1.1" style="margin-top: -4px; cursor:pointer">
												<path fill="blue" d="M16 4c0 0 0-1-1-2s-1.9-1-1.9-1l-1.1 1.1v-2.1h-12v16h12v-8l4-4zM6.3 11.4l-0.6-0.6 0.3-1.1 1.5 1.5-1.2 0.2zM7.2 9.5l-0.6-0.6 5.2-5.2c0.2 0.1 0.4 0.3 0.6 0.5zM14.1 2.5l-0.9 1c-0.2-0.2-0.4-0.3-0.6-0.5l0.9-0.9c0.1 0.1 0.3 0.2 0.6 0.4zM11 15h-10v-14h10v2.1l-5.9 5.9-1.1 4.1 4.1-1.1 2.9-3v6z"></path>
											</svg>
										</span>
									</div>
								</div>
							</div>

							<div class="col-lg-6">
								<label class="mt-1" style="margin: 0;">Preferred City</label>
								<select name="perfered_city" id="city" class="form-control p-2 mb-2" style="height: 42px;  color: gray" disabled>
									<option value="<?php echo $pre_data[25] ?>" class="nice-select" selected disabled>
										<?php echo $pre_data[25] ?>
									</option>
									<?php foreach ($provinces_data as $value) { ?>
										<option value="<?php echo $value[1] ?>">
											<?php echo $value[1] ?>
										</option>
									<?php } ?>
								</select>
							</div>
							<div class="col-lg-6">
								<label class="mt-1" style="margin: 0;">Mode of engagement</label>
								<select name="mode_of_engagement" id="engagement" class="form-control p-2 mb-2" style="height: 42px;  color: gray" disabled>
									<option value="<?php echo $pre_data[26] ?>" class="nice-select" selected disabled><?php echo $pre_data[26] ?></option>
									<option data-value="1" class="option">Online</option>
									<option data-value="2" class="option">Onsite</option>
									<option data-value="3" class="option">Hybrid</option>
								</select>
							</div>

							<div class="col-lg-6">
								<label class="mt-1" style="margin: 0;">Period of engagement</label>
								<select name="period_of_engagement" id="period_of_engagement" class="form-control p-2 mb-2" style="height: 42px;  color: gray" disabled>
									<option value="<?php echo $pre_data[27] ?>" class="nice-select " selected disabled>
										<?php echo $pre_data[27] ?>
									</option>
									<option data-value="2" class="option">Less than a Week</option>
									<option data-value="3" class="option">Within 2-4 Weeks</option>
									<option data-value="4" class="option">Within 1-3 Months</option>
									<option data-value="5" class="option">Within 6 Months</option>
									<option data-value="6" class="option">Within 1 Year</option>
									<option data-value="7" class="option">Within 1+ Years</option>
								</select>
							</div>
							<div class="col-lg-12 row" style="margin-left: 15px; margin-top: 15px; display: none" id="relocation_btn">
								<button class="btn btn-lg col-lg-12" name="relocation_btn" type="submit">Update</button>
							</div>
						</form>
					</div>

					<div class="col-lg-12 row" style="margin-left: 5px; margin-top:20px;" id="">
						<div class="col-lg-6">
							<label class="form-check-label" for="myElement" style="color:black; font-size:18px; padding:0;">
								Do you have any (idea/project) proposal?
							</label>
						</div>
						<div style="margin-top: 0px; margin-left: 15px " class="col-lg-4">
							<span style="margin-left: 0px; margin-top: 20px">
								<span style="color: black; font-size: 16px">Yes</span>
								<input style="width: 20px; height: 20px; margin-left: 10px" class="form-check-input" name="proposal" type="radio" role="switch" id="filled_proposal_show" <?php echo $pre_data[28] == 'yes' ? 'checked' : ''; ?>>
							</span>
							<span style="margin-left:50px">
								<span style="color: black; font-size: 16px">No</span>
								<input style="width: 20px; height: 20px; margin-left: 13px" class="form-check-input" name="proposal" type="radio" role="switch" id="filled_proposal_hide">
							</span>
						</div>

					</div>

					<!-- Proposal content -->
					<div class="col-lg-12 row" style="margin-top:20px; display: <?php echo $pre_data[28] == 'yes' ? 'block' : 'none'; ?> " id="Filled_proposal_content">
						<form action="./backend/edits.php" class="row container ml-1" method="POST" enctype="multipart/form-data">
							<div class="row col-lg-12" style="margin-top: 0px; margin-bottom: 30px;">
								<div class="container text-center" style="width: 98%; margin-left: 1%; border-bottom: 2px solid black; text-align: center;">
									<div class="row align-items-start">
										<div class="col-3">
											<span style="background: purple;color: white;width: 220px;height: 30px;padding:5px; font-size: 18px; font-weight:100" class="badge mt-5 text-bg-success">Proposal content</span>
										</div>
										<div class="col"></div>
										<div class="col-1" style="margin-top: 50px;" id="education">
											<span id="proposal">
												<svg width="25" height="25" viewBox="0 0 16 16" version="1.1" style="margin-top: -4px; cursor:pointer">
													<path fill="blue" d="M16 4c0 0 0-1-1-2s-1.9-1-1.9-1l-1.1 1.1v-2.1h-12v16h12v-8l4-4zM6.3 11.4l-0.6-0.6 0.3-1.1 1.5 1.5-1.2 0.2zM7.2 9.5l-0.6-0.6 5.2-5.2c0.2 0.1 0.4 0.3 0.6 0.5zM14.1 2.5l-0.9 1c-0.2-0.2-0.4-0.3-0.6-0.5l0.9-0.9c0.1 0.1 0.3 0.2 0.6 0.4zM11 15h-10v-14h10v2.1l-5.9 5.9-1.1 4.1 4.1-1.1 2.9-3v6z"></path>
												</svg>
											</span>
										</div>
									</div>
								</div>

								<div class="col-lg-6" style="margin-top: 10px;">
									<label class="mt-1" style="margin: 0;">Which sector your proposal belongs to ?</label>
									<input class="form-control p-2 mb-2" list="datalistOptions11" name="sector" placeholder="Which sector your proposal belongs to? *" disabled id="sector" value="<?php echo $pre_data[29] ?>">
									<datalist id="datalistOptions11">
										<?php foreach ($sectors_data as $value) { ?>
											<option value="<?php echo $value[1] ?>">
												<?php echo $value[1] ?>
											</option>
										<?php } ?>
									</datalist>
								</div>

								<div class="col-lg-6">
									<div class="mb-3" style="margin-top: 10px;" id='proposal_attachments'>
										<label class="mt-1" style="margin: 0;">Propsal Attachments</label>
										<div class="form-control p-2 mb-2" style="color: blue; text-decoration:underline; background: #e9ecef;">
											<a href="./backend/uploads/<?php echo $pre_data[30] ?>" target="_blank" disabled><?php echo $pre_data[30] ?></a>
										</div>
									</div>
									<div class="mb-3" id="edit_attach" style="display: none;">
										<label for="proposal_attachments" class="form-label">Attach your Proposal</label>
										<input class="d-block" type="file" id="proposal_attachments" name="proposal_attachment">
									</div>
								</div>

								<div class="col-lg-6">
									<label class="mt-1" style="margin: 0;">When you are ready to start?</label>
									<select name="start_work" id="start_work" class="form-control p-2 mb-2" style="height: 42px;  color: gray" disabled>
										<option value="<?php echo $pre_data[31] ?>" class="nice-select hidden" disabled selected>
											<?php echo $pre_data[31] ?>
										</option>
										<option data-value="1" class="option">1-7 Days</option>
										<option data-value="2" class="option">2-4 Weeks</option>
										<option data-value="3" class="option">1-12 Months</option>
										<option data-value="4" class="option">2-5 Years</option>
									</select>
								</div>

								<div class="col-lg-6">
									<label class="mt-1" style="margin: 0;">Personal requirements</label>
									<input class="form-control p-2 mb-2" type="text" name="personal_requirements" id='proposal_message' placeholder="Personal requirements *" disabled value="<?php echo $pre_data[32] ?>">
								</div>

								<div class="col-lg-6">
									<label class="mt-1" style="margin: 0;">Project Requirements</label>
									<input class="form-control p-2 mb-2" type="text" name="project_requirements" id='project_requirements' placeholder="Project Requirements *" disabled value="<?php echo $pre_data[33] ?>">
								</div>
								<div class="col-lg-12 row" style="margin-left: 15px; margin-top: 15px; display: none" id="proposal_btn">
									<button class="btn btn-lg col-lg-12" name="proposal_btn" type="submit">Update</button>
								</div>
							</div>
						</form>
					</div>

					<!-- Contact -->
					<div class="col-lg-12 row" style="margin-top:20px">
						<form action="./backend/edits.php" class="row container ml-1" method="POST">
							<div class="container text-center" style="width: 98%; margin-left: 1%; border-bottom: 2px solid black; text-align: center;">
								<div class="row align-items-start">
									<div class="col-3">
										<span style="background: purple;color: white;width: 220px;height: 30px;padding:5px; font-size: 18px; font-weight:100" class="badge mt-5 text-bg-success">Contact Details</span>
									</div>
									<div class="col"></div>
									<div class="col-1" style="margin-top: 50px;" id="contact_detail">
										<span id="">
											<svg width="25" height="25" viewBox="0 0 16 16" version="1.1" style="margin-top: -4px; cursor:pointer">
												<path fill="blue" d="M16 4c0 0 0-1-1-2s-1.9-1-1.9-1l-1.1 1.1v-2.1h-12v16h12v-8l4-4zM6.3 11.4l-0.6-0.6 0.3-1.1 1.5 1.5-1.2 0.2zM7.2 9.5l-0.6-0.6 5.2-5.2c0.2 0.1 0.4 0.3 0.6 0.5zM14.1 2.5l-0.9 1c-0.2-0.2-0.4-0.3-0.6-0.5l0.9-0.9c0.1 0.1 0.3 0.2 0.6 0.4zM11 15h-10v-14h10v2.1l-5.9 5.9-1.1 4.1 4.1-1.1 2.9-3v6z"></path>
											</svg>
										</span>
									</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="mb-2">
									<label class="mt-1" style="margin: 0;">Phone Number</label>
									<input class="form-control" required="true" id="phone" type="tel" name="phone" style=" height: 42px; width: 98% !important" placeholder="Phone Number *" disabled value="<?php echo $pre_data[34] ?>">
									<input type="hidden" name="dial_code" value="<?php echo $pre_data[34] ?>">
								</div>
							</div>

							<div class="col-lg-6 mt-2">
								<label class="mt-1" style="margin: 0;">Email address </label>
								<input class="form-control p-2 mb-2" type="email" name="email_address" id="email_address" placeholder="Email address *" required disabled value="<?php echo $pre_data[35] ?>">
							</div>

							<div class="col-lg-6">
								<label class="mt-1" style="margin: 0;">Website Address</label>
								<input class="form-control p-2 mb-2" type="text" name="website_address" id='website_address' placeholder="Website Address" disabled value="<?php echo $pre_data[36] ?>">
							</div>

							<div class="col-lg-6">
								<label class="mt-1" style="margin: 0;">LinkedIn page Address</label>
								<input class="form-control p-2 mb-2" type="text" name="linkedin_page" id="linkedin_page" placeholder="LinkedIn Page" disabled value="<?php echo $pre_data[37] ?>">
							</div>


							<div class="col-lg-12">
								<label class="mt-1" style="margin: 0;">Feedback</label>
								<input class="form-control p-2 mb-2" type="text" name="feedback" id="feedback" placeholder="Any Feedback?" disabled value="<?php echo $pre_data[39] ?>">
							</div>
							<div class="col-lg-12 row" style="margin-left: 15px; margin-top: 15px; display: none" id="contact_btn">
								<button class="btn btn-lg col-lg-12" name="contact_btn" type="submit">Update</button>
							</div>
						</form>

						<div class="col-lg-12 row" style="margin-left: 5px; margin-top:20px; margin-bottom: 20px">
							<div class="form-check form-switch col-lg-5">
								<label class="form-check-label" for="myElement" style="color:black; font-size:18px; padding:0;">Do you want to refer us to someone else?</label>
							</div>
							<div style="margin-top: 0px; " class="col-lg-4">
								<span style="margin-left: 0px; margin-top: 20px">
									<span style="color: black; font-size: 16px">Yes</span>
									<input style="width: 20px; height: 20px; margin-left: 10px" class="form-check-input" name="reference" type="radio" role="switch" id="refer_show" <?php echo $pre_data[38] == 'yes' ? 'checked' : '' ?>>
								</span>
								<span style="margin-left:50px">
									<span style="color: black; font-size: 16px">No</span>
									<input style="width: 20px; height: 20px; margin-left: 13px" class="form-check-input" name="reference" type="radio" role="switch" id="refer_hide">
								</span>
							</div>
						</div>
					</div>
					<!-- References -->
					<div class="row col-lg-12" id="filled_refer_content" style="display: <?php echo $pre_data[38] == 'yes' ? 'block' : 'none' ?>">
						<?php
						$phone_number_ref = 'phone';
						$svg = 'svg';
						$num = 1;
						?>

						<?php foreach ($ref_data as $values) { ?>
							<form action="./backend/edits.php" class="row container ml-1" method="POST">

								<div id="<?php echo 'div_' . $values[0]; ?>" class="container text-center" style="width: 98%; margin-left: 1%; border-bottom: 2px solid black; text-align: center;">
									<div class="row align-items-start">
										<div class="col-3">
											<span style="background: purple;color: white;width: 220px;height: 30px;padding:5px; font-size: 18px; font-weight:100" class="badge mt-5 text-bg-success">Other References</span>
										</div>
										<div class="col"></div>
										<div class="col-3" style="margin-top: 50px;" id="ref_contact_detail">
											<span style="margin-left: 15px;">
												<a href="./backend/delete.php?id=<?php echo $values[0] ?>">
													<svg width="25" height="25" version="1.1" style="margin-top: -4px; cursor:pointer">
														<path fill="red" d="m9.129 0 1.974.005c.778.094 1.46.46 2.022 1.078.459.504.7 1.09.714 1.728h5.475a.69.69 0 0 1 .686.693.689.689 0 0 1-.686.692l-1.836-.001v11.627c0 2.543-.949 4.178-3.041 4.178H5.419c-2.092 0-3.026-1.626-3.026-4.178V4.195H.686A.689.689 0 0 1 0 3.505c0-.383.307-.692.686-.692h5.47c.014-.514.205-1.035.554-1.55C7.23.495 8.042.074 9.129 0Zm6.977 4.195H3.764v11.627c0 1.888.52 2.794 1.655 2.794h9.018c1.139 0 1.67-.914 1.67-2.794l-.001-11.627ZM6.716 6.34c.378 0 .685.31.685.692v8.05a.689.689 0 0 1-.686.692.689.689 0 0 1-.685-.692v-8.05c0-.382.307-.692.685-.692Zm2.726 0c.38 0 .686.31.686.692v8.05a.689.689 0 0 1-.686.692.689.689 0 0 1-.685-.692v-8.05c0-.382.307-.692.685-.692Zm2.728 0c.378 0 .685.31.685.692v8.05a.689.689 0 0 1-.685.692.689.689 0 0 1-.686-.692v-8.05a.69.69 0 0 1 .686-.692ZM9.176 1.382c-.642.045-1.065.264-1.334.662-.198.291-.297.543-.313.768l4.938-.001c-.014-.291-.129-.547-.352-.792-.346-.38-.73-.586-1.093-.635l-1.846-.002Z"></path>
													</svg>
												</a>

												<svg id="<?php echo $svg . $num ?>" width="25" height="25" viewBox="0 0 16 16" version="1.1" style="margin-top: -4px; cursor:pointer">
													<path fill="blue" d="M16 4c0 0 0-1-1-2s-1.9-1-1.9-1l-1.1 1.1v-2.1h-12v16h12v-8l4-4zM6.3 11.4l-0.6-0.6 0.3-1.1 1.5 1.5-1.2 0.2zM7.2 9.5l-0.6-0.6 5.2-5.2c0.2 0.1 0.4 0.3 0.6 0.5zM14.1 2.5l-0.9 1c-0.2-0.2-0.4-0.3-0.6-0.5l0.9-0.9c0.1 0.1 0.3 0.2 0.6 0.4zM11 15h-10v-14h10v2.1l-5.9 5.9-1.1 4.1 4.1-1.1 2.9-3v6z"></path>
												</svg>
											</span>
										</div>
									</div>
								</div>

								<div class="row col-lg-12">
									<div class="col-lg-6">
										<label class="mt-1" style="margin: 0;">Referred (Ref.) Person Name</label>
										<input disabled class="form-control p-2 mb-2" type="text" id='<?php echo 'ref_name_' . $num ?>' name="ref_person_name" placeholder="Referred (Ref.) Person Name *" value="<?php echo $values[1] ?>">
									</div>

									<div class="col-lg-6">
										<label class="mt-1" style="margin: 0; ">Your relation with the referred person?</label>
										<input style="width: 102%;" disabled class="form-control p-2 mb-2" type="text" id='<?php echo 'ref_relation_' . $num ?>' name="ref_relation_with" placeholder="Your relation with the referred person? *" value="<?php echo $values[2] ?>">
									</div>

									<div class="col-lg-6">
										<label class="mt-1" style="margin: 0;">Ref. Email Address</label>
										<input disabled class="form-control p-2 mb-2" type="text" id='<?php echo 'ref_email_' . $num  ?>' name="ref_email_address" placeholder="Ref. Email Address *" value="<?php echo $values[3] ?>">
									</div>

									<div class="col-lg-6" style="margin-top: -8px;">
										<div style="margin-left: 8px;">
											<label class="mt-1" style="margin: 0;">Ref. Phone number</label>
											<input disabled class="form-control <?php echo 'phone_' . $num ?>" id="<?php echo $phone_number_ref . $num ?>" type="tel" name="ref_phone" placeholder="Ref. Phone number *" style="padding-left: 65px; height: 42px" value="<?php echo $values[4] ?>">
										</div>
									</div>
									<input type="hidden" value="<?php echo $values[0] ?>" name="ref_id">
									<?php $num++ ?>

									<div class="col-lg-12 row mb-2" style="margin-left: 15px; margin-top: 15px; display: none" id="<?php echo 'ref_edit_btn' . $num ?>">
										<button class="btn btn-lg col-lg-12" name="ref_btn" type="submit">Update</button>
									</div>
								</div>
							</form>
						<?php } ?>
						<div class="row col-lg-12 email-input__w inputs-set" style="margin-left: 10px; margin-top:10px">
							<button class="btn-add-input" onclick="addEmailField()" type="button">
								Add more people+
							</button>
						</div>
					</div>
					<div class="container text-center" style="width: 98%; margin-left: 1%; border-bottom: 2px solid black; text-align: center; margin-top: 5px">
					</div>

					<form action="./backend/reference.php" method="post">
						<div class="row col-lg-12" id="email-list"></div>
						<div class="row" style="margin-top: 20px;" id='filled_form_reference_buttn'>
							<div class="col-lg-11 form-group login-btn" style="margin-left: 45px;">
								<button style="width: 100%; padding: 15px;" class="btn" name="submit" type="submit">Send</button>
							</div>
						</div>
					</form>
					<!-- <div class="row col-lg-12 email-input__w inputs-set" id="" style="margin-left: 10px; margin-top:10px">
						<button class="btn-add-input" onclick="addEmailField()" type="button">
							Add more people+
						</button>
					</div>
					<div class="row col-lg-12 mb-2" id="email-list"></div> -->
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<?php include('./components/contribution.php') ?>
	<!-- End Modal -->

	</div>
</section>
<?php include('./components/footer.php') ?>