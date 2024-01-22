<?php
header('Content-Type: text/html; charset=utf-8');

if (!isset($_COOKIE['loggedIn'])) {
	//	header('location: ./mainform.php');
	header('location: ../../index.php');
}

$conn = mysqli_connect('localhost', 'akrami', 'afghan', 'sti');
$conn->set_charset("utf8");

$sql = 'select * from z_countries';
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($result);

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>STI</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/opensans-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- datepicker -->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
	<!-- Main Style Css -->
	<link rel="stylesheet" href="css/style.css" />
	<link rel="shortcut icon" href="../../img/favicon.png" type="image/x-icon">
</head>

<body>
	<div class="page-content" style="background-color: white;">
		<div class="wizard-heading" style="color: black; margin-top: -50px !important">Form Booking Wizard</div>

		<div class="wizard-v6-content">
			<div class="wizard-form">
				<form class="form-register" id="form-register" action="#" method="post">
					<div id="form-total">
						<!-- SECTION 1 -->
						<h2>
							<p class="step-icon"><span>1</span></p>
							<span class="step-text">Personal Info</span>
						</h2>
						<section>
							<div class="inner">
								<div class="form-heading">
									<h3>Personal Info</h3>
									<span>1/3</span>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="" name="" required>
											<span class="label">First Name</span>
										</label>
									</div>
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="" name="" required>
											<span class="label">Last Name</span>
										</label>
									</div>
								</div>

								<div class="form-row">
									<div class="form-holder">
										<label for="day" class="special-label-1">Date of birth</label>
										<input type="date" name="day">
									</div>
									<div class="form-holder">
										<label class="special-label-1">Country (Birth) </label>
										<select name="time" id="" class="form-control">
											<option hidden selected value="">Select one</option>
											<?php foreach ($data as $key) { ?>
												<option value="<?php echo $key[1] ?>"><?php echo $key[2] ?></option>
											<?php } ?>
										</select>
										<span class="select-btn">
											<i class="zmdi zmdi-chevron-down"></i>
										</span>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<label class="special-label-1">Nationality </label>
										<select name="time" id="" class="form-control">
											<option hidden selected value="">Select one</option>
											<?php foreach ($data as $key) { ?>
												<option value="<?php echo $key[3] ?>"><?php echo $key[3] ?></option>
											<?php } ?>
										</select>
										<span class="select-btn">
											<i class="zmdi zmdi-chevron-down"></i>
										</span>
									</div>
									<div class="form-holder">
										<label class="special-label-1">Second Nationality (if applicable) </label>
										<select name="time" id="" class="form-control">
											<option hidden selected value="">Select one</option>
											<?php foreach ($data as $key) { ?>
												<option value="<?php echo $key[3] ?>"><?php echo $key[3] ?></option>
											<?php } ?>
										</select>
										<span class="select-btn">
											<i class="zmdi zmdi-chevron-down"></i>
										</span>
									</div>
								</div>

								<div class="form-row">
									<div class="form-holder">
										<label class="special-label-1">Country (Residence) </label>
										<select name="time" id="" class="form-control">
											<option hidden selected value="">Select one</option>
											<?php foreach ($data as $key) { ?>
												<option value="<?php echo $key[3] ?>"><?php echo $key[3] ?></option>
											<?php } ?>
										</select>
										<span class="select-btn">
											<i class="zmdi zmdi-chevron-down"></i>
										</span>
									</div>
									<div class="form-holder" style="padding-top: 25px;">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="" name="" required>
											<span class="label">Province/State</span>
										</label>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="" name="" required>
											<span class="label">District/City</span>
										</label>
									</div>

									<span style="color: white; font-size: 16px; margin-top: 20px; margin-left: 40px">
										Afghan Origin: <input id="showHideCheckbox" type="checkbox" class="form-control" style="width: 20px; height: 20px; font-size: 20px; position: relative; top:5px; left: 60px">Yes:
										<button id="showButton">Show Element</button>
										<button id="hideButton">Hide Element</button>
									</span>

								</div>

								<div class="form-row" id="myElement">
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="" name="" required>
											<span class="label">Province</span>
										</label>
									</div>
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="" name="" required>
											<span class="label">District</span>
										</label>
									</div>
								</div>

								<div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="" name="" required>
											<span class="label">Afghan Tazkira</span>
										</label>
									</div>
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="" name="" required>
											<span class="label"></span>
										</label>
									</div>
								</div>

								<button id="showButton">Show Element</button>
								<button id="hideButton">Hide Element</button>
								<div id="myElement">This is the element to show/hide.</div>

								<div class="form-row form-row-date">
									<div class="form-holder form-holder-2">
										<label for="date" class="special-label">Date of Birth:</label>
										<select name="date" id="date" class="form-control">
											<option value="15" selected>15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
										</select>
										<select name="month" id="month" class="form-control">
											<option value="Jan" selected>Jan</option>
											<option value="Feb">Feb</option>
											<option value="Mar">Mar</option>
											<option value="Apr">Apr</option>
											<option value="May">May</option>
										</select>
										<select name="year" id="year" class="form-control">
											<option value="2018" selected>2018</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<option value="2015">2015</option>
											<option value="2014">2014</option>
											<option value="2013">2013</option>
										</select>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="address" name="address" required>
											<span class="label">Address Location</span>
										</label>
									</div>
								</div>
							</div>
						</section>
						<!-- SECTION 2 -->
						<h2>
							<p class="step-icon"><span>2</span></p>
							<span class="step-text">Booking</span>
						</h2>
						<section>
							<div class="inner">
								<div class="form-heading">
									<h3>Booking Infomation</h3>
									<span>2/3</span>
								</div>
								<div class="form-images">
									<img src="images/wizard_v6.jpg" alt="wizard_v6">
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="room" class="special-label-1">Choose a Room </label>
										<select name="room" id="room" class="form-control">
											<option value="Daily Design Metting - Metting Room No.1" selected>Daily Design Metting - Metting Room No.1</option>
											<option value="Single">Single</option>
											<option value="Double">Double</option>
										</select>
										<span class="select-btn">
											<i class="zmdi zmdi-chevron-down"></i>
										</span>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<label for="day" class="special-label-1">Organization Day</label>
										<input type="text" name="day" class="day" id="day" placeholder="15 / 08 / 2018">
									</div>
									<div class="form-holder">
										<label class="special-label-1">Time Open </label>
										<select name="time" id="" class="form-control">
											<option value="8:00am - 10.00am" selected>8:00am - 10.00am</option>
											<option value="9:00am - 21:00pm">9:00am - 21:00pm</option>
											<option value="10:00am - 22:00pm">10:00am - 22:00pm</option>
											<option value="12:00am - 24:00pm">12:00am - 24:00pm</option>
										</select>
										<span class="select-btn">
											<i class="zmdi zmdi-chevron-down"></i>
										</span>
									</div>
								</div>
							</div>
						</section>
						<!-- SECTION 3 -->
						<h2>
							<p class="step-icon"><span>3</span></p>
							<span class="step-text">Confirm</span>
						</h2>
						<a href="../../index.php">
							<p class="" style="color: white; position:absolute;top:20px; right: 50px; cursor:pointer">
								<span>
									<svg width="50px" height="50px" viewBox="0 0 16 16">
										<path fill="#ffffff" fill-rule="evenodd" d="M11.2929,3.29289 C11.6834,2.90237 12.3166,2.90237 12.7071,3.29289 C13.0976,3.68342 13.0976,4.31658 12.7071,4.70711 L9.41421,8 L12.7071,11.2929 C13.0976,11.6834 13.0976,12.3166 12.7071,12.7071 C12.3166,13.0976 11.6834,13.0976 11.2929,12.7071 L8,9.41421 L4.70711,12.7071 C4.31658,13.0976 3.68342,13.0976 3.29289,12.7071 C2.90237,12.3166 2.90237,11.6834 3.29289,11.2929 L6.58579,8 L3.29289,4.70711 C2.90237,4.31658 2.90237,3.68342 3.29289,3.29289 C3.68342,2.90237 4.31658,2.90237 4.70711,3.29289 L8,6.58579 L11.2929,3.29289 Z" />
									</svg>
								</span>
							</p>
						</a>
						<section>
							<div class="inner">
								<div class="form-heading">
									<h3>Comfirm Details</h3>
									<span>3/3</span>
								</div>

								<div class="table-responsive">
									<table class="table">
										<tbody>
											<tr class="space-row">
												<th>Full Name:</th>
												<td id="fullname-val"></td>
											</tr>
											<tr class="space-row">
												<th>Room:</th>
												<td id="room-val"></td>
											</tr>
											<tr class="space-row">
												<th>Day:</th>
												<td id="day-val"></td>
											</tr>
											<tr class="space-row">
												<th>Time:</th>
												<td id="time-val"></td>
											</tr>
											<tr class="space-row">
												<th>Price:</th>
												<td id="price-val">40.00$</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</section>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="js/jquery-3.3.1.min.js"></script>
	<script>
		$(document).ready(function() {
			$("#myElement").hide();

			// Show element when "Show Element" button is clicked
			$("#showButton").click(function() {
				$("#myElement").show();
			});

			// Hide element when "Hide Element" button is clicked
			$("#hideButton").click(function() {
				$("#myElement").hide();
			});
		});

		$(document).ready(function() {
			$("#myElement").hide();

			// Show or hide element based on checkbox state
			$("#showHideCheckbox").change(function() {
				if ($(this).is(":checked")) {
					$("#myElement").show();
				} else {
					$("#myElement").hide();
				}
			});
		});
	</script>


	<script src="js/jquery.steps.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/my-script.js"></script>


</body>

</html>