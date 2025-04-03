<?php 
$mobile = $this->input->get('mobile');

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
					<h2>Enter Code</h2>
					<p>An Authentication Code has sent to<br> <span class="text-lowercase"><?=$mobile ?></span></p>
				</div>
				<div class="account-area">
					<form >
						<input type="hidden" name="device_id" value="<?=$device_id ?>" id="device_id">
	                    <input type="hidden" name="token" value="<?=$token ?>" id="firebase_token">
	                    <input type="hidden" value="<?=$mobile ?>" id="mobile">
						<div id="otp" class="digit-group">
							<input class="form-control" type="text" id="digit-2" name="digit-2" placeholder="" data-next="digit-3" data-previous="digit-1" />
							<input class="form-control" type="text" id="digit-3" name="digit-3" placeholder="" data-next="digit-4" data-previous="digit-2" />
							<input class="form-control" type="text" id="digit-4" name="digit-4" placeholder="" data-next="digit-5" data-previous="digit-3" />
							<input class="form-control" type="text" id="digit-5" name="digit-5" placeholder="" data-next="digit-6" data-previous="digit-4" />
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
			<div class="seprate-box mb-3">
				
				<a href="javascript:void(0);" class="btn btn-primary w-100 register-btn">Submit</a>
			</div>
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


    $(document).on("click", ".register-btn",(function(e) {
      login_distibuter();
    }));

    function login_distibuter()
    {
        var device_id = $("#device_id").val();
        var firebase_token = $("#firebase_token").val();

        var mobile = $("#mobile").val();
        // Get OTP from four separate input fields
    	var otp = $("#digit-2").val() + $("#digit-3").val() + $("#digit-4").val() + $("#digit-5").val();

        if (otp.length !== 4) {
	        toaster("Enter a valid 4-digit OTP.", "error");
	        return false;
	    }
        
        if(mobile=="")
        {
            toaster("Mobile No Not Found.", 'error');
            return false;
        }

        var form = new FormData();
        form.append("mobile", mobile);
        form.append("otp", otp);
        form.append("firebase_token", firebase_token);
        form.append("device_id", device_id);

        var settings = {
          "url": "<?=base_url() ?>api/auth/registration_otp_verify",
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