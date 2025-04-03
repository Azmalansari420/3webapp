<?php
$about = $this->crud->fetchdatabyid('3','site_setting');
include('include/header.php'); ?>

 
<body>
<div class="page-wrapper">
    
	<!-- Preloader -->
			<?php include('include/loader.php'); ?>

    <!-- Preloader end-->
	
	<!-- Header -->
		<header class="header header-fixed">
			<div class="container">
				<div class="header-content">
					<div class="left-content">
						<a href="javascript:void(0);" class="menu-toggler">
							<i class="icon feather icon-menu"></i>
						</a>
						<!-- <h6 class="title font-14">Home</h6> -->
					</div>
					<div class="mid-content header-logo">
					</div>
					<div class="right-content dz-meta">
						
						<a href="#!" class="icon shopping-cart">
							<i class="icon feather icon-settings"></i>
						</a>
					</div>
				</div>
			</div>
		</header>
	<!-- Header -->
	
	 <?php include('include/sidebar.php'); ?>
	 
	<!-- Page Content Start -->
	<div class="page-content space-top p-b80">
		<div class="container">
			<div class="dz-product-detail">
				<div class="detail-content">
					<h6>Term & Condition</h6>
					<?=$about[0]->content ?>
				</div>
			</div>
		</div>
	</div>
	<!-- Page Content End -->
<?php include('include/menu-bar.php'); ?>

</div>  
<?php include('include/footer.php'); ?>
