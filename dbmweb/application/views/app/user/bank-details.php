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
						<h6 class="title">Bind Bank Account </h6>
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
			<div class="account-area mt-2">
			<form>

				<div class="mb-3">
					<label class="form-label" for="bank_username">Realname</label>
					<input type="text" id="bank_username" class="form-control" value="<?=$full_detail->bank_username ?>">
				</div>
				
				<div class="mb-3">
					<label class="form-label" for="bank_name">Bank</label>
					<input type="text" id="bank_name" class="form-control" value="<?=$full_detail->bank_name ?>">
				</div>
				
				<div class="mb-3">
					<label class="form-label" for="bank_ac">Bank Account No</label>
					<input type="text" id="bank_ac" class="form-control" value="<?=$full_detail->bank_ac ?>">
				</div>

				<div class="mb-3">
					<label class="form-label" for="bank_ifsc">IFSC</label>
					<input type="text" id="bank_ifsc" class="form-control" value="<?=$full_detail->bank_ifsc ?>">
				</div>
				
				<a href="javascript:void(0);" class="btn mb-3 btn-primary w-100 submit-btn">Submit</a>
				
			</form>  
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
    $(document).on("click", ".submit-btn",(function(e) {
      withdraw_request();
    }));

    function withdraw_request()
    {
        var bank_username = $("#bank_username").val();
        var bank_name = $("#bank_name").val();
        var bank_ac = $("#bank_ac").val();
        var bank_ifsc = $("#bank_ifsc").val();

        if(bank_username=='')
        {
            toaster("Enter Realname", 'error');
            return false;
        }
        if(bank_name=='')
        {
            toaster("Enter Bank Name", 'error');
            return false;
        }
        if(bank_ac=='')
        {
            toaster("Enter Bank A/C", 'error');
            return false;
        }
        if(bank_ifsc=='')
        {
            toaster("Enter Bank IFSC", 'error');
            return false;
        }


       
        
        var form = new FormData();
        form.append("bank_username", bank_username);
        form.append("bank_name", bank_name);
        form.append("bank_ac", bank_ac);
        form.append("bank_ifsc", bank_ifsc);

        var settings = {
          "url": "<?=base_url() ?>api/user/bakdetails",
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