<?php
$this->load->view('app/include/header'); 
$cartcount = count_cart();
$id = $this->input->get('id');
$product = $this->crud->selectDataByMultipleWhere('product',array('id'=>$id)); 
if(!empty($product))
	$product = $product[0];
?>
<style>
.toaster.success {
  background-color: #fca725;
  font-size: 14px;
}

.tf-btn.accent:hover {
  color: #fa4530;
  background-color: transparent !important;
}

	.banner-tes img {
	    height: 100%;
	    border-radius: 8px;
	    object-fit: cover;
	}
	  .mrp-price{
	      color: black;
	      font-size: 16px;
	      margin-top: 5px;
	    }
	    .app-header {
    background: #5f94bf;
    padding: 10px 0px;
    margin: 0px -16px;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    position: relative;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
}
.tf-topbar .back-btn, .tf-topbar .clear-panel {
    position: absolute;
    left: 16px;
    top: -10px;
    color: white;
}
.app-header .tf-topbar .icon-market {
    color: #ffffff;
    font-size: 28px;
}
.icon-market {
    color: #1e1e1e;
    position: relative;
}
.icon-market span {
    font-family: "Plus Jakarta Sans", sans-serif;
    position: absolute;
    font-size: 10px;
    line-height: 9px;
    color: #ffffff;
    width: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 14px;
    background: #ea3434;
    border-radius: 50%;
    right: -1px;
    top: 1px;
}
ol, ul {
    list-style: inherit!important;
}

.quantity-input {
    display: flex;
    align-items: center;
}

.btn-minus, .btn-plus {
    width: 30px;
    height: 30px;
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    font-size: 18px;
    cursor: pointer;
}

#quantity {
    width: 50px;
    text-align: center;
    border: 1px solid #ccc;
    margin: 0 5px;
}

</style>

    <!-- /preload -->

    <div class="app-header">
    <div class="tf-container">
      <div class="tf-topbar d-flex justify-content-between align-items-center">
        <a class="user-info d-flex justify-content-between align-items-center" href="profile.php">
          

          <div class="content">
            <a href="javascript:void(0);" class="back-btn"> <i class="icon-left"></i> </a>
          </div>
        </a>
        <div class="d-flex align-items-center gap-4">
          <a href="cart.php"  class="icon-market"><span class="cart-count"><?=$cartcount ?></span></a>
        </div>
      </div>
    </div>
  </div>
    
    <div class="app-content" style="padding-top:0;">
	    <div class="tf-container">
	      	<div class="pt-0">
	          <div class="swiper-container banner-tes">
	              <div class="swiper-wrapper">
	                <?php
	                $getallimage = json_decode($product->image);
	                foreach($getallimage as $data)
	                  { ?>
	                  <div class="swiper-slide">
	                      <img src="<?=base_url() ?>media/uploads/product/<?=$data ?>" alt="images">
	                  </div>
	                  <?php } ?>
	              </div>
	          </div>
	      	</div>
	    </div>

	    <div class="app-section bg_white_color giftcard-detail-section-1">
	        <div class="tf-container">
	            <div class="voucher-info">
	                <h2 class="fw_6"><?=$product->name ?></h2>
	                <p class="mrp-price"><strong> ₹ <?=number_format($product->sale_price,2) ?></strong> &nbsp;&nbsp; <del style="color:red;">₹ <?=number_format($product->mrp_price,2) ?></del></p>
	            </div>
	        </div>
        </div>

        <div class="mb-8">        
	        <div class="app-section mt-1 bg_white_color giftcard-detail-section-2">
		        <div class="tf-container">
		        	<?php
		        	if(!empty($product->description))
		        		{ ?>
		            <div class="voucher-desc">
		                <h2 class="fw_6">Description</h2>
		                <?=$product->description ?>
		            </div> 
		        <?php } if(!empty($product->nutritional))
		        		{  ?>
		            <div class="voucher-desc mt-5">
		                <h2 class="fw_6">Nutritional</h2>
		                <?=$product->nutritional ?>
		            </div> 
		             <?php } if(!empty($product->ingredients))
		        		{  ?>
		            <div class="voucher-desc mt-5">
		                <h2 class="fw_6">Ingredients</h2>
		                <?=$product->ingredients ?>
		            </div> 
		        <?php } ?>
		        </div>
	        </div>	      
	    </div>  

	    <div class="bottom-navigation-bar bottom-btn-fixed">
        <div class="tf-container">
            <div class="row">
            	<div class="col-4">
				    <div class="quantity-input">
				        <button type="button" class="btn-minus" style="line-height: 0px;background-color: #000000;border: 1px solid #000000;    padding: 0px 5px;    font-size: 18px;">-</button>
				        <input type="number" name="quantity" value="1" class="form-control" id="quantity">
				        <button type="button" class="btn-plus" style="line-height: 0px;    border: 1px solid #000000; background-color: #000000;    padding: 0px 5px;   font-size: 18px;">+</button>
				    </div>
				</div>
            	<div class="col-8">
            		<a href="javascript:void(0);" class="tf-btn accent large add-to-cart" data-p_id="<?=$product->id ?>" data-price="<?=$product->sale_price ?>">Add to Cart</a>
            	</div>
            </div>
        </div>
    </div>

	</div>

    
    


<?php $this->load->view('app/include/sidebar'); ?>
<?php $this->load->view('app/include/notification'); ?>
<?php $this->load->view('app/include/footer'); ?>

<script>

	$(document).on("click", ".btn-plus", function() {
    var currentValue = parseInt($("#quantity").val());
    $("#quantity").val(currentValue + 1);
});

$(document).on("click", ".btn-minus", function() {
    var currentValue = parseInt($("#quantity").val());
    if (currentValue > 1) {
        $("#quantity").val(currentValue - 1);
    }
});



	var p_id = 0;
	 $(document).on("click", ".add-to-cart",(function(e) {
	 	p_id = $(this).data('p_id');
	 	price = $(this).data('price');
      	add_to_cart();
    }));

	function add_to_cart()
	{
		var user_id = '<?=$full_detail->id ?>';
		var quantity = $("#quantity").val();

		var form = new FormData();
		form.append("user_id", user_id);
		form.append("p_id", p_id);
		form.append("price", price);
		form.append("quantity", quantity);

		var settings = {
		  "url": "<?=base_url() ?>api/Distributor/add_to_cart",
		  "dataType": "json",
		  "method": "POST",
		  "timeout": 0,
		  "processData": false,
		  "mimeType": "multipart/form-data",
		  "contentType": false,
		  "data": form
		};

		$.ajax(settings).done(function (response) {
		  console.log(response);
		  $('.cart-count').html(response.cartcount)
		  toaster(response.message, 'success');
		});
	}
</script>