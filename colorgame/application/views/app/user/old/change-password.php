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
						<h6 class="title font-14">Reset Your Password</h6>
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
					<h2>Reset Your Password</h2>
					<p>Your new password must be diffrent form previously used password.</p>
				</div>
				<div class="account-area">
					<form>
						<div>
							<label class="form-label" for="dz-password">Old Password</label>
							<div class="mb-3 input-group input-group-icon">
								<input type="password" id="dz-password" class="form-control dz-password oldpassword" placeholder="Type Password Here">
								<span class="input-group-text show-pass"> 
									<i class="icon feather icon-eye-off eye-close"></i>
									<i class="icon feather icon-eye eye-open"></i>
								</span>
							</div>
						</div>
						<div>
							<label class="form-label" for="dz-password">New Password</label>
							<div class="mb-3 input-group input-group-icon">
								<input type="password" id="dz-password" class="form-control dz-password npassword" placeholder="Type Password Here">
								<span class="input-group-text show-pass"> 
									<i class="icon feather icon-eye-off eye-close"></i>
									<i class="icon feather icon-eye eye-open"></i>
								</span>
							</div>
						</div>
						<div>
							<label class="form-label" for="dz-password2">Confirm Password</label>
							<div class="mb-3 input-group input-group-icon">
								<input type="password" id="dz-password2" class="form-control dz-password cpassword" placeholder="Type Password Here">
								<span class="input-group-text show-pass"> 
									<i class="icon feather icon-eye-off eye-close"></i>
									<i class="icon feather icon-eye eye-open"></i>
								</span>
							</div>
						</div>

						<a href="#!" class="btn btn-primary w-100 submit-btn">Save</a>
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
        var oldpassword = $(".oldpassword").val();
        var npassword = $(".npassword").val();
        var cpassword = $(".cpassword").val();

        if(oldpassword=="")
        {
            toaster("Enter Old Password.", 'success');
            return false;
        }
        if(npassword=="")
        {
            toaster("Enter New Password.", 'success');
            return false;
        }
        if(cpassword=="")
        {
            toaster("Enter Confirm Password.", 'success');
            return false;
        }

        var form = new FormData();
        form.append("user_id", user_id);
        form.append("oldpassword", oldpassword);
        form.append("npassword", npassword);
        form.append("cpassword", cpassword);

        var settings = {
          "url": "<?=base_url() ?>api/user/password_update",
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
        });
    }

    

</script>