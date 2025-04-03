<?php include('include/header.php'); ?>

<style>
	.mark-read {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
            color: #333;
            cursor: pointer;
        }
        .mark-read input[type="radio"] {
            accent-color: #ff5722;
            cursor: pointer;
        }
</style>
	<!-- Header -->
		<header class="header shadow header-fixed border-0">
			<div class="container">
				<div class="header-content">
					<div class="left-content">
						<a href="javascript:void(0);" class="menu-toggler">
							<i class="icon feather icon-menu"></i>
						</a>
					</div>
					<div class="mid-content">
						<h6 class="title">Notifications </h6>
					</div>
					<div class="right-content">
						<a href="notification.php" class="search-icon">
							<i class="icon feather icon-bell"></i>
						</a>
					</div>
				</div>
			</div>
		</header>
	<!-- Header -->
	
	<!-- Sidebar -->
	<?php include('include/sidebar.php'); ?>
    <!-- Sidebar End -->
	
	<!-- Page Content Start -->
	<div class="page-content space-top p-b80">
		<div class="container">

				<div class="dz-offer-coupon justify-content-between">
					
					<div class="offer-content">
						<span>Title</span><br>
						<p>On minimum purchase of Rs. 1,999</p>
						<span>25/10/2025</span>
					</div>	

					<div class="form-check form-switch">
					  <input class="form-check-input form-check-success" id="successSwitch" type="checkbox" checked="">
					</div>
				</div>


				<div class="dz-offer-coupon justify-content-between">
					<div class="offer">
						<h6>20%</h6>
						<span>Off</span>
					</div>
						
				</div>

				
			</div>
	</div>
	<!-- Page Content End -->
	
	<!-- Menubar -->
	<?php include('include/footer-menu.php'); ?>
	
	
</div>  


<?php include('include/footer.php'); ?>
