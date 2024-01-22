<?php

header('Content-Type: text/html; charset=utf-8');

if (!isset($_COOKIE['loggedIn'])) {
	header('location: ./login.php');
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

$connection = mysqli_connect('localhost', 'akrami', 'afghan', 'sti');
$connection->set_charset("utf8");

$provinces = 'SELECT * FROM `z_countries`';
$result = mysqli_query($connection, $provinces);
$country_data = mysqli_fetch_all($result);

$districts = 'SELECT * FROM `z_provinces`';
$result1 = mysqli_query($connection, $districts);
$provinces_data = mysqli_fetch_all($result1);

$profession = 'SELECT * FROM `z_profession` ORDER by name';
$profession_result = mysqli_query($connection, $profession);
$profession_data = mysqli_fetch_all($profession_result);

if (isset($_COOKIE['loggedIn'])) {
	$email = $_COOKIE['loggedIn'];
	$pre_data_query = 'SELECT * FROM `main_form` where email_address="' . $email . '"';
	$pre_result = mysqli_query($connection, $pre_data_query);
	$pre_data = mysqli_fetch_row($pre_result);
}

include('./components/header.php');

?>

<div class="container" style="background-color: blue; min-height: 50px; border-radius: 10px"></div>
<section class="contact-us section" style="padding: 50px !important;">
	<div class="container">
		<div class="inner">
			<div class="row">
				<div class="col-lg-12">

					<!-- Personal information -->
					<div class="contact-us-form">
						<h2 style="text-align: center;">Profile information</h2>
						<form class="form" method="post" action="backend/edits.php">
							<div class="row form">
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

								<div class="col-lg-6" style="margin-top: 10px;">
									<div class="form-group">
										<label for=""> First Name</label>
										<input type="text" style="background-color: #e9ecef;" value="<?php echo $pre_data[1] ?>" name="first_name" id='first_name' placeholder="First Name" required="" disabled>
									</div>
								</div>
								<div class="col-lg-6" style="margin-top: 10px;">
									<div class="form-group">
										<label for=""> Last Name</label>
										<input type="text" style="background-color: #e9ecef;" value="<?php echo $pre_data[2] ?>" name="last_name" id='last_name' placeholder="Last Name" required="" disabled>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group">
										<label for=""> Date of Birth</label>
										<input style="background-color: #e9ecef;" placeholder="Date of birth" value="<?php echo $pre_data[3] ?>" name="date_of_birth" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" required disabled>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group">
										<label for=""> Birth Country</label>
										<select name="birth_country" id="birth" class="wide form-control" style="height: 50px;border:1px solid #eee" required disabled>
											<option value="<?php echo $pre_data[4] ?>" class="nice-select hidden" hidden><?php echo $pre_data[4] == '' ? 'Birth Country' : $pre_data[4] ?></option>
											<?php foreach ($country_data as $values) { ?>
												<option value="<?php echo $values[2] ?>">
													<?php echo $values[2] ?>
												</option>
											<?php } ?>
										</select>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group">
										<label for=""> Nationality</label>
										<select name="nationality" id="nationality" class="wide form-control" style="height: 50px;border:1px solid #eee" required disabled>
											<!-- <option value="<?php echo $pre_data[5] ?>" class="nice-select hidden" hidden><?php echo $pre_data[5] ?></option> -->
											<option value="<?php echo $pre_data[5] ?>" class="nice-select hidden" hidden><?php echo $pre_data[5] == '' ? 'Nationality' : $pre_data[5] ?></option>
											<?php foreach ($country_data as $value) { ?>
												<option value='<?php echo $value[3]; ?>'>
													<?php echo $value[3] ?>
												</option>
											<?php } ?>
										</select>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group">
										<label for=""> Second Nationality</label>
										<select name="nationality_second" id="nationality_second" class="wide form-control" style="height: 50px;border:1px solid #eee" disabled>
											<option value="<?php echo $pre_data[6] == '' ? '' : $pre_data[6] ?>" class="nice-select hidden" hidden><?php echo $pre_data[6] == '' ? 'Second Nationality' : $pre_data[6] ?></option>
											<option class="nice-select hidden" selected>Second Nationality</option>
											<?php foreach ($country_data as $value) { ?>
												<option value="<?php echo $value[3] ?>">
													<?php echo $value[3] ?>
												</option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for=""> Residential Country</label>
										<select name="residential_country" id="residential_country" class="wide form-control" style="height: 50px; border:1px solid #eee" required disabled>
											<option value="<?php echo $pre_data[7] ?>" class="nice-select hidden" hidden><?php echo $pre_data[7] != '' ? $pre_data[7] : 'Residential Country'  ?></option>
											<?php foreach ($country_data as $value) { ?>
												<option value="<?php echo $value[2] ?>	">
													<?php echo $value[2] ?>
												</option>
											<?php } ?>
										</select>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group">
										<label for="">City</label>
										<input style="background-color: #e9ecef;" value="<?php echo $pre_data[8] ?>" type="text" name="district" placeholder="City" required disabled id="pdistrict">
									</div>
								</div>


								<!-- Afghan Origion -->
								<div class="col-lg-6">
									<div class="form-check form-switch" style="margin-top: 10px; margin-left: 30px;">
										<input name="afghan_check" style="width: 20px; height: 20px;" class="form-check-input" type="checkbox" role="switch" id="filled_form_afghan_check" <?php echo $pre_data[9] == 'NULL' ? '' : 'checked' ?>>
										<label class="form-check-label" for="filled_form_afghan_check" style="color:black; font-size:16px; margin-top: 3px">Afghan Origion ? </label>
									</div>
								</div>

								<div id="filled_form_afghan_check_field" class="col-lg-12">

									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label for="">Valayat</label>
												<select name="volayat" id="province" class="wide form-control" style="height: 50px; border:1px solid #eee" disabled>
													<option value="<?php echo $pre_data[10] ?>" class="nice-select hidden" hidden><?php echo $pre_data[10] == '' ? 'Volayat' : $pre_data[10] ?> </option>
													<?php foreach ($provinces_data as $value) { ?>
														<option value="<?php echo $value[1] ?>">
															<?php echo $value[1] ?>
														</option>
													<?php } ?>
												</select>
											</div>
										</div>

										<div class="col-lg-6">
											<div class="form-group">
												<label for="">Volaswali</label>
												<select name="volaswali" id="volaswali" class="wide form-control" style="height: 50px; border:1px solid #eee" disabled>
													<option value="<?php echo $pre_data[11] ?>" class="nice-select hidden" hidden><?php echo $pre_data[11] == '' ? 'Volaswali' : $pre_data[11] ?></option>
													<?php foreach ($provinces_data as $value) { ?>
														<option value="<?php echo $value[1] ?>">
															<?php echo $value[1] ?>
														</option>
													<?php } ?>
												</select>
											</div>
										</div>

										<div class="col-lg-6">
											<div class="form-group">
												<label for="">Tazkira Number </label>
												<input type="text" style="background-color: #e9ecef;" value="<?php echo $pre_data[12] ?>" id="tazkira" name="tazkira" placeholder="Afghan Tazkira/ID card" disabled>
											</div>
										</div>

										<div class="col-lg-6">
											<div class="form-group">

											</div>
										</div>
									</div>
									<div class="form-group login-btn" id="personal_info_btn" style="display: none;">
										<button class="btn" name="personal_info_submit" type="submit">Save</button>
									</div>
								</div>
							</div>
						</form>
					</div>

					<!-- Education -->
					<form class="form " method="post" action="backend/edits.php">
						<div class="row form contact-us-form">
							<div class="container text-center" style="width: 98%; margin-left: 1%; border-bottom: 2px solid black; text-align: center">
								<div class="row align-items-start">
									<div class="col-3">
										<span style="background: purple;color: white;width: 220px;height: 30px;padding:5px; font-size: 18px; font-weight:100" class="badge mt-5 text-bg-success">Education & Experience</span>
									</div>
									<div class="col"></div>
									<div class="col-1" style="margin-top: 50px;" id="education">
										<span>
											<svg width="25" height="25" viewBox="0 0 16 16" version="1.1" style="margin-top: -4px; cursor:pointer">
												<path fill="blue" d="M16 4c0 0 0-1-1-2s-1.9-1-1.9-1l-1.1 1.1v-2.1h-12v16h12v-8l4-4zM6.3 11.4l-0.6-0.6 0.3-1.1 1.5 1.5-1.2 0.2zM7.2 9.5l-0.6-0.6 5.2-5.2c0.2 0.1 0.4 0.3 0.6 0.5zM14.1 2.5l-0.9 1c-0.2-0.2-0.4-0.3-0.6-0.5l0.9-0.9c0.1 0.1 0.3 0.2 0.6 0.4zM11 15h-10v-14h10v2.1l-5.9 5.9-1.1 4.1 4.1-1.1 2.9-3v6z"></path>
											</svg>
										</span>
									</div>
								</div>
							</div>

							<div class="col-lg-6" style="margin-top: 10px;">
								<div class="form-group">
									<label for="">Qualification</label>
									<select name="qualification" id="qualification" class="wide form-control" style="height: 50px; border:1px solid #eee" required disabled>
										<option value="<?php echo $pre_data[13] ?>" class="nice-select hidden" hidden><?php echo $pre_data[13] ?></option>
										<option value="Doctoral degree">Doctoral degree</option>
										<option value="Masters degree">Masters degree</option>
										<option value="Graduate diploma">Graduate diploma</option>
										<option value="Graduate certificate">Graduate certificate</option>
										<option value="Bachelor degree">Bachelor degree</option>
										<option value="Diploma">Diploma</option>
										<option value="Advanced diploma/Associates degree">Advanced diploma/Associates degree</option>
									</select>
								</div>
							</div>

							<div class="col-lg-6" style="margin-top: 10px;">
								<div class="form-group">
									<label for="">Specialization</label>
									<input type="text" id="specialization" style="background-color: #e9ecef;" value="<?php echo $pre_data[14] ?>" name="specialization" required="" disabled>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="">University Name</label>
									<input type="text" id="university" style="background-color: #e9ecef;" value="<?php echo $pre_data[15] ?>" name="university" required="" disabled>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group">
									<label for="">Country (University)</label>
									<select name="university_country" id="university_country" class="wide form-control" style="height: 50px; border:1px solid #eee" required disabled>
										<option value="<?php echo $pre_data[16] ?>" class="nice-select hidden" hidden><?php echo $pre_data[16] ?></option>
										<?php foreach ($data as $value) { ?>
											<option value="<?php echo $value[2] ?>">
												<?php echo $value[2] ?>
											</option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group">
									<label for="">Profession</label>
									<select name="profession" id="profession" class="wide form-control" style="height: 50px; border:1px solid #eee" required disabled>
										<option value="<?php echo $pre_data[17] ?>" class="nice-select hidden" hidden><?php echo $pre_data[17] ?></option>
										<?php foreach ($profession_data as $value) { ?>
											<option value="<?php echo $value[1] ?>">
												<?php echo $value[1] ?>
											</option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group">
									<label for="">Experience (Years)</label>
									<select name="experience" id="experience" class="wide form-control" style="height: 50px; border:1px solid #eee" required disabled>
										<option value="<?php echo $pre_data[18] ?>" class="nice-select hidden" hidden><?php echo $pre_data[18] ?></option>
										<option data-value="1" class="option">1</option>
										<option data-value="2" class="option">2</option>
										<option data-value="3" class="option">3</option>
										<option data-value="4" class="option">4</option>
										<option data-value="5" class="option">5</option>
										<option data-value="5+" class="option">5+</option>
									</select>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group">
									<label for="">Current/Recenter Job Title</label>
									<input type="text" id="job_titile" style="background: #e9ecef" value="<?php echo $pre_data[19] ?>" name="job" placeholder="Current/Recenter Job Title" required="" disabled>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group">
									<label for="">Current/Last Employer</label>
									<input type="text" id="employer" style="background: #e9ecef" value="<?php echo $pre_data[20] ?>" name="last_employer" placeholder="Current/Last Employer" required="" disabled>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group">
									<label for="">Country (Employement)</label>
									<select name="employement_country" id="employement_country" class="wide form-control" style="height: 50px; border:1px solid #eee" required disabled>
										<option value="<?php echo $pre_data[21] ?>" class="nice-select hidden" hidden><?php echo $pre_data[21] ?></option>
										<?php foreach ($data as $value) { ?>
											<option value="<?php echo $value[2] ?>">
												<?php echo $value[2] ?>
											</option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group">
									<label for="">Area of contribution</label>
									<input type="text" id="area_of_contirubution" style="background-color: #e9ecef;" value="<?php echo $pre_data[22] ?>" name="area_of_contribution" placeholder="Area of contribution" required="">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group login-btn" id="education_info_btn" style="display: none;">
									<button class="btn" name="personal_info_submit" type="submit">Save</button>
								</div>
							</div>
						</div>
					</form>


					<!-- Relocation -->
					<form class="form " method="post" action="backend/edits.php">
						<div class="row form contact-us-form">

							<div class="row col-lg-12" style="margin-top: 30px; margin-bottom: 30px" id="relocation_content1">
								<div class="container text-center" style="width: 98%; margin-left: 1%; border-bottom: 2px solid black; text-align: center">
									<div class="row align-items-start">
										<div class="col-3">
											<span style="background: purple;color: white;width: 220px;height: 30px;padding:5px; font-size: 18px; font-weight:100" class="badge mt-5 text-bg-success">Relocation</span>
										</div>
										<div class="col"></div>
										<div class="col-1" style="margin-top: 50px;" id="relocation">
											<span>
												<svg width="25" height="25" viewBox="0 0 16 16" version="1.1" style="margin-top: -4px; cursor:pointer">
													<path fill="blue" d="M16 4c0 0 0-1-1-2s-1.9-1-1.9-1l-1.1 1.1v-2.1h-12v16h12v-8l4-4zM6.3 11.4l-0.6-0.6 0.3-1.1 1.5 1.5-1.2 0.2zM7.2 9.5l-0.6-0.6 5.2-5.2c0.2 0.1 0.4 0.3 0.6 0.5zM14.1 2.5l-0.9 1c-0.2-0.2-0.4-0.3-0.6-0.5l0.9-0.9c0.1 0.1 0.3 0.2 0.6 0.4zM11 15h-10v-14h10v2.1l-5.9 5.9-1.1 4.1 4.1-1.1 2.9-3v6z"></path>
												</svg>
											</span>
										</div>
									</div>
								</div>


								<div class="col-lg-6" style="margin-top: 10px;">
									<div class="form-group">
										<label for="">Preferred City for Relocation</label>
										<select name="perfered_city" id="city" class="wide form-control" style="height: 50px; border:1px solid #eee" disabled>
											<option value="<?php echo $pre_data[24] ?>" class="nice-select hidden" hidden><?php echo $pre_data[24] ?></option>
											<?php foreach ($provinces_data as $value) { ?>
												<option value="<?php echo $value[1] ?>">
													<?php echo $value[1] ?>
												</option>
											<?php } ?>
										</select>
									</div>
								</div>

								<div class="col-lg-6" style="margin-top: 10px;">
									<div class="form-group">
										<label for="">Mode of Engagement</label>
										<select name="mode_of_engagement" id="engagement" class="wide form-control" style="height: 50px; border:1px solid #eee" disabled>
											<option value="<?php echo $pre_data[25] ?>" class="nice-select hidden" hidden><?php echo $pre_data[25] == '' ? 'Mode of Engagement' : $pre_data[25] ?></option>
											<option data-value="1" class="option">Online</option>
											<option data-value="2" class="option">Onsite</option>
											<option data-value="3" class="option">Hybrid</option>
										</select>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group">
										<label for="">Period of Engagement</label>
										<select name="period_of_engagement" id="period_of_engagement" class="wide form-control" style="height: 50px; border:1px solid #eee" disabled>
											<option value="<?php echo $pre_data[26] ?>" class="nice-select hidden" hidden><?php echo $pre_data[26] == '' ? 'Period of Engagement' : $pre_data[26] ?></option>
											<option data-value="1" class="option">Online</option>
											<option data-value="2" class="option">Onsite</option>
											<option data-value="3" class="option">Hybrid</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</form>

					<!-- Proposal content -->
					<form class="form " method="post" action="backend/edits.php">
						<div class="row form contact-us-form">

							<div class="row col-lg-12" style="margin-top: -20px; margin-bottom: 30px; display: none" id="proposal_content1">
								<div class="container text-center" style="width: 98%; margin-left: 1%; border-bottom: 2px solid black; text-align: center;">
									<div class="row align-items-start">
										<div class="col-3">
											<span style="background: purple;color: white;width: 220px;height: 30px;padding:5px; font-size: 18px; font-weight:100" class="badge mt-5 text-bg-success">Proposal content</span>
										</div>
										<div class="col"></div>
										<div class="col-1" style="margin-top: 50px;" id="proposal">
											<span>
												<svg width="25" height="25" viewBox="0 0 16 16" version="1.1" style="margin-top: -4px; cursor:pointer">
													<path fill="blue" d="M16 4c0 0 0-1-1-2s-1.9-1-1.9-1l-1.1 1.1v-2.1h-12v16h12v-8l4-4zM6.3 11.4l-0.6-0.6 0.3-1.1 1.5 1.5-1.2 0.2zM7.2 9.5l-0.6-0.6 5.2-5.2c0.2 0.1 0.4 0.3 0.6 0.5zM14.1 2.5l-0.9 1c-0.2-0.2-0.4-0.3-0.6-0.5l0.9-0.9c0.1 0.1 0.3 0.2 0.6 0.4zM11 15h-10v-14h10v2.1l-5.9 5.9-1.1 4.1 4.1-1.1 2.9-3v6z"></path>
												</svg>
											</span>
										</div>
									</div>
								</div>

								<div class="col-lg-6" style="margin-top: 10px;">
									<div class="">
										<div class="mb-3">
											<label for="proposal_attachments" class="form-label">Attach your Proposal</label>
											<input class="d-block" type="file" id="proposal_attachments" name="proposal_attachment" disabled>
										</div>
									</div>
								</div>

								<div class="col-lg-6" style="margin-top: 10px;">
									<div class="form-group">
										<select name="start_work" id="start_work" class="wide form-control" style="height: 50px; border:1px solid #eee" disabled>
											<option value="<?php echo $pre_data[29] ?>" class="nice-select hidden" hidden><?php echo $pre_data[29] ?> (When you are ready to start?)</option>
											<option data-value="1" class="option">Day</option>
											<option data-value="1" class="option">Week</option>
											<option data-value="2" class="option">Month</option>
											<option data-value="3" class="option">Quarter</option>
											<option data-value="4" class="option">Half an year</option>
											<option data-value="5" class="option">1 Year</option>
											<option data-value="5" class="option">Years</option>
										</select>
									</div>
								</div>

								<div class="col-lg-12">
									<div class="form-group">
										<textarea name="proposal_message" value="<?php echo $pre_data[30] ?>" id='proposal_message' placeholder="<?php echo $pre_data[30] ?>" disabled></textarea>
									</div>
								</div>

							</div>
						</div>
					</form>

					<!-- Contact -->
					<form class="form " method="post" action="backend/edits.php">
						<div class="row form contact-us-form">
							<div class="row col-lg-12" style="margin-top: -20px; margin-bottom: 30px" id="proposal_content12">

								<div class="container text-center" style="width: 98%; margin-left: 1%; border-bottom: 2px solid black; text-align: center">
									<div class="row align-items-start">
										<div class="col-3">
											<span style="background: purple;color: white;width: 220px;height: 30px;padding:5px; font-size: 18px; font-weight:100" class="badge mt-5 text-bg-success">Contact Details</span>
										</div>
										<div class="col"></div>
										<div class="col-1" style="margin-top: 50px;" id="contact_detail">
											<span>
												<svg width="25" height="25" viewBox="0 0 16 16" version="1.1" style="margin-top: -4px; cursor:pointer">
													<path fill="blue" d="M16 4c0 0 0-1-1-2s-1.9-1-1.9-1l-1.1 1.1v-2.1h-12v16h12v-8l4-4zM6.3 11.4l-0.6-0.6 0.3-1.1 1.5 1.5-1.2 0.2zM7.2 9.5l-0.6-0.6 5.2-5.2c0.2 0.1 0.4 0.3 0.6 0.5zM14.1 2.5l-0.9 1c-0.2-0.2-0.4-0.3-0.6-0.5l0.9-0.9c0.1 0.1 0.3 0.2 0.6 0.4zM11 15h-10v-14h10v2.1l-5.9 5.9-1.1 4.1 4.1-1.1 2.9-3v6z"></path>
												</svg>
											</span>
										</div>
									</div>
								</div>

								<div class="col-lg-6" style="margin-top: 10px;">
									<div class="form-group">
										<input required="true" value="<?php echo $pre_data[31] ?>" id="phone" type="tel" name="phone" style="height: 50px; padding-left: 65px; background-color: #e9ecef" disabled>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group">
										<input id="website" style="background-color: #e9ecef; margin-top: 10px" type="text" value="<?php echo $pre_data[33] . '( Website )' ?>" name="website_address" placeholder="Website Address" disabled>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group">
										<input id="linkedIn" style="background-color: #e9ecef;" type="text" value="<?php echo $pre_data[34] . '( LinkedIn page )' ?>" name="linkedin_page" placeholder="LinkedIn Page" disabled>
									</div>
								</div>
							</div>
						</div>
					</form>

					<!-- References -->
					<form class="form " method="post" action="backend/edits.php">
						<div class="row form contact-us-form">
							<div class="row col-lg-12" style="margin-top: -20px; margin-bottom: -20px" id="refer_content1">

								<div class="container text-center" style="width: 98%; margin-left: 1%; border-bottom: 2px solid black; text-align: center">
									<div class="row align-items-start">
										<div class="col-3">
											<span style="background: purple;color: white;width: 220px;height: 30px;padding:5px; font-size: 18px; font-weight:100" class="badge mt-5 text-bg-success">Referencing someone</span>
										</div>
										<div class="col"></div>
										<div class="col-1" style="margin-top: 50px;" id="ref_contact_detail">
											<span>
												<svg width="25" height="25" viewBox="0 0 16 16" version="1.1" style="margin-top: -4px; cursor:pointer">
													<path fill="blue" d="M16 4c0 0 0-1-1-2s-1.9-1-1.9-1l-1.1 1.1v-2.1h-12v16h12v-8l4-4zM6.3 11.4l-0.6-0.6 0.3-1.1 1.5 1.5-1.2 0.2zM7.2 9.5l-0.6-0.6 5.2-5.2c0.2 0.1 0.4 0.3 0.6 0.5zM14.1 2.5l-0.9 1c-0.2-0.2-0.4-0.3-0.6-0.5l0.9-0.9c0.1 0.1 0.3 0.2 0.6 0.4zM11 15h-10v-14h10v2.1l-5.9 5.9-1.1 4.1 4.1-1.1 2.9-3v6z"></path>
												</svg>
											</span>
										</div>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group">
										<input style="background-color: #e9ecef; margin-top: 10px" type="text" value="<?php echo $pre_data[36] . '( Referred (Ref.) Person )' ?>" id="ref_person_name" name="ref_person_name" placeholder="Referred (Ref.) Person Name" disabled>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group">
										<input style="background-color: #e9ecef; margin-top: 10px" type="text" value="<?php echo $pre_data[37] . '( Your relation with the )' ?>" id="ref_relation_with" name="ref_relation_with" placeholder="Your relation with the referred person?" disabled>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group">
										<input style="background-color: #e9ecef; margin-bottom: 30px " type="text" value="<?php echo $pre_data[38] . '( Ref. Email Address )' ?>" id="ref_email_address" name="ref_email_address" placeholder="Ref. Email Address" disabled>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group">
										<input type="tel" id="phone1" name="phone1" value="<?php echo $pre_data[39] ?>" placeholder="Ref. Phone number" style="width: 190%; height: 50px; padding-left: 65px; background-color: #e9ecef;" disabled>
									</div>
								</div>

							</div>
						</div>
					</form>
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