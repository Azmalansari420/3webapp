<?php
$sitesetting = $this->crud->fetchdatabyid('1','site_setting');
 include('include/header.php'); ?>

<body>

<style>
	html{
			background: #76767e !important;
		}
		.page-wrapper {
		    background: #76767e ;
		}
		.account-box .logo-area {
		    margin: 0 auto 20px;
		}
		.text-white
		{
			color: white!important;
		}
</style>



<div class="page-wrapper">
	<!-- Preloader -->
			<!-- <?php include('include/loader.php'); ?> -->

    <!-- Preloader end-->

    <!-- Page Content -->
    <div class="page-content">
		<div class="account-box">
			<div class="container">
				<div class="section-head ps-0 text-center">
					<h2>Welcome To </h2>
				</div>
				<div class="logo-area">
					<img class="logo-dark" src="<?=base_url() ?>media/uploads/site_setting/<?=$sitesetting[0]->logo ?>" alt="">
					<img class="logo-light" src="<?=base_url() ?>media/uploads/site_setting/<?=$sitesetting[0]->logo ?>" alt="">
				</div>
				<div class="account-area">
					<form>
						<div class="mb-3">
							<label class="form-label text-white" for="name">Name</label>
							<input type="text" id="name" class="form-control" placeholder="Type Username Here">
						</div>
						<div class="mb-3">
							<label class="form-label text-white" for="name">Email</label>
							<input type="text" id="email" class="form-control" placeholder="Email">
						</div>
						
						<div class="mb-3">
							<label class="form-label text-white" for="name">Qualification</label>
							<input type="text" id="qualification" class="form-control" placeholder="Qualification">
						</div>
						<div class="mb-3">
							<label class="form-label text-white" for="name">Aadhar card no</label>
							<input type="text" id="adhar" class="form-control" placeholder="Aadhar card no">
						</div>
						<div class="mb-3">
							<label class="form-label text-white" for="name">D.O.B.</label>
							<input type="date" id="dob" class="form-control" placeholder="Date Of Birth">
						</div>

						<div class="mb-3">
							<label class="form-label text-white" for="name">Mobile</label>
							<input type="text" id="mobile" class="form-control" placeholder="Mobile">
						</div>

						<div class="mb-3">
							<label class="form-label text-white" for="name">Alt Mobile</label>
							<input type="text" id="alt_mobile" class="form-control" placeholder="Alt Mobile">
						</div>

						<div class="mb-3">
							<label class="form-label text-white" for="name">Upload Profile Image</label>
							<input type="file" id="image" class="form-control" >
						</div>
						
						<div>
							<label class="form-label text-white" for="password">Create Password</label>
							<div class="mb-3 input-group input-group-icon">
								<input type="password" id="password" class="form-control dz-password" placeholder="Type Password Here">
								<span class="input-group-text show-pass"> 
									<i class="icon feather icon-eye-off eye-close"></i>
									<i class="icon feather icon-eye eye-open"></i>
								</span>
							</div>
						</div>
						<div>
							<label class="form-label text-white" for="confirm_password">Confirm Password</label>
							<div class="mb-3 input-group input-group-icon">
								<input type="password" id="confirm_password" class="form-control dz-password" placeholder="Confirm Password">
								<span class="input-group-text show-pass"> 
									<i class="icon feather icon-eye-off eye-close"></i>
									<i class="icon feather icon-eye eye-open"></i>
								</span> 
							</div>
						</div>
						<div class="form-check mb-4">
							<input class="form-check-input" type="checkbox" value="" id="Checked-1">
							<label class="form-check-label  text-white" for="Checked-1">I agree to all Terms, Privacy Policy and fees</label>
						</div>
						<button type="button" class="btn mb-3 btn-primary w-100 submit-btn">Register</button>
						
						<div class="text-center text-dark mb-2">
							<span class=" text-white">Already have an account ?</span>
						</div>
						<a href="login.php" class="btn btn-outline-primary w-100  text-white" style="border-color: white;">Login</a>
					</form>  
					
					
				</div>
			</div>
        </div>
    </div>
    <!-- Page Content End -->
    
</div>
<?php include('include/footer.php'); ?>

<script>

      $(document).on("click", ".submit-btn",(function(e) {
        register();
      }));
      
      function register()
      {
        var name = $("#name").val();
        var email = $("#email").val();
        var qualification = $("#qualification").val();
        var adhar = $("#adhar").val();
        var dob = $("#dob").val();
        var mobile = $("#mobile").val();
        var alt_mobile = $("#alt_mobile").val();
        var password = $("#password").val();
        var confirm_password = $("#confirm_password").val();
        var image = $('#image').prop('files')[0];

        if(name=='')
        {
          toast_print(0,"Enter Your Name...");
          return false;
        }
        if(email=='')
        {
          toast_print(0,"Enter Your Email...");
          return false;
        }
        if(mobile=='')
        {
          toast_print(0,"Enter Your Mobile...");
          return false;
        }
        if(image=='')
        {
          toast_print(0,"Upload Profile Image...");
          return false;
        }
        if(password=='')
        {
          toast_print(0,"Enter Your Password...");
          return false;
        }
        if(password!=confirm_password)
        {
          toast_print(0,"Confirm Password Not Match...");
          return false;
        }

        $(".loader-wrapper").addClass("show");

        var form = new FormData();        
        form.append("name", name);
        form.append("email", email);
        form.append("qualification", qualification);
        form.append("adhar", adhar);
        form.append("dob", dob);
        form.append("mobile", mobile);
        form.append("alt_mobile", alt_mobile);
        form.append("password", password);
        form.append("image", image);
        form.append("status", "1");

        var settings = {
          "url": "<?php echo base_url('api/user/registration'); ?>",
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
          	toast_print(1,response.message);
          	window.setTimeout(function () {
		        location.href = "login";
		    }, 2000);

            // window.location.href='login'; 
          }
          $(".loader-wrapper").removeClass("show");
          toast_print(1,response.message);



        });
      }
    </script>
