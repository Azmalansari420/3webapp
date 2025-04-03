<?php 
$count_cart = count_cart();
$cartmodel = cart_products();
$user_id = $this->session->userdata("user")['id'];  
$coponapply = $this->db->get_where('order_coupon',array('user_id'=>$user_id,"status"=>0,))->result_object();
$coupon = 0;
if(!empty($coponapply[0]->coupon)) 
{
    $coupon = $coponapply[0]->coupon;
}
$applied_coupon = applied_coupon($coupon,'');


include('include/allcss.php'); ?>
	
	<!-- Header -->
	<header class="header header-fixed">
		<div class="container">
			<div class="header-content">
				<div class="left-content">
					<a href="javascript:void(0);" class="menu-toggler">
						<i class="icon feather icon-menu"></i>
					</a>
					<h6 class="title font-14">Cart</h6>
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
	<?php
    if(!empty($cartmodel))
        { ?>
	<div class="page-content space-top p-b50 ">
		<div class="container cart-page-data">	
		<?php $this->load->view('app/user/include/cart-page'); ?>
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
				<a href="checkout.php" class="btn btn-primary">Checkout</a>
			</div>
		</div>
	</div>
	<?php } else{ ?>
       <div class="text-center">
           <img src="<?=base_url() ?>media/cart-empty.webp" class="img-fluid">
       </div>
    <?php } ?>

	
	
	
</div> 


<?php include('include/allscript.php'); ?>

<script>
var id = 0;
	/*quantity + - */
	$(document).ready(function(){
	    $('.plus, .minus').click(function(){
	        var inputBox = $(this).siblings('.input-box'); // Get the sibling input box
	        var id = inputBox.data('id'); // Get the data-id from the input box
	        
	        var value = parseInt(inputBox.val());
	        if ($(this).hasClass('plus')) {
	            value = value < 10 ? value + 1 : 10;
	        } else {
	            value = value > 1 ? value - 1 : 1;
	        }
	        inputBox.val(value);
	        quantity_update(id, value);
	    });
	});

	/*qauntuty plys minus ajax*/

	function quantity_update(id, quantity)
   {
      var form = new FormData();
      form.append("id", id);
      form.append("quantity", quantity);

      var settings = {
        "url": "<?=base_url() ?>api/Image_filter/update_cart_item",
        "method": "POST",
        "dataType": "json",
        "timeout": 0,
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
        "data": form
      };

      $.ajax(settings).done(function (response) {
        toaster(response.message, 'success');
        console.log(response);
        $(".cart-page-data").html(response.cart_page_data);
        $(".finalprice").html(response.finalamt);

      });
   }


	/*delete cart*/
    $(document).on("click", ".delete-cart-btn",(function(e) {
      id = $(this).data('id');
      delete_cart();
      event.preventDefault();
    }));

   function delete_cart()
   {
      var form = new FormData();
      form.append("id", id);

      var settings = {
        "url": "<?=base_url() ?>api/Image_filter/delete_cart_item",
        "method": "POST",
        "dataType": "json",
        "timeout": 0,
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
        "data": form
      };

      $.ajax(settings).done(function (response) {
        toaster(response.message, 'success');
        // console.log(response);
        $(".cart-page-data").html(response.cart_page_data);
        $('.count-cart').html(response.count)
        $(".finalprice").html(response.finalamt);

      });
   }


/*apply coupen*/

$(document).on("click", ".apply-coupen-btn",(function(e) {
      coupen_apply();
    }));

    function coupen_apply()
    {
        var coupon = $(".coupon_code").val();
        if(coupon=='')
          {
            toaster("Please Enter Coupon Name...", 'success');
            return false;
          }

        var form = new FormData();
        form.append("coupon", coupon);

        var settings = {
          "url": "<?=base_url() ?>api/Image_filter/apply_couponcode",
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
          $(".cart-page-data").html(response.checkout_card);
          $(".finalprice").html(response.finalamt);
          if(response.status==400)
          {
            $('.coupon_code').val('');
          }
          else
          {
            $(".delete-coupen-btn").css("display", "inline-block");
          }
          toaster(response.message, 'success');
        });
    }



    /*-------delete coupon---*/

    $(document).on("click", ".delete-coupen-btn",(function(e) {
      delete_couponcode();
    }));

    function delete_couponcode()
    {
        var form = new FormData();

        var settings = {
          "url": "<?=base_url() ?>api/Image_filter/delete_coupon",
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
          $(".cart-page-data").html(response.checkout_card);
          $(".finalprice").html(response.finalamt);
          if(response.status==200)
          {
            $('.coupon_code').val('');
            $(".delete-coupen-btn").css("display", "none");
          }
          toaster(response.message, 'success');
        });
    }


</script>