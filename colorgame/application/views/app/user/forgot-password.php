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
						<h3 class="title">Forgot Password</h3>
						<p>Enter the email associated with your account and we’ll send and email to reset your password</p>
					</div>
					<form>
						<div class="input-group input-group-icon style-2 input-lg">
							<div class="input-group-text style-1">
								<span class="input-icon">
									<i class="icon feather icon-mail"></i>
								</span>
							</div>
							<div class="dz-input-animate focused">
								<label class="form-label" for="email">Email Address</label>
								<input type="email" id="email" class="form-control style-1" value="example@gmail.com">
							</div>
						</div>
					</form>
				</div>
				<div class="bottom-content mt-auto">
					<a href="otp-confirm.php" class="btn btn-thin btn-lg w-100 btn-primary">Send Mail</a>
					<div class="text-center">Back To <a href="login.php" class="text-underline font-w500">Sign In</a></div>
				</div>
			</div>
        </div>
	</main>		
	<!-- Main Content End  -->
</div>


<?php include('include/footer.php'); ?>
