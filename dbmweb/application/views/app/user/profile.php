<?php include('include/header.php'); ?>
	
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
						<h6 class="title">Profile </h6>
					</div>
					<div class="right-content">
						<a href="notification.php" class="search-icon">
							<i class="icon feather icon-bell"></i>
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
						<img src="<?=base_url() ?>media/uploads/users/<?=$full_detail->profile_image ?>" alt="profile-image">
					</div>
					<div class="profile-detail">
						<h6 class="name"><?=$full_detail->name ?></h6>
						<span class="font-12">ID <?=$full_detail->user_id ?></span>
					</div>
					<a href="edit-profile.php" class="edit-profile">
						<i class="icon feather icon-edit-2"></i>
					</a>
				</div>
				


				<div class="title-bar">
					<h6 class="title mb-0 font-w700">Account Settings</h6>
				</div>
				<div class="dz-list style-1">
					<ul>
						<li>
							<a href="change-password.php" class="item-content item-link">
								<div class="dz-icon">
									<i class="icon feather icon-user"></i>
								</div>
								<div class="dz-inner">
									<span class="title">Modify login password</span>
								</div>
							</a>
						</li>
						<li>
							<a href="change-payment-password.php" class="item-content item-link">
								<div class="dz-icon">
									<i class="icon feather icon-user"></i>
								</div>
								<div class="dz-inner">
									<span class="title">Modify payment password</span>
								</div>
							</a>
						</li>
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
							<a href="<?=base_url('api/auth/logout') ?>" class="item-content item-link">
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
	<?php include('include/footer-menu.php'); ?>
	<!-- Menubar -->
	
	
</div>  
<?php include('include/footer.php'); ?>