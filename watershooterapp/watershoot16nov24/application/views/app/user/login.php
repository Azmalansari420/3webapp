
<?php include('include/header.php'); ?>
 
<body>

	<style>
		html{
			    background: #283890!important;
		}
	.account-area
	{
		padding-top: 25px;

	}
	.img-class{
		width: 236px;
	    position: relative;
	    left: 25px;
	}
	.page-content {
    padding: 50px 0;
    background: #283890!important;
}
.btn-primary {
    background-color: #bcc4c2;
    border-color: #bcc4c2;
    color: black!important;
}
.text-white
{
	color: white!important;
}

::-webkit-input-placeholder { /* WebKit, Blink, Edge */
	    color: white!important;
	    font-size: 12px;
	}

.form-control:focus, .form-control:active, .form-control.active {
    border-color: white;
    background: white;
    color: var(--dark);
    box-shadow: unset;
}
</style>


<div class="page-wrapper">
	<!-- Preloader -->


    <!-- Preloader end-->


    <!-- Page Content -->
    <div class="page-content">
		<div class="account-box">
			<div class="container">
			
				<div class="section-head ps-0">
					<h2 class="text-white">Welcome back!</h2>
				</div>
				<div class="account-area">
					<form>
						<input type="hidden" id="device_id" value="<?=$this->session->userdata('device_id') ?>">
              			<input type="hidden" id="firebase_token" value="<?=$this->session->userdata('firebase_token') ?>">
						<div class="mb-3">
							<label class="form-label text-white" for="name">Mobile</label>
							<input type="number" id="mobile" class="form-control" placeholder="Mobile">
						</div>

            <div>
              <label class="form-label te1xt-white" for="password">Password</label>
              <div class="mb-3 input-group input-group-icon">
                <input type="password" id="password" class="form-control dz-password" placeholder="Type Password Here" >
                <span class="input-group-text show-pass"> 
                  <i class="icon feather icon-eye-off eye-close"></i>
                  <i class="icon feather icon-eye eye-open"></i>
                </span>
              </div>
            </div>

					

						<button type="button" class="btn mb-3 btn-primary w-100 login-btn">Login</button>


						<div class="d-flex justify-content-center align-items-center mt-2 mb-2">
							<a href="forgot-password.php" class="btn-link text-link text-white">Forgot password?</a>
						</div>
						<a href="register.php" class="btn-link text-center mb-3 text-white">Don’t have an account? Sign Up</a>
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
      userlogin();
    }));


   function userlogin()
   {
    var device_id = $("#device_id").val();
    var firebase_token = $("#firebase_token").val();
    var mobile = $("#mobile").val();
    var password = $("#password").val();

    if(mobile=='')
    {
      toast_print(0,"Please Enter Your Mobile..");
      return false;
    }
    if(password=='')
    {
      toast_print(0,'Please Enter Your Password..');
      return false;
    }

    $(".loader-wrapper").addClass("show");


    var form = new FormData();
    form.append("device_id", device_id);
    form.append("firebase_token", firebase_token);
    form.append("mobile", mobile);
    form.append("password", password);

    var settings = {
      "url": "<?php echo base_url('api/user/user_login'); ?>",
      "dataType":"json",
      "method": "POST",
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
        window.location.href=response.url;
      }
        $(".loader-wrapper").removeClass('show');
        toast_print(0,response.message);
    });
   }
 </script>


