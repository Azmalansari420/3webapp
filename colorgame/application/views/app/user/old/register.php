<?php 
include('include/allcss.php'); ?>
<style>
	.account-box .logo-area {
    text-align: center;
    max-width: 130px;
    margin: 20px auto 20px;
}
</style>
    <!-- Page Content -->
    <div class="page-content">
		<div class="account-box">
			<div class="container">
				<div class="logo-area">
					<img class="logo-dark" src="<?=base_url() ?>media/uploads/site_setting/<?=$site_setting[0]->logo ?>" alt="">
					<img class="logo-light" src="<?=base_url() ?>media/uploads/site_setting/<?=$site_setting[0]->logo ?>" alt="">
				</div>
				<div class="section-head ps-0">
					<h2>Create account Free!</h2>
					<p>Create an account to continue!</p>
				</div>
				<div class="account-area">
					<form action="#!" method="post">
						<input type="hidden" name="device_id" value="<?=$this->session->userdata('device_id') ?>" id="device_id">
                		<input type="hidden" name="firebase_token" value="<?=$this->session->userdata('firebase_token') ?>" id="firebase_token">
						<div class="mb-3">
							<label class="form-label" for="name">Full Name</label>
							<input type="text" id="name" class="form-control" placeholder="Type Email Here">
						</div>
						<div class="mb-3">
							<label class="form-label" for="name">Email</label>
							<input type="email" id="email" class="form-control" placeholder="Type Email Here">
						</div>
						<div class="mb-3">
							<label class="form-label" for="name">Mobile No</label>
							<input type="number" id="mobile" class="form-control" placeholder="Enter Mobile No">
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
						<div>
							<label class="form-label" for="password">Confirm Password</label>
							<div class="mb-3 input-group input-group-icon">
								<input type="password" id="con_password" class="form-control dz-password" placeholder="Type Confirm Password Here">
								<span class="input-group-text show-pass"> 
									<i class="icon feather icon-eye-off eye-close"></i>
									<i class="icon feather icon-eye eye-open"></i>
								</span>
							</div>
						</div>

						<a href="javascript:void(0);" class="btn mb-3 btn-primary w-100 login-btn">Register Now</a>
						<div class="d-flex justify-content-between align-items-center mb-4">
							<a href="forgot-password.php" class="btn-link text-link">Forgot password?</a>
						</div>
						<a href="login.php" class="btn-link text-center mb-3 text-dark">Already have an account ?</a>
						<a href="login.php" class="btn mb-3 btn-outline-primary w-100">Login now</a>
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

        var name = $("#name").val();
        var email = $("#email").val();
        var mobile = $("#mobile").val();
        var password = $("#password").val();
        var con_password = $("#con_password").val();

        if(name=="")
        {
        	toaster("Enter Your Name.", 'success');
        	return false;
        }
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
		    toaster("Invalid Email Address.", 'success');
		    return false;
		}
		if(mobile=="")
        {
        	toaster("Enter Mobile No.", 'success');
        	return false;
        }
        if(password=="")
        {
        	toaster("Enter Your Password.", 'success');
        	return false;
        }
        if(password!=con_password)
        {
        	toaster("Confirm Password Not Match.", 'success');
        	return false;
        }

        var form = new FormData();
        form.append("name", name);
        form.append("email", email);
        form.append("mobile", mobile);
        form.append("password", password);
        form.append("firebase_token", firebase_token);
        form.append("device_id", device_id);

        var settings = {
          "url": "<?=base_url() ?>api/auth/registration",
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
          if(response.status == 200) {
		        toaster(response.message, 'success');
		        setTimeout(function(){
		            window.location.href = response.url;
		        }, 1000);
		    }
        });
    }

    
        // toaster('This is an error message!', 'error');
</script>