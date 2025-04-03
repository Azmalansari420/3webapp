<?php include('include/header.php'); ?>

<style>
	.money-box {
    background: white;
    color: black;
    padding: 12px 15px;
    border-radius: 9px;
    font-weight: 800;
    font-size: 18px;
}
</style>
	<!-- Header -->
		<header class="header shadow header-fixed border-0">
			<div class="container">
				<div class="header-content">
					<div class="left-content">
						<a href="javascript:void(0);" class="menu-toggler">
							<i class="icon feather icon-menu"></i>
						</a>
					</div>
					<div class="mid-content">
						<h6 class="title">Help Center </h6>
					</div>
					<div class="right-content">
						<a href="notification.php" class="search-icon">
							<i class="icon feather icon-bell"></i>
						</a>
					</div>
				</div>
			</div>
		</header>
	<!-- Header -->
	
	<!-- Sidebar -->
	<?php include('include/sidebar.php'); ?>
    <!-- Sidebar End -->
	
	<!-- Page Content Start -->
	<div class="page-content space-top p-b80">
		<div class="container">
				<div class="row p-1">

					<p class="mt-4">
						Feel Free to Contact Us
					</p>

					<div class="col-12 mt-3">
						<div class="card">
	                        
	                        <div class="card-body">
	                            <div class="mb-2">
									<label class="form-label" for="name">Subject</label>
									<input type="text" id="subject" class="form-control" >
								</div>
	                            <div class="mb-2">
									<label class="form-label" for="name">Message</label>
									<textarea rows="4" id="message" class="form-control"></textarea>
								</div>
	                        </div>
	                    </div>
					</div>

					<div class="total-cart">
						<a href="javascript:void(0);" class="btn btn-primary w-100 withdraw-submit-btn" style="color: black;font-size: 17px;font-weight: 800;">Submit</a>
					</div>

					
					
				</div>
			</div>
	</div>
	<!-- Page Content End -->
	
	<!-- Menubar -->
	<?php include('include/footer-menu.php'); ?>
	
	
</div>  


<?php include('include/footer.php'); ?>

<script>
	 /*withdraw request*/
    $(document).on("click", ".withdraw-submit-btn",(function(e) {
      withdraw_request();
    }));

    function withdraw_request()
    {
        var name = "<?=$full_detail->name ?>";
        var email = "<?=$full_detail->email ?>";
        var mobile = "<?=$full_detail->mobile ?>";
        var subject = $("#subject").val();
        var message = $("#message").val();

        if(subject=='')
        {
            toaster("Enter Subject", 'error');
            return false;
        }
        if(message=='')
        {
            toaster("Enter Somthing...", 'error');
            return false;
        }        
        
        var form = new FormData();
        form.append("name", name);
        form.append("email", email);
        form.append("mobile", mobile);
        form.append("subject", subject);
        form.append("message", message);

        var settings = {
          "url": "<?=base_url() ?>api/user/contact_enquiry",
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
          console.log(response);
          
          if(response.status==200)
          {
          	toaster(response.message, 'success');;
          	$("#subject").val("");
          	$("#message").val("");
          }
          else
          {
          	toaster(response.message, 'error');
          }
        });
    }
</script>