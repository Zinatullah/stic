<?php

if (isset($_COOKIE['loggedIn'])) {
	//	header('location: ./mainform.php');
	header('location: components/mainform/index');
}

?>

<?php include('./components/header.php') ?>
<section class="vh-100 bg-image" style="background-image: url('./img/img4.webp'); padding: 20px;">
	<div class="mask d-flex align-items-center h-100 gradient-custom-3">
		<div class="container h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="page-content">
					<div class="form-v6-content">
						<div class="col-12 col-md-12 col-lg-12 col-xl-12">
							<form class="form-detail" action="./backend/verfication.php" method="post">
								<h2>Verification Form</h2>
								<div class="form-row">
									<input type="email" name="email" id="full-name" class="input-text" placeholder="Enter email address">
								</div>
								<div class="form-row">
									<input type="text" name="verification_code" id="full-name" class="input-text" placeholder="Enter verfication code" required>
								</div>
								<div class="form-row-last">
									<input type="submit" name="verify_email" class="register" value="Verify">
								</div>
								<a style="color: blue; text-align: center; margin-top: -30px;" class="d-block" href="#"><u> Already have an account</u></a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include('./components/contribution.php') ?>

	<!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="staticBackdropLabel">Agreement</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Are you willing to contribute within your professional capacity in the national reconstruction of Afghanistan?

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
					<a href="./signup.php">
						<button type="button" class="btn btn-primary">Yes</button>
					</a>
				</div>
			</div>
		</div>
	</div> -->
</section>

<?php include('./components/footer.php') ?>