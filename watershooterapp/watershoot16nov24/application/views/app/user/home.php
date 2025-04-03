<?php
$user = getuserdata();
include('include/header.php'); ?>

 <style>
 	.category-area {
	    padding-top: 100px;
	}
	a.btn.mb-3.btn-primary.w-100 {
    font-size: 24px;
}
 </style>
<body>
<div class="page-wrapper">
    
	<!-- Preloader -->
		<!-- <?php include('include/loader.php'); ?> -->

    <!-- Preloader end-->
	
	<!-- Header -->
		<header class="header header-fixed">
			<div class="container">
				<div class="header-content">
					<div class="left-content">
						<a href="javascript:void(0);" class="menu-toggler">
							<i class="icon feather icon-menu"></i>
						</a>
						<h6 class="title font-14">Home</h6>
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
	
	<!-- Sidebar -->
    <?php include('include/sidebar.php'); ?>
    <?php
    if($user[0]->role==1)
    	{ ?>
	<div class="page-content space-top p-b65">
		<div class="container py-0">

<style type="text/css">
	.highbox {
		  background-color: #f9f9f9; 
		  border:1px solid #283890;
		  border-radius: 8px; 
		  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
		  padding: 20px; 
		  margin: 20px auto;
		  max-width: 400px; 
		  font-family: Arial, sans-serif; 
		  color: #333; 
		  margin-top: 55px;
		}

		.highbox p {
		    margin: 3px 0;
		    font-size: 14px;
		    font-weight: 600;
		    color: black;
		}
		.category-area {
		    padding-top: 15px;
		}
</style>

			<div class="highbox">
				<p>Name:- <?=$user[0]->client_name ?></p>
				<p>location:- <?=$user[0]->location ?></p>
				<p>Capacity:- <?=$user[0]->plant_capacity ?></p>
				<p>Oprater:- <?=opratername($user[0]->opratername) ?></p>
			</div>



			<div class="category-area">
				<ul class="row g-3">
					<li class="category-item col-12">
						<a href="stp-page.php" class="btn mb-3 btn-primary w-100">STP</a>
					</li>
					<li class="category-item col-12">
						<a href="etp-page.php" class="btn mb-3 btn-primary w-100">ETP</a>
					</li>
					<li class="category-item col-12">
						<a href="wtp-page.php" class="btn mb-3 btn-primary w-100">WTP</a>
					</li>
					<!-- <li class="category-item col-12">
						<a href="stp-page.php?type=4" class="btn mb-3 btn-primary w-100">Other</a>
					</li> -->
					
				</ul>
			</div>			
		</div>
	</div>
	<?php } ?>

	<!-- for client -->
	<?php
    if($user[0]->role==2)
    	{ ?>
	<div class="page-content space-top p-b65">
		<div class="container py-0">
			<div class="category-area">
				<ul class="row g-3">
					<li class="category-item col-12">
						<a href="client-stp-page.php?type=1" class="btn mb-3 btn-primary w-100">STP</a>
					</li>
					<li class="category-item col-12">
						<a href="client-stp-page.php?type=2" class="btn mb-3 btn-primary w-100">ETP</a>
					</li>
					<li class="category-item col-12">
						<a href="client-stp-page.php?type=3" class="btn mb-3 btn-primary w-100">WTP</a>
					</li>
					<!-- <li class="category-item col-12">
						<a href="client-stp-page.php?type=4" class="btn mb-3 btn-primary w-100">Other</a>
					</li> -->
					
				</ul>
			</div>			
		</div>
	</div>
	<?php } ?>













<?php include('include/menu-bar.php'); ?>


	
	
	<!-- Multicolor Canvas Start --> 
<?php include('include/theam-color.php'); ?>
	
	<!-- Multicolor Canvas Start --> 
	
</div>  
<?php include('include/footer.php'); ?>

