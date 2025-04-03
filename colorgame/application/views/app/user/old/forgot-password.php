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
					<h2>Reset password!</h2>
					<p>Enter your Email address to reset your password!</p>
				</div>
				<div class="account-area">
					<form action="<?=base_url('api/auth/login') ?>" method="post">
						<input type="hidden" name="device_id" value="<?=$this->session->userdata('device_id') ?>" id="device_id">
                		<input type="hidden" name="firebase_token" value="<?=$this->session->userdata('firebase_token') ?>" id="firebase_token">

						<div class="mb-3 input-group input-group-icon">
							<div class="input-group-text">
								<div class="input-icon">
									<i class="icon feather icon-mail"></i>
								</div>
							</div>
							<input type="email" class="form-control" placeholder="Email"  id="email">
						</div>

					</form>  
				</div>
			</div>
        </div>
    </div>
    <!-- Page Content End -->
    <footer class="footer fixed">
        <div class="container">
            <a href="javascript:void(0);" class="btn mb-3 btn-primary w-100 login-btn">Send Password</a>
         <div class="text-center text-primary">
            <span>Back to</span>
            <a href="login.php" class="font-w500">Login</a>
         </div>
        </div>
    </footer>
    
</div>

<?php include('include/allscript.php'); ?>

<script>

    $(document).on("click", ".login-btn",(function(e) {
    	click_btn = $(this);
      forget_password();
    }));

    function forget_password()
    {
    	var click_btn = '.login-btn';
    	$(click_btn).text('Wait..');
        $(click_btn).attr('disabled',true);

        var device_id = $("#device_id").val();
        var firebase_token = $("#firebase_token").val();

        var email = $("#email").val();

        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
		    toaster("Invalid Email Address.", 'success');
		    return false;
		}		

        var form = new FormData();
        
        form.append("email", email);
        form.append("firebase_token", firebase_token);
        form.append("device_id", device_id);

        var settings = {
          "url": "<?=base_url() ?>api/auth/forget_password",
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
		        $(click_btn).show();
		    	$(click_btn).text('Send Again');
		    }
		    else
		    {
			    $(click_btn).text('Send Password');
	          	$(click_btn).attr('disabled',false);
		    	
		    }
        });
    }

    
        // toaster('This is an error message!', 'error');
</script>