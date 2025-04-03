<?php include('include/header.php'); ?>
<style>
	.mt-130 {
	    margin-top: 125px;
	}
</style>
	<!-- Main Content Start  -->
	<main class="page-content">
		<div class="container pt-0 overflow-hidden">
			<div class="dz-authentication-area dz-flex-box">
				

				<div class="account-section mt-130">
					<div class="section-head">
						<h3 class="title">Enter Code</h3>
						<p>An Authentication Code Has Sent To <span class="text-lowercase text-underline">testing@gmail.com</span></p>
					</div>
					<form action="submit">
						<label class="form-label" for="otp">Enter OTP</label>
						<div id="otp" class="digit-group input-lg">
							<input class="form-control style-1" type="text" id="digit-2" name="digit-2" placeholder="" data-next="digit-3" data-previous="digit-1" maxlength="1">
							<input class="form-control style-1" type="text" id="digit-3" name="digit-3" placeholder="" data-next="digit-4" data-previous="digit-2" maxlength="1">
							<input class="form-control style-1" type="text" id="digit-4" name="digit-4" placeholder="" data-next="digit-5" data-previous="digit-3" maxlength="1">
							<input class="form-control style-1" type="text" id="digit-5" name="digit-5" placeholder="" data-next="digit-6" data-previous="digit-4" maxlength="1">
							<input class="form-control style-1" type="text" id="digit-6" name="digit-6" placeholder="" data-next="digit-7" data-previous="digit-5" maxlength="1">
							<input class="form-control style-1" type="text" id="digit-7" name="digit-7" placeholder="" data-next="digit-8" data-previous="digit-6" maxlength="1">
						</div>                
					</form>
				</div>
				<div class="bottom-content mt-auto">
					<a href="change-password.php" class="btn btn-thin btn-lg w-100 btn-primary">Verify and proceed</a>
					<div class="text-center">Back To <a href="login.php" class="text-underline font-w500">Sign In</a></div>
				</div>
			</div>
        </div>
	</main>
	<!-- Main Content End  -->
</div>


<?php include('include/footer.php'); ?>
