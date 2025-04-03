<?php 
$count_cart = count_cart();

$id = $this->input->get('id');
$product = $this->crud->selectDataByMultipleWhere('product',array('id'=>$id));
if(!empty($product))
	$product = $product[0];
include('include/allcss.php'); ?>
<style>
	.active-color
	{
		border: 2px solid black !important;
	}
	.active-size
	{
		border: 2px solid black !important;
		background-color: red;
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
						<h6 class="title font-14"><?=website_name ?></h6>
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
							<span class="badge badge-primary count-cart"><?=$count_cart ?></span>
						</a>
					</div>
				</div>
			</div>
		</header>
	<!-- Header -->

	    <?php include('include/sidebar.php'); ?>
	
	<!-- Page Content Start -->
	<div class="page-content p-b100 p-t50">
		<div class="container p-0">

			<div class="htmlcard"></div>

			<div class="container">
				<div class="dz-product-detail">
					<div class="detail-content">
						<span class="brand-tag"><?=category_app($product->cat_id) ?></span>
						<h6><?=$product->name ?></h6>
						<?=$product->small_info ?>
					</div>
					
					<div>
						<h6>Colors</h6>
						<div class="bootstrap-bad4ge mb-4">
							<?php
                $this->db->group_by('color_id');
                $color = $this->db->get_where('all_images',array('p_id'=>$product->id,))->result_object();

                $color_id = 0;
                if(!empty($color))
                {
                  foreach ($color as $key => $value) 
                    {
                    $color_name = $this->db->get_where('color',array('id'=>$value->color_id))->result_object();
                    if($key==0)
                      $color_id = $color_name[0]->id;
                    ?>
							<span class="badge color_value <?php if($key==0) echo 'active-color'; ?>" style="background-color:<?php echo $color_name[0]->color_code; ?>;" data-color_id="<?php echo $color_name[0]->id; ?>"><?=$color_name[0]->name ?></span>
							 <?php } } ?>
						</div>

						<h6>Size</h6>
						<div class="bootstrap-bad4ge" >
							<div class="size-container">
								<?php 
							    $this->db->group_by('size_id'); 
							    $size = $this->crud->selectDataByMultipleWhere('all_images',array('p_id'=>$id,'color_id'=>$color_id)); 
							    if(!empty($size)) { 
							        foreach ($size as $key => $value) { 
							            $size_name = $this->crud->selectDataByMultipleWhere('size',array('id'=>$value->size_id)); 
							            ?>
							            <span class="badge badge-dark size_value <?php if($key==0) echo 'active-size'; ?>" style="margin-right: 2px;" 
							                  data-size_id="<?php echo $size_name[0]->id; ?>">
							                <?=$size_name[0]->name ?>
							            </span>
							        <?php } 
							    } 
							    ?>
							</div>
						
						</div>
					</div>


					<?php
					if(!empty($product->specification))
						{ ?>
					<div class="divider border"></div>
					<h6>Spacifications</h6>
					<?=$product->specification ?>
				<?php } ?>

				<?php
					if(!empty($product->description))
						{ ?>
					<div class="divider border"></div>
					<h6>Discription</h6>
					<?=$product->description ?>
				<?php } ?>
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
					<h3 class="price"> <span class="sale_price">00</span> <del class="mrp_price">00</del></h3>
					<span class="font-w500 text-primary"><span class="discounts"></span>% OFF</span>
				</div>
				<div style="display: flex;">
					<input type="number" name="quantity" class="form-control quantity-val" style="width: 50px;padding: 0 6px;" value="1">
				<a href="#!" class="btn btn-primary add-to-cart-btn">Add Cart</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer End -->

	
</div>  
<?php include('include/allscript.php'); ?>
<script>
 var color_id = 0;
 var size_id = 0;

 

$(document).on("click", ".color_value", function(e) {
    // Remove active-color class from all color values
    $(".color_value").removeClass("active-color");
    
    // Add active-color class to the clicked color value
    $(this).addClass("active-color");
    
    // Update color_id variable
    color_id = $(this).data("color_id");
    
    // Call image_color_size_wise function
    image_color_size_wise();
});

$(document).on("click", ".size_value", function(e) {
    // Remove active-size class from all size values
    $(".size_value").removeClass("active-size");
    
    // Add active-size class to the clicked size value
    $(this).addClass("active-size");
    
    // Update size_id variable
    size_id = $(this).data("size_id");
    
    // Call image_color_size_wise function
    image_color_size_wise();
});

function image_color_size_wise() {
    color_id = $(".color_value.active-color").data("color_id");
    size_id = $(".size_value.active-size").data("size_id");
    
    // Set default color and size if not selected
    if (typeof color_id === 'undefined') {
        color_id = $(".color_value:first").data("color_id");
        $(".color_value:first").addClass('active-color');
    }
    if (typeof size_id === 'undefined') {
        size_id = $(".size_value:first").data("size_id");
        $(".size_value:first").addClass('active-size');
    }
    
    var form = new FormData();
    form.append("p_id", <?=$id ?>);
    form.append("color_id", color_id);
    form.append("size_id", size_id);
    
    var settings = {
        "url": "<?=base_url() ?>api/image_filter/image_by_colorsize",
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
        $(".htmlcard").html(response.html);
        $(".size-container").html(response.sizelist);
        $(".sale_price").html(response.price.sale_price);
        $(".mrp_price").html(response.price.mrp_price);
        $(".discounts").html(response.price.discount);
        
        // Add active-size class to the size value that matches the size_id
        $(".size_value").removeClass("active-size").filter(function() {
            return $(this).data("size_id") == size_id;
        }).addClass("active-size");
    });
}

image_color_size_wise();
/*-============add to cart==========================*/

$(document).on("click", ".add-to-cart-btn",(function(e) {
  add_to_cart_single();
  event.preventDefault();
}));


  function add_to_cart_single()
  {
    color_id = $(".color_value.active-color").data("color_id");
    size_id = $(".size_value.active-size").data("size_id");
    var quantity = $(".quantity-val").val();


    if (!size_id) {
        toaster("Select Size", 'success'); // Changed to error toaster
        return false;
    }


    var form = new FormData();
    form.append("p_id", <?=$id ?>);
    form.append("quantity", quantity);
    form.append("size_id", size_id);
    form.append("color_id", color_id);

    var settings = {
      "url": "<?=base_url() ?>api/image_filter/add_to_cart_single",
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
      $('.count-cart').html(response.count)
      toaster(response.message, 'success');
    });
  }


</script>