<?php 
$count_cart = count_cart();

$cat_name = $this->input->get('cat_id');
// print_r($cat_name);
// die;
include('include/allcss.php'); ?>
	
	<!-- Header -->
	<header class="header header-fixed">
			<div class="container">
				<div class="header-content">
					<div class="left-content">
						<a href="javascript:void(0);" class="menu-toggler">
							<i class="icon feather icon-menu"></i>
						</a>
						<h6 class="title font-14">Shop</h6>
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
		<div class="container p-0">
			<!-- Catagory Start -->
			<div class="swiper filter-swiper">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<a href="javascript:void(0);" class="filter-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom1" aria-controls="offcanvasBottom1">
							<i class="icon feather icon-sliders"></i>	
							<span>Sort By</span>
							<i class="icon feather icon-chevron-down"></i>
						</a>                                    
					</div>
					<div class="swiper-slide">
						<a href="javascript:void(0);" class="filter-btn"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom2" aria-controls="offcanvasBottom2">
							<span>Category</span>
							<i class="icon feather icon-chevron-down"></i>
						</a>                                    
					</div>
					<div class="swiper-slide">
						<a href="javascript:void(0);" class="filter-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom3" aria-controls="offcanvasBottom3">
							<span>Color</span>
							<i class="icon feather icon-chevron-down"></i>
						</a>                                    
					</div>
					<div class="swiper-slide">
						<a href="javascript:void(0);" class="filter-btn"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom4" aria-controls="offcanvasBottom4">
							<span>Size</span>
							<i class="icon feather icon-chevron-down"></i>
						</a>                                    
					</div>

				</div>
			</div>
			<!-- Catagory End -->
			
			<div class="container">
				<div class="row g-3 filter_card"></div>
			</div>
		</div>
	</div>
	<!-- price -->
	<div class="offcanvas offcanvas-bottom dz-filter-canvas" tabindex="-1" id="offcanvasBottom1" aria-labelledby="offcanvasBottomLabel1">
		<button type="button" class="btn-close drage-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		<div class="offcanvas-header border-0">
			<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
				<i class="icon feather icon-x"></i>
			</button>
			<h6 class="offcanvas-title" id="offcanvasBottomLabel1">Sort By</h6>
		</div>
		<div class="offcanvas-body">
			<div class="form-check">
				<label class="form-check-label" for="flexRadioDefault2">
					Price - high to low
				</label>
				<input class="form-check-input select-box" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="2" checked>
			</div>
			<div class="form-check">
				<label class="form-check-label" for="flexRadioDefault3">
					Price - low to high
				</label>
				<input class="form-check-input select-box" type="radio" name="flexRadioDefault" id="flexRadioDefault3" value="1">
			</div>
		</div>
	</div>

	<!-- category -->
	<div class="offcanvas offcanvas-bottom dz-filter-canvas" tabindex="-1" id="offcanvasBottom2" aria-labelledby="offcanvasBottomLabel2">
		<button type="button" class="btn-close drage-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		<div class="offcanvas-header border-0">
			<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
				<i class="icon feather icon-x"></i>
			</button>
			<h6 class="offcanvas-title" id="offcanvasBottomLabel2">Category</h6>
		</div>
		<div class="offcanvas-body">
			<div class="filter-content">
				<?php
                 $categories = $this->crud->selectDataByMultipleWhere('categories',array('status'=>1,));
                 foreach($categories as $key => $data)
                    { ?>
				<div class="form-check">
					<label class="form-check-label" for="cbrand<?=$data->id ?>">
						<?=$data->name ?>
					</label>
					<input class="form-check-input categories_val" type="checkbox" value="<?=$data->id ?>" id="cbrand<?=$data->id ?>" name="color[]" <?php if(!empty($cat_name)) if($cat_name==$data->id) echo 'checked' ?>>
				</div>
			<?php } ?>
				
			</div>
		</div>
	</div>

	<!-- color -->
	<div class="offcanvas offcanvas-bottom dz-filter-canvas" tabindex="-1" id="offcanvasBottom3" aria-labelledby="offcanvasBottomLabel3">
		<button type="button" class="btn-close drage-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		<div class="offcanvas-header border-0">
			<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
				<i class="icon feather icon-x"></i>
			</button>
			<h6 class="offcanvas-title" id="offcanvasBottomLabel3">Color</h6>
		</div>
		<div class="offcanvas-body">
			<div class="filter-content">
				<?php
                 $color = $this->crud->selectDataByMultipleWhere('color',array('status'=>1,));
                 foreach($color as $key => $data)
                    { ?>
				<div class="form-check">
					<label class="form-check-label" for="brand<?=$data->id ?>">
						<?=$data->name ?>
					</label>
					<input class="form-check-input color_val" type="checkbox" value="<?=$data->id ?>" id="brand<?=$data->id ?>" name="color[]" >
				</div>
			<?php } ?>
				
			</div>
		</div>
	</div>
	<!-- sixe -->
	<div class="offcanvas offcanvas-bottom dz-filter-canvas" tabindex="-1" id="offcanvasBottom4" aria-labelledby="offcanvasBottomLabel4">
		<button type="button" class="btn-close drage-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		<div class="offcanvas-header border-0">
			<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
				<i class="icon feather icon-x"></i>
			</button>
			<h6 class="offcanvas-title" id="offcanvasBottomLabel4">Size</h6>
		</div>
		<div class="offcanvas-body">
			<div class="filter-content">
				<?php
                 $size = $this->crud->selectDataByMultipleWhere('size',array('status'=>1,));
                 foreach($size as $key => $data)
                    { ?>
				<div class="form-check">
					<label class="form-check-label" for="11brand<?=$data->id ?>">
						<?=$data->name ?>
					</label>
					<input class="form-check-input size_val" type="checkbox" value="<?=$data->id ?>" id="11brand<?=$data->id ?>" name="size[]" >
				</div>
			<?php } ?>
				
			</div>

		</div>
	</div>


	<?php include('include/bottom-menu.php'); ?>
</div>  
<?php include('include/allscript.php'); ?>

<script>
   
   $(document).on("click", ".color_val, .size_val, .categories_val, .select-box",(function(e) {
     product_filter();
   }));

   function product_filter()
   {

			color = [];
	    $('.color_val:checkbox:checked').each(function(i){
	      color[i] = $(this).val();
	    });

	    size = [];
	    $('.size_val:checkbox:checked').each(function(i){
	      size[i] = $(this).val();
	    });

	    var sort_op = $(".select-box:checked").val();

	    categorys = [];
	    $('.categories_val:checkbox:checked').each(function(i){
	      categorys[i] = $(this).val();
	    });

	    var form = new FormData();
	    form.append("color", color);
	    form.append("size", size);
	    form.append("cat_name", categorys);
	    form.append("sort_op", sort_op);

	    // console.log(size);

	    var settings = {
	      "url": "<?=base_url() ?>api/Image_filter/product_filter",
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
	      $(".filter_card").html(response.data);
	      
	    });
	 }

   product_filter();

   
</script>