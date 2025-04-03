<?php
$page_name = basename(current_url());
// print_r($full_detail);
?>
<div class="menubar-area footer-fixed rounded-0 border-top">
		<div class="toolbar-inner menubar-nav">
			
			<a href="category.php" class="nav-link <?php if($page_name=='category.php') echo 'active'; ?>">
				<i class="icon feather icon-grid"></i>
				<span>Categories</span>
			</a>
			<a href="wishlist.php" class="nav-link <?php if($page_name=='wishlist.php') echo 'active'; ?>">
				<i class="icon feather icon-heart"></i>
				<span>Wishlist</span>
			</a>
			<a href="home.php" class="nav-link <?php if($page_name=='home.php') echo 'active'; ?>">
				<i class="icon feather icon-home"></i>
				<span>Home</span>
			</a>
			<a href="cart.php" class="nav-link <?php if($page_name=='cart.php') echo 'active'; ?>">
				<i class="icon feather icon-shopping-cart"></i>
				<span>Cart</span>
			</a>
			<a href="profile.php" class="nav-link <?php if($page_name=='profile.php') echo 'active'; ?>">
				<i class="icon feather icon-user"></i>
				<span>Profile</span>
			</a>
		</div>
	</div>