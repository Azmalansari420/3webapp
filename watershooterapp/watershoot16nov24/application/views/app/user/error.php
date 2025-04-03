<?php
$user = getuserdata();
include('include/header.php'); ?>
<div class="page-wrapper">
    
	<!-- Preloader -->
	<div id="preloader">
		<div class="loader">
			<div class="load-circle"><div></div><div></div></div>
		</div>
	</div>
    <!-- Preloader end-->
	
	<!-- Header -->
		<header class="header header-fixed">
			<div class="container">
				<div class="header-content">
					<div class="left-content">
						<a href="javascript:void(0);" class="back-btn">
							<i class="icon feather icon-chevron-left"></i>
						</a>
						<h6 class="title">Not Found</h6>
					</div>
					<div class="mid-content">
					</div>
					<div class="right-content">
					</div>
				</div>
			</div>
		</header>
	<!-- Header -->
	
	<!-- Page Content Start -->
	<div class="page-content space-top">
		<div class="container">
			<div class="error-page">
				<div class="icon-bx">
					<img src="assets/images/error2.svg" alt="">
				</div>
				<div class="clearfix">
					<h2 class="title text-primary">Sorry</h2>
					<p>Requested content not found.</p>
				</div>
			</div>
			<div class="error-img">
				<img src="assets/images/error.png" alt="">
			</div>
		</div>
	</div>
<?php include('include/menu-bar.php'); ?>
	
<?php include('include/theam-color.php'); ?>

</div>  
<?php include('include/footer.php'); ?>
