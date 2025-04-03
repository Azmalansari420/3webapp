<?php
$page_name = basename(current_url());
?>
<style>
	.menubar-area .active-menu {
	    background: linear-gradient(45deg, #ff6b6b, #f0f0f0) !important;
	    border-radius: 50px !important;
	    padding: 8px !important;
	}

	.menubar-area .active-menu > i {
	    color: #000 !important;
	    font-size:24px !important;
	}
</style>


</style>
<div class="menubar-area footer-fixed">
		<div class="toolbar-inner menubar-nav">
			<a href="refer.php" class="nav-link <?php if($page_name=='refer.php') echo 'active-menu'; ?>">
				<i class="fi fi-rr-users-medical"></i>
			</a>
			<a href="winner.php" class="nav-link <?php if($page_name=='winner.php') echo 'active-menu'; ?>">
				<i class="fi fi-rr-trophy-star"></i>
			</a>
			<a href="home.php" class="nav-link <?php if($page_name=='home.php') echo 'active-menu'; ?> ">
				<i class="fi fi-rr-home"></i>
			</a>
			<a href="wallet.php" class="nav-link <?php if($page_name=='wallet.php') echo 'active-menu'; ?>">
				<i class="fi fi-rr-wallet"></i>
			</a>
			<a href="profile.php" class="nav-link <?php if($page_name=='profile.php') echo 'active-menu'; ?>">
				<i class="fi fi-rr-user"></i>
			</a>
		</div>
	</div>