<?php

if (isset($_COOKIE['loggedIn'])) {
	header('location: ./mainform.php');
}

$display = 'none';
if (isset($_GET['check'])) {
	$display = '';
}


if (isset($_GET['yes'])) {
	$message = "Incorrect password";
	echo "<script>alert('$message');</script>";
}


if (isset($_GET['no'])) {
	$message = "User not found";
	echo "<script>alert('$message');</script>";
}

if (isset($_GET['confirmed'])) {
	$message = "Your account has been successfully created and confirmed. You are now able to log in.";
	echo "<script>alert('$message');</script>";
}

?>

<?php include('./components/header.php') ?>
<section class="vh-100 bg-image" style="background-image: url('./img/img4.webp'); padding: 20px;">
	<div class="mask d-flex align-items-center h-100 gradient-custom-3">
		<div class="container h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">


				<!-- Alert -->
				<div class="col-9 col-md-9 col-lg-9 col-xl-9" style="display: <?php echo $display ?>;">
					<div style="margin-top: 5px;" class="alert alert-danger" role="alert">
						<div style="text-align: center">
							<svg width="40" height="40" viewBox="0 0 24 24" style="margin-right: 10px">
								<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
								<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
								<g id="SVGRepo_iconCarrier">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM8.96963 8.96965C9.26252 8.67676 9.73739 8.67676 10.0303 8.96965L12 10.9393L13.9696 8.96967C14.2625 8.67678 14.7374 8.67678 15.0303 8.96967C15.3232 9.26256 15.3232 9.73744 15.0303 10.0303L13.0606 12L15.0303 13.9696C15.3232 14.2625 15.3232 14.7374 15.0303 15.0303C14.7374 15.3232 14.2625 15.3232 13.9696 15.0303L12 13.0607L10.0303 15.0303C9.73742 15.3232 9.26254 15.3232 8.96965 15.0303C8.67676 14.7374 8.67676 14.2625 8.96965 13.9697L10.9393 12L8.96963 10.0303C8.67673 9.73742 8.67673 9.26254 8.96963 8.96965Z" fill="#ff0000"></path>
								</g>
							</svg>
							<h2 style="display: inline-block; position:relative; top:-10px">
								Verification Faild
							</h2>
						</div>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="position: absolute; top: 8px; right: 25px">
							<svg width="40px" height="40px" viewBox="0 0 24 24" fill="fff">
								<path d="M5.293 5.293a1 1 0 0 1 1.414 0L12 10.586l5.293-5.293a1 1 0 1 1 1.414 1.414L13.414 12l5.293 5.293a1 1 0 0 1-1.414 1.414L12 13.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L10.586 12 5.293 6.707a1 1 0 0 1 0-1.414z" fill="#0D0D0D" />
							</svg>
						</button>
					</div>
				</div>

				<!-- FORM -->
				<div class="page-content mb-5 pb-5">
					<div class="form-v6-content mb-5 pb-5">
						<div class="col-12 col-md-12 col-lg-12 col-xl-12" > 
							<form class="form-detail" action="./backend/backend_login.php" method="post">
								<!-- <form class="row g-3 needs-validation" novalidate> -->
								<h2>
									<svg width="50px" height="50px" viewBox="0 0 16 16" ill="#000000">
										<path d="M13 7h-1V5a4 4 0 1 0-8 0v2H3L2 8v6l1 1h10l1-1V8l-1-1zM5 5a3 3 0 1 1 6 0v2H5V5zm8 9H3V8h10v6z" />
									</svg>
									<span style="position: relative; top:-10px">
										Login form
									</span>
								</h2>
								<div class="form-row">
									<input type="text" name="email" id="your-email" class="input-text" placeholder="Email Address" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
								</div>
								<div class="form-row">
									<input type="password" name="password" id="password" class="input-text" placeholder="Password" required>
								</div>
								<div class="form-row-last">
									<input type="submit" name="login" class="register" value="Login">
								</div>
								<a style="color: blue; text-align: center; margin-top: -30px;" class="d-block" href="./signup.php"><u> Sign up - Create user account</u></a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<?php include('./components/contribution.php') ?>
	<!-- End Modal -->
</section>

<?php include('./components/footer.php') ?>