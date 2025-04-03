<?php 
$count_cart = count_cart();
include('include/allcss.php'); ?>
	
	<!-- Header -->
		<header class="header header-fixed">
			<div class="container">
				<div class="header-content">
					<div class="left-content">
						<a href="javascript:void(0);" class="menu-toggler">
							<i class="icon feather icon-menu"></i>
						</a>
						<h6 class="title font-14">Categories</h6>
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
	<div class="page-content space-top p-b60 overflow-hidden">
		<div class="container">
			<div class="row g-3">
				<?php
				$category = $this->crud->selectDataByMultipleWhere('categories',array('status'=>1,));
				foreach($category as $data)
					{ ?>
				<div class="col-md-6 col-12">
					<div class="dz-category-card style-2 card-light">
						<div class="banner-bg" style="background-image: url('<?=base_url() ?>media/uploads/categories/<?=$data->image ?>');"></div>
						<div class="category-content">
							<h2 class="title"><?=$data->name ?></h2>
							<p>Collectons</p>
							<div class="shop-btn"><a href="shop.php?cat_id=<?=$data->id ?>" class="btn btn-primary btn-md">Shop Now</a></div>
						</div>
					</div>
				</div>
				
				<?php } ?>				
			</div>
		</div>
	</div>
	<!-- Page Content End -->
	<!-- Menubar -->
	<?php include('include/bottom-menu.php'); ?>
	<?php include('include/multycolor.php'); ?>
	<!-- Menubar -->
	
	
</div>  
<?php include('include/allscript.php'); ?>