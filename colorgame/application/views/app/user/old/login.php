<?php 
include('include/allcss.php'); ?>

    <!-- Page Content -->
    <div class="page-content">
		<div class="account-box">
			<div class="container">
				<div class="logo-area">
					<img class="logo-dark" src="<?=base_url() ?>media/uploads/site_setting/<?=$site_setting[0]->logo ?>" alt="">
					<img class="logo-light" src="<?=base_url() ?>media/uploads/site_setting/<?=$site_setting[0]->logo ?>" alt="">
				</div>
				<div class="section-head ps-0">
					<h2>Welcome back!</h2>
					<p>Welcome back you've been missed!</p>
				</div>
				<div class="account-area">
					<form action="<?=base_url('api/auth/login') ?>" method="post">
						<input type="hidden" name="device_id" value="<?=$this->session->userdata('device_id') ?>" id="device_id">
                		<input type="hidden" name="firebase_token" value="<?=$this->session->userdata('firebase_token') ?>" id="firebase_token">
						<div class="mb-3">
							<label class="form-label" for="name">Email</label>
							<input type="text" id="email" class="form-control" placeholder="Type Email Here">
						</div>
						<div>
							<label class="form-label" for="password">Password</label>
							<div class="mb-3 input-group input-group-icon">
								<input type="password" id="password" class="form-control dz-password" placeholder="Type Password Here">
								<span class="input-group-text show-pass"> 
									<i class="icon feather icon-eye-off eye-close"></i>
									<i class="icon feather icon-eye eye-open"></i>
								</span>
							</div>
						</div>
						<a href="javascript:void(0);" class="btn mb-3 btn-primary w-100 login-btn">Login</a>
						<div class="d-flex justify-content-between align-items-center mb-4">
							<a href="forgot-password.php" class="btn-link text-link">Forgot password?</a>
						</div>
						<a href="register.php" class="btn-link text-center mb-3 text-dark">Don’t have an account?</a>
						<a href="register.php" class="btn mb-3 btn-outline-primary w-100">Register now</a>
					</form>  
				</div>
			</div>
        </div>
    </div>
    <!-- Page Content End -->
    
</div>

<?php include('include/allscript.php'); ?>

<script>

    $(document).on("click", ".login-btn",(function(e) {
      login_distibuter();
    }));

    function login_distibuter()
    {
        var device_id = $("#device_id").val();
        var firebase_token = $("#firebase_token").val();
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