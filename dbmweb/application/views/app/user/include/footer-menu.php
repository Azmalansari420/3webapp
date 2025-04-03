 <?php
$current_url = basename(current_url());
?>
<div class="menubar-area footer-fixed rounded-0">
		<div class="toolbar-inner menubar-nav">
			<a href="#!" class="nav-link <?php if($current_url=='menu-bar.php') echo "active"; ?>">
				<i class="icon feather icon-grid"></i>
				<span>My Teams</span>
			</a>

			<a href="product.php" class="nav-link <?php if($current_url=='product.php') echo "active"; ?>">
				<i class="fa fa-box"></i>
				<span>Product</span>
			</a>
			
			
			<a href="home.php" class="nav-link <?php if($current_url=='home.php') echo "active"; ?>">
				<i class="icon feather icon-home"></i>
				<span>Home</span>
			</a>
			
			<a href="invitation.php" class="nav-link <?php if($current_url=='invitation.php') echo "active"; ?>">
				<i class="fas fa-user-friends"></i>
				<span>Invitation</span>
			</a>
			<a href="profile.php" class="nav-link <?php if($current_url=='profile.php') echo "active"; ?>">
				<i class="icon feather icon-user"></i>
				<span>Profile</span>
			</a>
		</div>
	</div>