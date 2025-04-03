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
						<h6 class="title font-14">Profile</h6>
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
	<div class="page-content space-top">
		<div class="container">
			<div class="profile-area">
				<div class="main-profile">
					<div class="media media-60 me-3 rounded-circle">
						<img src="<?=base_url() ?>media/uploads/users/<?=$full_detail->profile_image ?>" alt="image" onerror="this.src='<?=base_url() ?>assets/images/user-profile.jpg'">
					</div>
					<div class="profile-detail">
						<h6 class="name"><?=$full_detail->name ?></h6>
						<span class="font-12">ID <?=$full_detail->user_id ?></span>
					</div>
					<a href="edit-profile.php" class="edit-profile">
						<i class="icon feather icon-edit-2"></i>
					</a>
				</div>
				<div class="content-box">
					<ul class="row g-2">
						<li class="col-6">							
							<a href="order.php">
								<div class="dz-icon-box">
									<i class="icon feather icon-package"></i>
								</div>
								<span>Order</span>
							</a>
						</li>
						<li class="col-6">							
							<a href="wishlist.php">
								<div class="dz-icon-box">
									<i class="icon feather icon-heart"></i>
								</div>
								<span>Wishlist</span>
							</a>
						</li>
						<li class="col-6">							
							<a href="coupon.php">
								<div class="dz-icon-box">
									<i class="icon feather icon-gift"></i>
								</div>
								<span>Coupons</span>
							</a>
						</li>
						<li class="col-6">							
							<a href="help.php">
								<div class="dz-icon-box">
									<i class="icon feather icon-headphones"></i>
								</div>
								<span>Help Center</span>
							</a>
						</li>
					</ul>
				</div>
				<div class="title-bar">
					<h6 class="title mb-0">Account Settings</h6>
				</div>
				<div class="dz-list style-1">
					<ul>
						<li>
							<a href="edit-profile.php" class="item-content item-link">
								<div class="dz-icon">
									<i class="icon feather icon-user"></i>
								</div>
								<div class="dz-inner">
									<span class="title">Edit Profile</span>
								</div>
							</a>
						</li>
						<li>
							<a href="change-password.php" class="item-content item-link">
								<div class="dz-icon">
									<i class="icon feather icon-lock"></i>
								</div>
								<div class="dz-inner">
									<span class="title">Change Password</span>
								</div>
							</a>
						</li>
						<li>
							<a href="notification.php" class="item-content item-link">
								<div class="dz-icon">
									<i class="icon feather icon-bell"></i>
								</div>
								<div class="dz-inner me-2">
									<span class="title">Notification</span>
								</div>
								<!-- <div class="badge badge-primary">5</div> -->
							</a>
						</li>
						<li>
							<a href="<?=base_url('api/user/logout') ?>" class="item-content item-link">
								<div class="dz-icon">
									<i class="icon feather icon-log-out"></i>
								</div>
								<div class="dz-inner">
									<span class="title">Log Out</span>
								</div>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Page Content End -->
	
	<!-- Menubar -->
	<?php include('include/bottom-menu.php'); ?>
	<!-- Menubar -->
	<?php include('include/multycolor.php'); ?>
	
	
</div>  
<?php include('include/allscript.php'); ?>