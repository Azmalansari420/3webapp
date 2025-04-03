<?php include('include/header.php'); ?>

<style>
	label.radio-label {
	    color: white;
	    font-weight: 700;
	}
	.money-btn {
	    position: inherit !important;
	    background: #000000 !important;
	    color: #ffffff !important;
	    border-radius: 7px;
	    padding: 7px 20px;
	    height: 40px;
	    margin: 0 0 5px 0;
	    width: 30%;
	}
    .money-btn:after {
        content: inherit;
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
						<h6 class="title">Recharge </h6>
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
					<div class="mt-3">
						<input type="text" id="w_amount" class="form-control amount" placeholder="Enter Amount">
					</div>

					<div class="text-center mt-3">
                        <?php  
                        $buttons = explode(",", "600,3500,7500,13000,23000,52000");
                        foreach ($buttons as $key => $value) {
                        ?>
                        <button type="button" class="btn btn-info money-btn" data-amt="<?=$value ?>"><?=$value ?></button>
                        <?php } ?>
                    </div> 

									

					<div class="col-12 mt-3">
						<div class="card">
	                        <div class="card-header">
	                            <h5 class="card-title">Payment channel</h5>
	                        </div>
	                        <div class="card-body">
	                            <div class="radio square-radio">
	                                <label class="radio-label">Rs-Pay
	                                    <input type="radio" checked="checked" name="radio1" value="1">
	                                    <span class="checkmark"></span>
	                                </label>
	                                <label class="radio-label">Fast-Pay
	                                    <input type="radio" name="radio1" value="2">
	                                    <span class="checkmark"></span>
	                                </label>
	                                <label class="radio-label">Mx-Pay
	                                    <input type="radio" name="radio1" value="3">
	                                    <span class="checkmark"></span>
	                                </label>
	                                <label class="radio-label">Us-Pay
	                                    <input type="radio" name="radio1" value="4">
	                                    <span class="checkmark"></span>
	                                </label>
	                            </div>
	                        </div>
	                    </div>
					</div>

					<div class="total-cart">
						<a href="javascript:void(0);" class="btn btn-primary w-100 submit-btn" style="color: black;font-size: 17px;font-weight: 800;">Submit</a>
					</div>

					<p class="mt-4">
						<strong>Important tip:</strong><br>

						Please do not save the same payment account and make repeated payments. For each payment, please click to enter the payment channel and copy the latest payment account.
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
	var amount = 0;
    $(document).on("click", ".money-btn",(function(e) {
        amount = $(this).data('amt');    
        $("#w_amount").val(amount);
    }));


    /*addd point request*/
  $(document).on("click", ".submit-btn",(function(e) {
      add_point();
    }));

    function add_point()
    {
        var pay_type = $("input[name='radio1']:checked").val();
        var amount = $(".amount").val();

        if(amount=='')
        {
            toaster("Enter Amount.", 'error');
            return false;
        }


        if(pay_type=='')
        {
            toaster("Select Type", 'error');
            return false;
        }
        
        // if(amount<=100)
        // {
        //     toaster("Minimum Amount 100.", 'error');
        //     return false;
        // }

        var form = new FormData();
        form.append("pay_type", pay_type);
        form.append("amount", amount);

        var settings = {
          "url": "<?=base_url() ?>api/Wallet/recharge",
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
          	$(".amount").val("");
            // window.location.href= response.url;
          }
          else{
          	toaster(response.message, 'error');

          }
        });
    }











</script>