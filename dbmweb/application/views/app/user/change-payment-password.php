<?php include('include/header.php'); ?>
	
	
	<!-- Header -->
		<header class="header shadow header-fixed border-0">
			<div class="container">
				<div class="header-content">
					<div class="left-content">
						<a href="javascript:void(0);" class="back-btn">
							<i class="icon feather icon-chevron-left"></i>
						</a>
						<h6 class="title">Upadate Payment Password</h6>
					</div>
					<div class="mid-content">
					</div>
					<div class="right-content">
					</div>
				</div>
			</div>
		</header>
	<!-- Header -->

	
	
	<!-- Page Content Start -->
	<div class="page-content space-top">
		<div class="container">

           

			<div class="mb-3">
				<label class="form-label" for="phone">Enter New Password</label>
				<input type="text" id="phone" class="form-control npassword" >
			</div>
			
			<div class="mb-3">
				<label class="form-label" for="email">Enter Confirm Password</label>
				<input type="text" id="email" class="form-control cpassword">
			</div>
			
		</div>
	</div>
	<!-- Page Content End -->
	<!-- Footer Start -->
	<div class="footer fixed">
		<div class="container">
			<a href="javascript:void(0);" class="btn btn-primary w-100 submit-btn">Update</a>
		</div>
	</div>
	<!-- Footer End -->
</div>  


<?php include('include/footer.php'); ?>

<script>

    $(document).on("click", ".submit-btn",(function(e) {
      change_password();
    }));

    function change_password()
    {
        var npassword = $(".npassword").val();
        var cpassword = $(".cpassword").val();

      
        if(npassword=="")
        {
            toaster("Enter New Password.", 'error');
            return false;
        }
        if(cpassword=="")
        {
            toaster("Enter Confirm Password.", 'error');
            return false;
        }

        var form = new FormData();
       
        form.append("npassword", npassword);
        form.append("cpassword", cpassword);

        var settings = {
          "url": "<?=base_url() ?>api/user/payment_password_update",
          "method": "POST",
          "dataType": "json",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": form
        };

        $.ajax(settings).done(function (response) 
        {
          // console.log(response);
            if(response.status==200)
            {
                $(".oldpassword").val();
                $(".npassword").val();
                $(".cpassword").val();
              toaster(response.message, 'success');
            }
            else
            {
            	toaster(response.message, 'error');
            }
        });
    }

    

</script>

