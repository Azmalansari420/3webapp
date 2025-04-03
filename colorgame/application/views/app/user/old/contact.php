<?php 
$count_cart = count_cart();
include('include/allcss.php'); ?>
    <!-- Preloader end-->
<style>
	.profile-image{
		display: flex;
    	justify-content: center;
	}
	.icon-edit-2{
	    position: relative;
	    top: 24px;
	    left: -10px;
	}
</style>
	
	<!-- Header -->
	<header class="header header-fixed">
			<div class="container">
				<div class="header-content">
					<div class="left-content">
						<a href="javascript:void(0);" class="menu-toggler">
							<i class="icon feather icon-menu"></i>
						</a>
						<h6 class="title font-14">Customer Support</h6>
					</div>
					<div class="mid-content header-logo">
					</div>
					<div class="right-content dz-meta">
						<a href="search.php" class="icon">
							<i class="icon feather icon-search"></i>
						</a>
						<a href="wishlist.php" class="icon">
							<i class="icon feather icon-heart"></i>
						</a>
						<a href="cart.php" class="icon shopping-cart">
							<i class="icon feather icon-shopping-cart"></i>
							<span class="badge badge-primary"><?=$count_cart ?></span>
						</a>
					</div>
				</div>
			</div>
		</header>

		<?php include('include/sidebar.php'); ?>
	
	<!-- Page Content Start -->
	<div class="page-content space-top" style="padding-bottom: 56px;">
		<div class="container">
				<div class="section-head1 mt-2 mb-3">
					<h2>24X7 Customer Support</h2>
					<p>Tell Us About Your Problem..</p>
				</div>
				<div class="account-area">
					<form id="myForm">
						<div class="mb-3">
							<label class="form-label" for="name">Full Name</label>
							<input type="text" id="name" class="form-control" value="<?=$full_detail->name ?>" required>
						</div>
						<div class="mb-3">
							<label class="form-label" for="email">Email</label>
							<input type="email" id="email" class="form-control" value="<?=$full_detail->email ?>" required >
						</div>
						<div class="mb-3">
							<label class="form-label" for="phone">Mobile Number</label>
							<input type="tel" id="mobile" class="form-control" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" value="<?=$full_detail->mobile ?>">
						</div>

						<div class="mb-3">
							<label class="form-label" for="phone">Subject</label>
							<input type="tel" id="subject" class="form-control" placeholder="Subject" >
						</div>

						<div class="mb-3">
							<label class="form-label" for="phone">Message</label>
							<textarea id="message" class="form-control" placeholder="Subject"></textarea>
						</div>						

						<a href="#!" class="btn btn-primary w-100 submit-btn">Submit</a>
					</form>  
				</div>
			</div>
	</div>
	<?php include('include/bottom-menu.php'); ?>
	
</div>  

<?php include('include/allscript.php'); ?>

<script>
	const user_id = '<?=$full_detail->id ?>';

	$(document).on("click", ".submit-btn",(function(e) {
      change_password();
    }));

    function change_password()
    {
        var name = $("#name").val();
        var email = $("#email").val();
        var mobile = $("#mobile").val();
        var subject = $("#subject").val();
        var message = $("#message").val();

        if(message=="")
        {
            toaster("Enter Your Message.", 'success');
            return false;
        }
        

        var form = new FormData();
        form.append("user_id", user_id);
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

        $.ajax(settings).done(function (response) {
          // console.log(response);
          if(response.status==200)
          {
          	 $('#myForm')[0].reset();
          	 $("#subject").val('');
          	 $("#message").val('');
          }
          toaster(response.message, 'success');
        });
    }

    

</script>