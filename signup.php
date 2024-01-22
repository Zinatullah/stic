<?php

if (isset($_COOKIE['loggedIn'])) {
	header('location: ./mainform.php');
}

?>
<?php include('./components/header.php') ?>
<section class="vh-100 bg-image" style="background-image: url('./img/img4.webp'); padding: 20px;">
	<div class="mask d-flex align-items-center h-100 gradient-custom-3">
		<div class="container h-100">
			<div class="row d-flex justify-content-center align-items-center h-100" >
				<div class="page-content mb-5">
					<div class="form-v6-content mb-5">
						<div class="col-12 col-md-12 col-lg-12 col-xl-12" style="min-height: 100vh">
							<form class="form-detail" action="./backend/signup.php" method="post">
								<h2>Registeration Form</h2>
								<div class="form-row">
									<input type="text" name="fullname" id="full-name" class="input-text" placeholder="Full Name" required>
								</div>
								<div class="form-row">
									<input type="text" name="email" id="your-email" class="input-text" placeholder="Email Address" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
								</div>
								<div class="form-row">
									<input type="password" name="password" id="password" class="input-text" placeholder="Password" required>
								</div>
								<div class="form-row">
									<input type="password" name="comfirm-password" id="comfirm_password" class="input-text" placeholder="Comfirm Password" required>
									<span style="margin-top: -20px; margin-left: 20px">
										<p id="errorMessage" style="color: red; display: none;">Passwords do not match!</p>
										<p id="successMessage" style="color: green; display: none;">Passwords match!</p>
									</span>
								</div>
								<div class="form-row-last">
									<input type="submit" name="register" class="register" value="Register" id="submit">
								</div>
								<a style="color: blue; text-align: center; margin-top: -30px;" class="d-block" href="./login.php"><u> Already have an account</u></a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include('./components/contribution.php') ?>

</section>

<?php include('./components/footer.php') ?>