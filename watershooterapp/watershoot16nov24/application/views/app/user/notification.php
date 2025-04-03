<?php include('include/header.php'); ?>

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
	
	<!-- Sidebar -->
    <?php include('include/sidebar.php'); ?>
    <!-- Sidebar End -->
	
	<div class="page-content space-top p-b50">
		<div class="container">
			<div class="title-bar mt-0">
				 <h6 class="title mb-0">Notification</h6>
			</div>
			<div class="dz-notification">
				<ul class="notification-list">
					<?php
					$this->db->order_by('id desc');
					$notification = $this->crud->selectDataByMultipleWhere('notification',array('status'=>1,));
					foreach($notification as $data)
						{ ?>
					<li class="list-items fill-color">
						<div class="list-content">
							<h5 class="title-head"><?=$data->title ?></h5>
							<p><?=$data->content ?></p>
						</div>
						<span class="time"><i class="icon feather icon-clock"></i> <?=date('d/m/Y',strtotime($data->addeddate)) ?></span>
					</li>
				<?php } ?>
				
				</ul>	
			</div>

		</div>
	</div>
	
	<!-- Menubar -->
	
<?php include('include/menu-bar.php'); ?>

	<!-- Menubar -->
	<!-- PWA Offcanvas -->
	<!-- <div class="offcanvas offcanvas-bottom pwa-offcanvas">
		<div class="container">
			<div class="offcanvas-body small">
				<img class="logo dark" src="assets/images/logo.png" alt="">
				<img class="logo light" src="assets/images/logo-white.png" alt="">
				<h5 class="title">Wedo - Ecommerce Mobile App Template ( Bootstrap + PWA )</h5>
				<p class="pwa-text">Install "Wedo Ecommerce Mobile App" template to your home screen for easy access, just like any other app</p>
				<button type="button" class="btn btn-sm btn-primary pwa-btn">Add to Home Screen</button>
				<button type="button" class="btn btn-sm pwa-close btn-secondary ms-2 text-white">Maybe later</button>
			</div>
		</div>
	</div>
	<div class="offcanvas-backdrop pwa-backdrop"></div> -->
	<!-- PWA Offcanvas End --> 
	
	
	<!-- Multicolor Canvas Start --> 
<?php include('include/theam-color.php'); ?>
	
	<!-- Multicolor Canvas Start --> 
	
</div>  
<?php include('include/footer.php'); ?>

