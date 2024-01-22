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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="../../img/favicon.png">
	<!-- MATERIAL DESIGN ICONIC FONT -->
	<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.css">

	<!-- STYLE CSS -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/dialog.css">
</head>

<body>

	<button id="launch-dialog">Launch dialog</button>
	<div class="wrapper">
		<form action="" id="wizard">
			<!-- SECTION 1 -->
			<h2></h2>
			<section>
				<div class="inner">
					<div class="image-holder">
						<img src="images/form-wizard-1.jpg" alt="">
					</div>

					<a href="./../../index.php">
						<span style="position: absolute; right:10px; top: 10px; cursor: pointer">
							<svg width="40px" height="40px" viewBox="0 0 24 24" fill="none">
								<path d="M5.293 5.293a1 1 0 0 1 1.414 0L12 10.586l5.293-5.293a1 1 0 1 1 1.414 1.414L13.414 12l5.293 5.293a1 1 0 0 1-1.414 1.414L12 13.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L10.586 12 5.293 6.707a1 1 0 0 1 0-1.414z" fill="#0D0D0D" />
							</svg>
						</span>
					</a>

					<div class="form-content">
						<div class="form-header">
							<h3>Registration</h3>
						</div>
						<p>Please fill with your details</p>
						<div class="form-row">
							<div class="form-holder">
								<input type="text" placeholder="First Name" class="form-control">
							</div>
							<div class="form-holder">
								<input type="text" placeholder="Last Name" class="form-control">
							</div>
						</div>

						<div class="form-row">
							<div class="form-holder">
								<label for="country" class="select">
									<select id="country" name="country" class="form-control select-control" id='country'>
										<option value="" selected disabled>Country (Birth)</option>
										<?php foreach ($data as $key) { ?>
											<option value="<?php echo $key[1] ?>"><?php echo $key[2] ?></option>
										<?php } ?>
									</select>
								</label>
							</div>
							<div class="form-holder">
								<label for="">
									<input placeholder="Date of birth" class="textbox-n form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
								</label>
							</div>
						</div>

						<div class="form-row">
							<div class="form-holder">
								<label for="country">
									<select id="country" name="country" class="form-control" id='country'>
										<option value="" selected disabled>Nationality</option>
										<?php foreach ($data as $key) { ?>
											<option style="padding: 5px" value="<?php echo $key[1] ?>"><?php echo $key[2] ?></option>
										<?php } ?>
									</select>
								</label>
							</div>
							<div class="form-holder" style="align-self: flex-end; transform: translateY(4px);">
								<div class="checkbox-tick">
									<label class="male">
										<input type="radio" name="gender" value="male" checked> Male<br>
										<span class="checkmark"></span>
									</label>
									<label class="female">
										<input type="radio" name="gender" value="female"> Female<br>
										<span class="checkmark"></span>
									</label>
								</div>
							</div>
						</div>



						<div class="form-row">
							<div class="form-holder">
								<label for="country" class="select">
									<select id="country" name="country" class="form-control select-control" id='country'>
										<option value="" selected disabled>Country (Residence)</option>
										<?php foreach ($data as $key) { ?>
											<option value="<?php echo $key[1] ?>"><?php echo $key[2] ?></option>
										<?php } ?>
									</select>
								</label>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- SECTION 2 -->
			<h2></h2>
			<section>
				<div class="inner">
					<div class="image-holder">
						<img src="images/form-wizard-2.jpg" alt="">
					</div>

					<a href="./../../index.php">
						<span style="position: absolute; right:10px; top: 10px; cursor: pointer">
							<svg width="40px" height="40px" viewBox="0 0 24 24" fill="none">
								<path d="M5.293 5.293a1 1 0 0 1 1.414 0L12 10.586l5.293-5.293a1 1 0 1 1 1.414 1.414L13.414 12l5.293 5.293a1 1 0 0 1-1.414 1.414L12 13.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L10.586 12 5.293 6.707a1 1 0 0 1 0-1.414z" fill="#0D0D0D" />
							</svg>
						</span>
					</a>

					<div class="form-content">
						<div class="form-header">
							<h3>Registration</h3>
						</div>
						<p>Please fill with additional info</p>
						<div class="form-row">
							<div class="form-holder">
								<input type="text" placeholder="Province/State" class="form-control">
							</div>
							<div class="form-holder">
								<input type="text" placeholder="District/City" class="form-control">
							</div>
						</div>
						<div class="form-row">
							<div class="form-holder">
								<input type="text" placeholder="City" class="form-control">
							</div>
							<div class="form-holder">
								<input type="text" placeholder="Zip Code" class="form-control">
							</div>
						</div>

						<div class="form-row">
							<div class="select">
								<div class="form-holder">
									<div class="select-control">Your country</div>
									<i class="zmdi zmdi-caret-down"></i>
								</div>
								<ul class="dropdown">
									<li rel="United States">United States</li>
									<li rel="United Kingdom">United Kingdom</li>
									<li rel="Viet Nam">Viet Nam</li>
								</ul>
							</div>
							<div class="form-holder"></div>
						</div>
					</div>
				</div>
			</section>

			<!-- SECTION 3 -->
			<h2></h2>
			<section>
				<div class="inner">
					<div class="image-holder">
						<img src="images/form-wizard-3.jpg" alt="">
					</div>

					<a href="./../../index.php">
						<span style="position: absolute; right:10px; top: 10px; cursor: pointer">
							<svg width="40px" height="40px" viewBox="0 0 24 24" fill="none">
								<path d="M5.293 5.293a1 1 0 0 1 1.414 0L12 10.586l5.293-5.293a1 1 0 1 1 1.414 1.414L13.414 12l5.293 5.293a1 1 0 0 1-1.414 1.414L12 13.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L10.586 12 5.293 6.707a1 1 0 0 1 0-1.414z" fill="#0D0D0D" />
							</svg>
						</span>
					</a>

					<div class="form-content">
						<div class="form-header">
							<h3>Registration</h3>
						</div>
						<p>Send an optional message</p>
						<div class="form-row">
							<div class="form-holder w-100">
								<textarea name="" id="" placeholder="Your messagere here!" class="form-control" style="height: 99px;"></textarea>
							</div>
						</div>
						<div class="checkbox-circle mt-24">
							<label>
								<input type="checkbox" checked> Please accept <a href="#">terms and conditions ?</a>
								<span class="checkmark"></span>
							</label>
						</div>
					</div>
				</div>
			</section>
		</form>
	</div>

	<!-- JQUERY -->
	<script src="js/jquery-3.3.1.min.js"></script>

	<!-- JQUERY STEP -->
	<script src="js/jquery.steps.js"></script>
	<script src="js/main.js"></script>
	<script src="js/dialog.js"></script>
	<!-- Template created and distributed by Colorlib -->
</body>

</html>