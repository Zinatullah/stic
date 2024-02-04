<?php
session_start();

if (isset($_COOKIE['verified'])) {
	//	header('location: ./mainform.php');
	header('location: ..components/mainform/index');


	exit();
}

if (isset($_GET['email'])) {
	$email = $_GET["email"];
}

$display = 'none';
if (isset($_SESSION['error_message'])) {
	$display = '';
	unset($_SESSION['error_message']); // Clear the error message from the session
}

$email_check = '';
if (isset($_SESSION['email_check'])) {
	$email_check = '';
}
?>

<?php include('./components/header.php') ?>
<section class="vh-100 bg-image" style="background-image: url('./img/img4.webp'); padding: 20px; min-height:66.6vh">
	<div class="mask d-flex align-items-center h-100 gradient-custom-3">
		<div class="container h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">

				<!-- Email Alert -->

				<div class="col-9 col-md-9 col-lg-9 col-xl-9" style="display: <?php echo $email_check ?>;">
					<div style="margin-top: 5px;" class="alert alert-success" role="alert">
						<div style="text-align: center; height: 150px; padding-top: 50px">
							<svg width="40px" height="40px" viewBox="0 0 117 117" version="1.1" fill="#000000" style="margin-right: 10px">
								<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
								<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
								<g id="SVGRepo_iconCarrier">
									<title></title>
									<desc></desc>
									<defs></defs>
									<g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1">
										<g fill-rule="nonzero" id="correct">
											<path d="M34.5,55.1 C32.9,53.5 30.3,53.5 28.7,55.1 C27.1,56.7 27.1,59.3 28.7,60.9 L47.6,79.8 C48.4,80.6 49.4,81 50.5,81 C50.6,81 50.6,81 50.7,81 C51.8,80.9 52.9,80.4 53.7,79.5 L101,22.8 C102.4,21.1 102.2,18.5 100.5,17 C98.8,15.6 96.2,15.8 94.7,17.5 L50.2,70.8 L34.5,55.1 Z" fill="#17AB13" id="Shape"></path>
											<path d="M89.1,9.3 C66.1,-5.1 36.6,-1.7 17.4,17.5 C-5.2,40.1 -5.2,77 17.4,99.6 C28.7,110.9 43.6,116.6 58.4,116.6 C73.2,116.6 88.1,110.9 99.4,99.6 C118.7,80.3 122,50.7 107.5,27.7 C106.3,25.8 103.8,25.2 101.9,26.4 C100,27.6 99.4,30.1 100.6,32 C113.1,51.8 110.2,77.2 93.6,93.8 C74.2,113.2 42.5,113.2 23.1,93.8 C3.7,74.4 3.7,42.7 23.1,23.3 C39.7,6.8 65,3.9 84.8,16.2 C86.7,17.4 89.2,16.8 90.4,14.9 C91.6,13 91,10.5 89.1,9.3 Z" fill="#4A4A4A" id="Shape"></path>
										</g>
									</g>
								</g>
							</svg>
							<h5 style="display: inline-block; position:relative; top:-10px">
								Please check your email address to confirm your account!
							</h5>
						</div>
					</div>
				</div>
				<!-- Email alert End -->

				<!-- Verification Alert -->
				<?php
				$email_check = $email_check == 'none' ? 'block' : 'none';
				?>
				<div class="col-9 col-md-9 col-lg-9 col-xl-9" style="display: <?php echo $email_check ?>;">
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
					</div>
				</div>
				<!-- Aler End -->

				<!-- Form start -->
				<!-- <div class="page-content">
					<div class="form-v6-content">
						<div class="col-12 col-md-12 col-lg-12 col-xl-12">
							<form class="form-detail" action="./backend/verfication.php" method="post">
								<h2>Verification Form</h2>
								<div class="form-row">
									<input type="text" name="verification_code" id="full-name" class="input-text" placeholder="Enter verfication code" required>
								</div>
								<input type="hidden" name="email" id="full-name" class="input-text" value="<?php echo $email ?>">
								<div class="form-row-last">
									<input type="submit" name="verify_email" class="register" value="Verify">
								</div>
								<a style="color: blue; text-align: center; margin-top: -30px;" class="d-block" href="#"><u> Already have an account</u></a>
							</form>
						</div>
					</div>
				</div> -->
				<!-- Form end -->
			</div>
		</div>
	</div>

	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="display: block;">
					<h3 class="modal-title fs-5" id="staticBackdropLabel" style="text-align: center;">Contribution</h3>
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
	</div>
</section>

<?php include('./components/footer.php') ?>