<?php
$page_name = basename(current_url());
// print_r($full_detail);
?>
<div class="menubar-area footer-fixed rounded-0 border-top">
		<div class="toolbar-inner menubar-nav">
			<a href="home.php" class="nav-link <?php if($page_name=='home.php') echo 'active'; ?>">
				<i class="icon feather icon-home"></i>
				<span>Home</span>
			</a>
			<a href="javascript:;" class="nav-link <?php if($page_name=='category.php') echo 'active'; ?>">
				<i class="icon feather icon-heart"></i>
				<span>Click</span>
			</a>
			<a href="notification.php" class="nav-link <?php if($page_name=='notification.php') echo 'active'; ?>">
				<i class="icon feather icon-bell"></i>
				<span>Notification</span>
			</a>
			<a href="edit-profile.php" class="nav-link <?php if($page_name=='edit-profile.php') echo 'active'; ?>">
				<i class="icon feather icon-user"></i>
				<span>Profile</span>
			</a>
		</div>
	</div>