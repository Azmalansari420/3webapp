<?php 
$device_id = $this->input->get('device_id');
if(!empty($device_id) && $device_id!='undefined')
{
    $device_id = $device_id;
}
else
{
    $device_id = uniqid();
}

$token = $this->input->get('token');
if(!empty($token) && $token!='undefined')
{
    $token = $token;
}
else
{
    $token = rand();
}

include('include/header.php'); ?>

    <!-- Page Content -->
    <div class="page-content">
		<div class="account-box">
			<div class="container">
				<div class="logo-area">
					<img class="logo-light logo-image-radius" src="<?=base_url() ?>media/uploads/site_setting/<?=$site_setting[0]->logo ?>" alt="">
				</div>
				<div class="section-head text-center pt-0">
					<h2>Log in!</h2>
					<p>Welcome back you've been missed!</p>
				</div>
				<div class="account-area">
					<form  action="<?=base_url('api/auth/login') ?>" method="post">
						<input type="hidden" name="device_id" value="<?=$device_id ?>" id="device_id">
                    	<input type="hidden" name="token" value="<?=$token ?>" id="firebase_token">
						<div class="mb-3">
							<label class="form-label" for="name">Mobile</label>
							<input type="text" id="mobile" class="form-control" placeholder="Type Mobile Here">
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
						<a  class="btn mb-3 btn-primary login-btn" href="javascript:void(0);">Login</a>
						<div class="d-flex justify-content-between align-items-center mb-4">
							<a href="forgot-password.php" class="btn-link">Forgot password?</a>
							<a href="forgot-password.php" class="btn-link">Reset here</a>
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


<?php include('include/footer.php'); ?>

<script>

    $(document).on("click", ".login-btn",(function(e) {
      login_distibuter();
    }));

    function login_distibuter()
    {
        var device_id = $("#device_id").val();
        var firebase_token = $("#firebase_token").val();
        var mobile = $("#mobile").val();
        var password = $("#password").val();

        if(mobile=='')
        {
            toaster("Enter Your Mobile No.", 'error');
            return false;
        }
        if(password=='')
        {
            toaster("Enter Your Password.", 'error');
            return false;
        }

        var form = new FormData();
        form.append("mobile", mobile);
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
          if(response.status==200)
          {
          	toaster(response.message, 'success');
            window.location.href= response.url;
          }
          else{
          toaster(response.message, 'error');

          }
        });
    }

    
        // toaster('This is an error message!', 'error');
</script>

