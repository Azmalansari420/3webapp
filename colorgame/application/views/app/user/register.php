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
				<!-- Top Area  -->
				

				<div class="account-section mt-130">
					<div class="section-head">
						<h3 class="title">Create your account</h3>
						<!-- <p>Welcome Back You've Been Missed!</p> -->
					</div>
					<form>
						<div class="m-b15 input-group input-group-icon style-2 input-lg">
							<div class="input-group-text style-1">
								<div class="input-icon">
									<i class="icon feather icon-user"></i>
								</div>
							</div>
							<div class="dz-input-animate focused">
								<label class="form-label" for="name">Name</label>
								<input type="text" id="name" class="form-control style-1" value="Amelia">
							</div>
						</div>
						<div class="m-b15 input-group input-group-icon style-2 input-lg">
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
						<div class="m-b10 input-group input-group-icon style-2 input-lg">
							<div class="input-group-text style-1">
								<span class="input-icon">
									<i class="feather icon-lock"></i>
								</span>
							</div>
							<div class="dz-input-animate">
								<label class="form-label" for="password">Password</label>
								<input type="password" id="password" class="form-control style-1">
							</div>
						</div>
						<div class="form-check m-b20">
							<input class="form-check-input" type="checkbox" value="" id="Checked-1">
							<label class="form-check-label" for="Checked-1">I agree to all Term, Privacy and Fees</label>
						</div>
						<a href="home.php" class="btn btn-thin w-100 btn-primary">Sign In</a>
					</form>
					<div class="dz-saprate">
						<span>Already have and account? </span>
					</div>
				</div>
				<div class="social-btn-group">
					<a href="login.php" class="btn w-100 gap-2 border"><img src="assets/images/social/google-mail.svg" alt=""><span class="text-dark">Sign In</span></a>
				</div>
			</div>
        </div>
	</main>	
	<!-- Main Content End  -->
</div>


<?php include('include/footer.php'); ?>
