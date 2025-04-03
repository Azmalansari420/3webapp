<?php
$user = getuserdata();
include('include/header.php'); ?>
 
<body>
<div class="page-wrapper">
    
	<!-- Preloader -->
	<?php include('include/loader.php'); ?>

    <!-- Preloader end-->
<style>
	.page-content.space-top {
	    padding-bottom: 75px;
	}
	.form-label {
	 color: black;
	}
</style>
	
	<!-- Header -->
		<header class="header header-fixed">
			<div class="container">
				<div class="header-content">
					<div class="left-content">
						<a href="javascript:void(0);" class="back-btn">
							<i class="icon feather icon-chevron-left"></i>
						</a>
						<h6 class="title">Complaint Box</h6>
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
				<label class="form-label" for="name">Name</label>
				<input type="text" id="enquiry_name" class="form-control" value="<?=$user[0]->name ?>" required>
			</div>
			<div class="mb-3">
				<label class="form-label" for="email">Email</label>
				<input type="email" id="enquiry_email" class="form-control" value="<?=$user[0]->email ?>" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="mobile">Mobile Number</label>
				<input type="tel" id="enquiry_mobile" class="form-control" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" value="<?=$user[0]->mobile ?>" >
			</div>
			
			<div class="mb-3">
				<label class="form-label" for="qualification">Subject</label>
				<input type="text" id="enquiry_subject" class="form-control" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="adhar">Message</label>
				<textarea class="form-control" id="enquiry_message"></textarea>
			</div>


		</div>
		<div class="container pt-0">
			<button type="button" class="btn btn-primary w-100 enquiry-submit-btn">Send Enquiry</button>
		</div>
	</div>
	<!-- Page Content End -->

<?php include('include/menu-bar.php'); ?>
	
</div> 

<?php include('include/footer.php'); ?>
<script>

	$(document).on("click", ".enquiry-submit-btn",(function(e) {
    enquiry_name();
  }));


function enquiry_name()
{
  var name = $("#enquiry_name").val();
  var email = $("#enquiry_email").val();
  var mobile = $("#enquiry_mobile").val();
  var subject = $("#enquiry_subject").val();
  var message = $("#enquiry_message").val();

   

  var form = new FormData();
  form.append("name", name);
  form.append("email", email);
  form.append("mobile", mobile);
  form.append("subject", subject);
  form.append("message", message);

  var settings = {
    "url": "<?=base_url() ?>api/user/user_enquiry_form",
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
    $(".loader-wrapper").removeClass("show");
    toast_print(1,response.message);
  });
}


</script>
