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
					<!-- <img class="logo-dark" src="assets/images/logo.png" alt="">
					<img class="logo-light" src="assets/images/logo-white.png" alt=""> -->
				</div>
				<div class="section-head ps-0">
					<h2>Reset password</h2>
					<p>Enter your Mobile No to reset your password</p>
				</div>
				<div class="account-area">
					<form>
						<div class="mb-3 input-group input-group-icon">
							<div class="input-group-text">
								<div class="input-icon">
									<i class="icon feather icon-phone"></i>
								</div>
							</div>
							<input type="number" id="mobile" class="form-control" placeholder="Mobile No">
						</div>

						<div class="mb-3 input-group input-group-icon password-icon" >
							<div class="input-group-text">
								<div class="input-icon">
									<i class="icon feather icon-eye"></i>
								</div>
							</div>
							<input type="password" id="password" class="form-control" placeholder="Enter Your New Password">
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
            <a href="javascript:;" class="btn mb-3 btn-primary w-100 forget-pass">Submit</a>
			<div class="text-center text-primary">
				<span>Back to</span>
				<a href="login.php" class="font-w500">Login</a>
			</div>
        </div>
    </footer>
	<!-- Footer End -->
</div>
<?php include('include/footer.php'); ?>

<script>
	 $(document).on("click", ".forget-pass",(function(e) {
        forget_password();
      }));

	function forget_password()
	{
		var mobile = $("#mobile").val();
		var password = $("#password").val();

		if(mobile=="")
		{
			toast_print(1,"Enter Your Mobile No");
			return false;
		}

		var form = new FormData();
		form.append("mobile", mobile);
		form.append("password", password);

		var settings = {
		  "url": "<?=base_url() ?>api/user/forget_password",
		  "dataType": "json",
		  "method": "POST",
		  "timeout": 0,
		  "processData": false,
		  "mimeType": "multipart/form-data",
		  "contentType": false,
		  "data": form
		};

		$.ajax(settings).done(function (response) {
		  console.log(response);
		  $(".loader-wrapper").removeClass("show");
          toast_print(1,response.message);
          // if(response.status==200)
          // {
          // 	$(".password-icon").css('display', 'block');
          // }
          // 	$(".password-icon").css('display', 'none');
		});
	}
</script>
