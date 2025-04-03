<?php 
include('include/allcss.php');
$count_cart = count_cart();
$user_id = $this->session->userdata("user")['id'];  
$coponapply = $this->db->get_where('order_coupon',array('user_id'=>$user_id,"status"=>0,))->result_object();
$coupon = 0;
if(!empty($coponapply[0]->coupon)) 
{
    $coupon = $coponapply[0]->coupon;
}
$applied_coupon = applied_coupon($coupon,'');
 ?>
<style>
	select {
	    border-radius: 8px;
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
					<h6 class="title font-14">Checkout</h6>
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
	<!-- Header -->
	 <?php include('include/sidebar.php'); ?>
	
	<!-- Page Content Start -->
	<div class="page-content space-top p-b40">
		<div class="container">
			<h6 class="title border-bottom pb-2 mb-3">Contact Details</h6>
			<div class="mb-3">
				<label class="form-label" for="name">Full Name</label>
				<input type="text" id="name" class="form-control" placeholder="Type Your Name" value="<?=$full_detail->name ?>">
			</div>
			<div class="mb-3">
				<label class="form-label" for="mobile">Mobile No.</label>
				<input type="number" id="mobile" class="form-control" placeholder="Type Your Mobile No." value="<?=$full_detail->mobile ?>">
			</div>
			
			<div class="mb-3">
				<label class="form-label" for="email">Email.</label>
				<input type="email" id="email" class="form-control" placeholder="Type Your Email." value="<?=$full_detail->email ?>">
			</div>
			
			<h6 class="title border-bottom pb-2 mb-3">Address</h6>
			
			<div class="mb-3">
				<label class="form-label" for="address">Address</label>
				<textarea  class="form-control" id="address"><?=$full_detail->address ?></textarea>
			</div>

			<div class="mb-3">
				<label class="form-label" for="Pincode">locality</label>
				<input type="text" id="locality" class="form-control" placeholder="locality" value="<?=$full_detail->locality ?>">
			</div>
			<div class="row gx-3">
				<div class="col-6">
					<div class="mb-3">
						<label class="form-label" for="state">State</label>
						<select name="state" required class="state-id">
	                        <option value="" selected>Select State</option>
	                        <?php
	                        $state = $this->crud->selectDataByMultipleWhere('state',array('status'=>1));
	                        foreach($state as $data)
	                            { ?>
	                        <option <?php if(!empty($full_detail->state)) if($full_detail->state==$data->id) echo 'selected'; ?> value="<?=$data->id ?>"><?=$data->name ?></option>
	                        <?php } ?>
	                    </select>
					</div>
				</div>

				<div class="col-6">
					<div class="mb-3">
						<label class="form-label" for="City">City/District</label>
						<select class="city-list" name="city">
	                        <?php
	                        $city = $this->crud->selectDataByMultipleWhere('city',array('status'=>1));
	                        foreach($city as $data)
	                            { ?>
	                        <option <?php if(!empty($full_detail->city)) if($full_detail->city==$data->id) echo 'selected'; ?> value="<?=$data->id ?>"><?=$data->name ?></option>
	                        <?php } ?>
	                    </select>
					</div>
				</div>
				<div class="mb-3">
					<label class="form-label" for="pincode">Pin Code</label>
					<input type="text" id="pincode" class="form-control" placeholder="Pin Code" value="<?=$full_detail->pin ?>">
				</div>

				<div class="mb-3">
					<label class="form-label" for="ordernote">Order Note.</label>
					<textarea  class="form-control" id="ordernote"></textarea>
				</div>

				
			</div>
			
		</div>
	</div>
	<!-- Page Content End -->
	<!-- Footer Start -->
	<div class="footer fixed bg-white border-top">
		<div class="container py-2">
			<div class="total-cart">
				<div class="price-area">
					<h3 class="price text-secondary finalprice"><?=currency_simble($applied_coupon['after_discount_final_price']) ?></h3>
				</div>
				<a href="#!" class="btn btn-primary submit-btn">Checkout</a>
			</div>
		</div>
	</div>

	
</div>  
<?php include('include/allscript.php'); ?>

<script>
	$(document).on("click", ".submit-btn",(function(e) {
      finalorder();
    }));

    function finalorder()
    {
        var name = $("#name").val();
        var mobile = $("#mobile").val();
        var email = $("#email").val();
        var address = $("#address").val();
        var locality = $("#locality").val();
        var state = $(".state-id").val();
        var city = $(".city-list").val();
        var pincode = $("#pincode").val();
        var order_note = $("#ordernote").val();

        
        var form = new FormData();

        form.append("name", name);
        form.append("email", email);
        form.append("mobile", mobile);
        form.append("address", address);
        form.append("locality", locality);
        form.append("state", state);
        form.append("city", city);
        form.append("pincode", pincode);
        form.append("order_note", order_note);

        var settings = {
          "url": "<?=base_url() ?>api/Image_filter/final_order",
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