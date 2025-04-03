<?php 

include('include/allcss.php'); ?>
	
	<!-- Header -->
	<header class="header header-fixed">
			<div class="container">
				<div class="header-content">
					<div class="left-content">
						<a href="javascript:void(0);" class="menu-toggler">
							<i class="icon feather icon-menu"></i>
						</a>
						<h6 class="title font-14">Not Found</h6>
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
						
					</div>
				</div>
			</div>
		</header>



	
	<!-- Page Content Start -->
	<div class="page-content space-top">
		<div class="container">
			<div class="error-page">
				<div class="icon-bx">
					<img src="<?=base_url() ?>assets/images/error2.svg" alt="">
				</div>
				<div class="clearfix">
					<h2 class="title text-primary">Sorry</h2>
					<p>Requested content not found.</p>
				</div>
			</div>
			<div class="error-img">
				<img src="<?=base_url() ?>assets/images/error.png" alt="">
			</div>
		</div>
	</div>
	<!-- Page Content End -->

</div>  
<?php include('include/allscript.php'); ?>