<?php 
$count_cart = count_cart();
$wishlist = wishlist_cart();

include('include/allcss.php'); 
?>
	
	<!-- Header -->
	<header class="header header-fixed">
			<div class="container">
				<div class="header-content">
					<div class="left-content">
						<a href="javascript:void(0);" class="menu-toggler">
							<i class="icon feather icon-menu"></i>
						</a>
						<h6 class="title font-14">Wishlist</h6>
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
	<div class="page-content space-top p-b50">
		<div class="container">
			<?php
				if(!empty($wishlist))
					{ ?>
			<div class="row g-3 mb-3 wishlist-side">
				
				<?php $this->load->view('app/user/include/wishlist-page'); ?>
				
			</div>
			<?php } else {?>
				<div class="col-12 text-center">
					<img src="<?=base_url() ?>media/wishlist.webp">
				</div>
			<?php } ?>
		</div>
	</div>
	<!-- Page Content End -->
	
	
<?php include('include/bottom-menu.php'); ?>
	<!-- Menubar -->
	<?php include('include/multycolor.php'); ?>
	
</div>  
<?php include('include/allscript.php'); ?>