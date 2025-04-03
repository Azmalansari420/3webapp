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
						<h3 class="title">Enter New Password</h3>
						<p>Your new password must be different from previously used password.</p>
					</div>
					<form>
						<div class="m-b15 input-group input-group-icon style-2 input-lg">
							<div class="input-group-text style-1">
								<span class="input-icon">
									<i class="feather icon-lock"></i>
								</span>
							</div>
							<div class="dz-input-animate focused">
								<label class="form-label" for="password">Password</label>
								<input type="password" id="password" class="form-control style-1" value="123456789">
							</div>
						</div>
						
						<div class="input-group input-group-icon style-2 input-lg">
							<div class="input-group-text style-1">
								<span class="input-icon">
									<i class="feather icon-lock"></i>
								</span>
							</div>
							<div class="dz-input-animate">
								<label class="form-label" for="password2">Confirm Password</label>
								<input type="password" id="password2" class="form-control style-1">
							</div>
						</div>
					</form>
				</div>
				<div class="bottom-content mt-auto">
					<a href="login.php" class="btn btn-thin btn-lg w-100 btn-primary">Continue</a>
					<div class="text-center">Back To <a href="login.php" class="text-underline font-w500">Sign In</a></div>
				</div>
			</div>
        </div>
	</main>
	<!-- Main Content End  -->
</div>


<?php include('include/footer.php'); ?>
