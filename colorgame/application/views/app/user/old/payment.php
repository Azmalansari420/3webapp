<?php 
include('include/allcss.php');
$count_cart = count_cart();

$orderid = $this->input->get('order_id');
$final = $this->crud->selectDataByMultipleWhere('finalorder',array('order_id'=>$orderid));

?>
	
	<!-- Header -->

		<header class="header header-fixed">
			<div class="container">
				<div class="header-content">
					<div class="left-content">
						<a href="javascript:void(0);" class="menu-toggler">
							<i class="icon feather icon-menu"></i>
						</a>
						<h6 class="title font-14">Payment</h6>
					</div>
					<div class="mid-content header-logo">
					</div>
					<div class="right-content dz-meta">
						<a href="wishlist.php" class="icon">
							<i class="icon feather icon-heart"></i>
						</a>
						<a href="cart.php" class="icon shopping-cart">
							<i class="icon feather icon-shopping-cart"></i>
							<span class="badge badge-primary count-cart"><?=$count_cart ?></span>
						</a>
					</div>
				</div>
			</div>
		</header>

		 <?php include('include/sidebar.php'); ?>
<style>
	fieldset {
	padding: 0;
	margin: 0;
	border: 0;
	border-radius: 20px;
	width: 100%;
}

legend {
	font-size: 22px;
	font-weight: 600;
	color: white;
	margin: 0;
	background: #fe4487;
	width: 100%;
	padding: 8px 20px;
	box-sizing: border-box;
	border-radius: 10px 10px 0 0;
	border: 2px solid #fe4487;
	display: flex;
	justify-content: center;
}

fieldset label {
	font-weight: 300;
	font-size: 16px;
	cursor: pointer;
	display: flex;
	align-items: center;
	flex: 1;
	box-sizing: border-box;
	display: flex;
	padding: 14px 12px 20px 40px;
	font-weight: 500;
	color: #191919;
	-webkit-tap-highlight-color: transparent;
}

fieldset input[type="radio"] {
	position: relative;
	appearance: none;
	-webkit-appearance: none;
	transition: linear 0.8s;
	height: 0;
	width: 0;
	-webkit-tap-highlight-color: transparent;
}

fieldset input[type="radio"]:after {
	content: "";
	position: absolute;
	height: 16px;
	width: 16px;
	top: -10.5px;
	left: -30px;
	border-radius: 20px;
	border: 2px solid #3a88f6;
	transition: linear 0.2s;
	cursor: pointer;
}

fieldset input[type="radio"]:checked:after {
	content: "";
	position: absolute;
	height: 16px;
	width: 16px;
	background: #3a88f6;
	transition: linear 0.2s;
	cursor: pointer;
}

fieldset input[type="radio"]:checked:before {
	content: "";
	position: absolute;
	height: 8px;
	width: 8px;
	border-radius: 4px;
	background: #fff;
	left: -24px;
	top: -4.5px;
	z-index: 1;
	cursor: pointer;
}

.radio-item-container {
	display: flex;
	flex-direction: column;
	border: 2px solid #3a88f6;
	border-top: 0;
	background: #fff;
	border-radius: 0 0 10px 10px;
	padding: 10px 0;
}

.radio-item {
	display: flex;
	position: relative;
}

.pay-icon {
	font-size: 24px;
	position: absolute;
	right: 26px;
	top: 11px;
	transition: linear 0.3s;
}

fieldset input[type="radio"]:checked + span > .pay-icon {
	transform: scale(1.7);
}
.view-cart.style-2 .name {
    color: #000000;
    font-weight: 600;
}

</style>
	<!-- Page Content Start -->
	<div class="page-content space-top p-b50">
		<div class="container">
			<input type="hidden" value="<?=$orderid ?>" id="order_id">

			<fieldset>
				<legend>Choose a Payment Type</legend>
				<div class="radio-item-container">
					<div class="radio-item">
						<label for="vanilla">
							<input type="radio" id="vanilla" name="payment_type" value="1" class="payment_type">
							<span>Cash On Delivery <span class="pay-icon"><img src="<?=base_url() ?>assets/images/icons/cash.png" alt="/" width="40"></span> </span>
						</label>
					</div>

					<div class="radio-item">
						<label for="chocolate">
							<input type="radio" id="chocolate" name="payment_type" value="2" class="payment_type">
							<span>Razorpay <span class="pay-icon"><img src="<?=base_url() ?>media/razorpay.webp" width="65"></span></span>
						</label>
					</div>

					<!-- <div class="radio-item">
						<label for="phonpay">
							<input type="radio" id="phonpay" name="payment_type" value="3" class="payment_type">
							<span>PhonePay <span class="pay-icon"><img src="<?=base_url() ?>media/phonepay.png" width="65"></span></span>
						</label>
					</div> -->

				</div>
			</fieldset>
			
		
			
			<div class="view-cart style-2">
				<h6 class="title border-bottom pb-2">Amount</h6>
				<ul>
					<li>
						<span class="name">Sub Total</span>
						<span class="font-w600"><?php if(!empty($final[0]->sub_total)) echo currency_simble($final[0]->sub_total); ?></span>
					</li>
					
					<?php if(!empty($final[0]->discount_amount))
					{ ?>
					<li>
						<span class="name">Coupon Discount</span>
						<span class="font-w600"><?php if(!empty($final[0]->discount_amount)) echo currency_simble($final[0]->discount_amount); ?></span>
					</li>
				<?php } ?>
					<li class="divider style-2 mt-0 pb-0"></li>
					<li>
						<span class="name">Total Amount</span>
						<h4 class="price"><?php if(!empty($final[0]->sub_total)) echo currency_simble($final[0]->after_discount_final_price); ?></h4>
					</li>
				</ul>
			</div>

			<div class="total-cart mt-4">
				<a href="#!" class="btn btn-primary w-100 submit-btn">Pay now</a>
			</div>
		</div>
	</div>
	
		
	
<?php include('include/bottom-menu.php'); ?>
	<!-- Menubar -->
	
	
</div>  
<?php include('include/allscript.php'); ?>

<script>
	$(document).on("click", ".submit-btn",(function(e) {
      paymenttype();
    }));

    function paymenttype()
    {
        var order_id = $("#order_id").val();
        var payment_type = $('.payment_type:checked').val();

        if(payment_type=='')
        {
        	toaster('Select Payment Type.', 'success');
        	return false;
        }
        
        var form = new FormData();

        form.append("order_id", order_id);
        form.append("payment_type", payment_type);


        var settings = {
          "url": "<?=base_url() ?>api/Image_filter/payment_type_select",
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
		    if(response.status == 200) {
		        toaster(response.message, 'success');
		        setTimeout(function(){
		            window.location.href = response.url;
		        }, 1000);
		    }
		});
    }

</script>