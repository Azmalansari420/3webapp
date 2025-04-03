<?php include('include/header.php'); ?>


<body>
<div class="page-wrapper">
	<!-- Preloader -->
			<?php include('include/loader.php'); ?>

    <!-- Preloader end-->

    <!-- Page Content -->
    <div class="page-content">
		<div class="account-box">
			<div class="container">
				<div class="logo-area">
					<img class="logo-dark" src="assets/images/logo.png" alt="">
					<img class="logo-light" src="assets/images/logo-white.png" alt="">
				</div>
				<div class="section-head ps-0">
					<h2>Reset Your Password</h2>
					<p>Your new password must be diffrent form previously used password.</p>
				</div>
				<div class="account-area">
					<form action="home.php">
						<div>
							<label class="form-label" for="dz-password">New Password</label>
							<div class="mb-3 input-group input-group-icon">
								<input type="password" id="dz-password" class="form-control dz-password" placeholder="Type Password Here">
								<span class="input-group-text show-pass"> 
									<i class="icon feather icon-eye-off eye-close"></i>
									<i class="icon feather icon-eye eye-open"></i>
								</span>
							</div>
						</div>
						<div>
							<label class="form-label" for="dz-password2">Confirm Password</label>
							<div class="mb-3 input-group input-group-icon">
								<input type="password" id="dz-password2" class="form-control dz-password" placeholder="Type Password Here">
								<span class="input-group-text show-pass"> 
									<i class="icon feather icon-eye-off eye-close"></i>
									<i class="icon feather icon-eye eye-open"></i>
								</span>
							</div>
						</div>
					</form>  
				</div>
			</div>
        </div>
    </div>
    <!-- Page Content End -->
    <!-- Footer -->
    <footer class="footer fixed">
        <div class="container">
			<a href="login.php" class="btn btn-primary w-100 mb-3">Submit</a>
			<div class="text-center text-primary">
				<span>Back to</span>
				<a href="login.php" class="font-w500">Login</a>
			</div>
        </div>
    </footer>
	<!-- Footer End -->
</div>
<?php include('include/footer.php'); ?>
