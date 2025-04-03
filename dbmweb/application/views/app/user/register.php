<?php
$inviteCode = $this->input->get('inviteCode');
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
					<h2>Create your account</h2>
					<p>Create an account to continue!</p>
				</div>
				<div class="account-area">
					<form>
						<input type="hidden" name="device_id" value="<?=$device_id ?>" id="device_id">
                    	<input type="hidden" name="token" value="<?=$token ?>" id="firebase_token">

                    	<div class="mb-3">
							<label class="form-label" for="name">Enter your Name</label>
							<input type="text" id="name" class="form-control" placeholder="Enter your Name">
						</div>

                    	<div class="mb-3">
							<label class="form-label" for="email">Enter your Email</label>
							<input type="text" id="email" class="form-control" placeholder="Enter your Email">
						</div>

						<div class="mb-3">
							<label class="form-label" for="mobile">Mobile</label>
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

						<div class="mb-3">
							<label class="form-label" for="">Please Enter the invitation code</label>
							<input type="text" id="referal_code" class="form-control" placeholder="Please enter the invitation code" value="<?php if(!empty($inviteCode)) echo $inviteCode; ?>">
						</div>
						
						<div class="form-check mb-4">
							<input class="form-check-input" type="checkbox" value="" id="Checked-1">
							<label class="form-check-label" for="Checked-1">I agree to all Terms, Privacy Policy and fees</label>
						</div>
						<a href="javascript:void(0);" class="btn mb-3 btn-primary w-100 register-btn">Register</a>

						<div class="text-primary">
							<span>Already have an account ?</span>
							<a href="login.php" class="font-w500">Log in</a>
						</div>
					</form>  
					
				</div>
			</div>
        </div>
    </div>
    <!-- Page Content End -->
    
</div>

<?php include('include/footer.php'); ?>

<script>


	 $(document).on("click", ".register-btn",(function(e) {
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
        var referal_code = $("#referal_code").val();

        if(name=="")
        {
            toaster("Enter Your Name.", 'error');
            return false;
        }
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            toaster("Invalid Email Address.", 'error');
            return false;
        }
        if(mobile=="")
        {
            toaster("Enter Mobile No.", 'error');
            return false;
        }
        if(password=="")
        {
            toaster("Enter Your Password.", 'error');
            return false;
        }
        if(referal_code=="")
        {
            toaster("Please Enter the invitation code.", 'error');
            return false;
        }
        // if(password!=con_password)
        // {
        //     toaster("Confirm Password Not Match.", 'error');
        //     return false;
        // }

        var form = new FormData();
        form.append("name", name);
        form.append("email", email);
        form.append("mobile", mobile);
        form.append("password", password);
        form.append("firebase_token", firebase_token);
        form.append("device_id", device_id);
        form.append("referal_code", referal_code);

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
          if(response.status == 200) 
          {
                toaster(response.message, 'success');
                setTimeout(function(){
                    window.location.href = response.url;
                }, 1000);
            }
            else
            {
	          toaster(response.message, 'error');

            }
        });
    }
</script>