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
						<h6 class="title">Withdraws </h6>
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

					<div class="view-cart mb-2">
						<h5 class="card-title mb-3">Bank Account Details</h5>
						<ul>
							<li>
								<span class="name">Bank :</span>
								<span class="text-secondary font-w500"><?=$full_detail->bank_name ?></span>
							</li>
							<li>
								<span class="name">Bank Account No :</span>
								<span class="text-secondary font-w500"><?=$full_detail->bank_ac ?></span>
							</li>
							<li>
								<span class="name">IFSC :</span>
								<span class="text-secondary font-w500"><?=$full_detail->bank_ifsc ?></span>
							</li>						
						</ul>
					</div>

					<div class="col-12 mt-3">
						<div class="money-box">
							<b class="text-gray-700">Balance: <span class="update_wallet_amount"><?=currency_simble($full_detail->wallet) ?></span></b>
						</div>
					</div>


					<div class="col-12 mt-3">
						<div class="card">
	                        
	                        <div class="card-body">
	                            <div class="mb-2">
									<label class="form-label" for="name">Amount</label>
									<input type="text" id="amount" class="form-control" >
								</div>
	                            <div class="mb-2">
									<label class="form-label" for="name">Payment Password:</label>
									<input type="text" id="payment_pass" class="form-control" placeholder="Payment Password:">
								</div>
	                        </div>
	                    </div>
					</div>

					<div class="total-cart">
						<a href="javascript:void(0);" class="btn btn-primary w-100 withdraw-submit-btn" style="color: black;font-size: 17px;font-weight: 800;">Submit</a>
					</div>

					<p class="mt-4">
						1: Valid members can apply for withdrawal. The number of withdrawals is unlimited. The minimum withdrawal amount is 110 RS.<br>

						2: IFSC should be 11 characters, and the 5th character should be 0. If you fill in wrong bank information, your withdrawal will fail.<br>

						3: Withdrawal fee: 6%<br>

						4: Withdrawal time: 24-48 hours<br>
					</p>
					
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
        var amount = $("#amount").val();
        var payment_pass = $("#payment_pass").val();

        if(amount=='')
        {
            toaster("Select Amount", 'error');
            return false;
        }
        if(amount<=110)
        {
            toaster("Minimum Amount 100.", 'error');
            return false;
        }
        if(payment_pass=='')
        {
            toaster("Enter Payment Pass.", 'error');
            return false;
        }
        
        
        var form = new FormData();
        form.append("amount", amount);
        form.append("payment_pass", payment_pass);

        var settings = {
          "url": "<?=base_url() ?>api/Wallet/withdraw_request",
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
          
          if(response.status==200)
          {
          	toaster(response.message, 'success');
          	$(".update_wallet_amount").html(response.update_wallet_amount);
          	$("#amount").val("");
          	$("#payment_pass").val("");
            // window.location.href= response.url;
          }
          else
          {
          	toaster(response.message, 'error');
          }
        });
    }
</script>