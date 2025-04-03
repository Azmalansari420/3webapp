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
						<h3 class="title">Sign in to your account</h3>
						<p>Welcome Back You've Been Missed!</p>
					</div>
					<form action="<?=base_url('api/auth/login') ?>" method="post">
						<input type="hidden" name="id" value="<?=$this->input->get('id') ?>" id="id">
						<input type="hidden" name="token" value="<?=$this->input->get('token') ?>" id="token">
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
							<div class="dz-input-animate focused">
								<label class="form-label" for="password">Password</label>
								<input type="password" id="password" class="form-control style-1" value="123456">
							</div>
						</div>
						<a href="forgot-password.php" class="btn-link text-end m-b20">Forgot password?</a>
						<a href="#!" class="btn btn-thin btn-lg w-100 btn-primary login-btn">Sign In</a>
					</form>
					<div class="dz-saprate">
						<span>Not a member?</span>
					</div>
				</div>
				<div class="social-btn-group">
					<a href="register.php" class="btn w-100 gap-2 border"><img src="assets/images/social/google-mail.svg" alt=""><span class="text-dark">Create an account</span></a>
				</div>
			</div>
        </div>
	</main>	
	<!-- Main Content End  -->
</div>


<?php include('include/footer.php'); ?>

<script>

    $(document).on("click", ".login-btn",(function(e) {
      login_distibuter();
    }));

    function login_distibuter()
    {
        var device_id = $("#id").val();
        var firebase_token = $("#token").val();
        var email = $("#email").val();
        var password = $("#password").val();

        var form = new FormData();
        form.append("email", email);
        form.append("password", password);
        form.append("firebase_token", firebase_token);
        form.append("device_id", device_id);

        var settings = {
          "url": "<?=base_url() ?>api/auth/login",
          "method": "POST",
          "dataType": "json",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": form
        };

        $.ajax(settings).done(function (response) {
          console.log(response);
          toaster(response.message, 'success');
          if(response.status==200)
          {
            window.location.href= response.url;
          }
        });
    }

    
        // toaster('This is an error message!', 'error');
</script>