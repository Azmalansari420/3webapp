 <?php
$current_url = basename(current_url());
?>
<div class="dark-overlay"></div>
	<div class="sidebar" style="background-image: url('assets/images/background/bg3.png');">
		<a href="profile.html" class="author-box">
			<div class="dz-media">
				<img src="<?=base_url() ?>media/uploads/users/<?=$full_detail->profile_image ?>" alt="author-image">
			</div>
			<div class="dz-info">
				<h5 class="name"><?=$full_detail->name ?></h5>
				<span><?=currency_simble($full_detail->wallet) ?></span>
			</div>
		</a>
		<ul class="nav navbar-nav">	
			<li>
				<a class="nav-link <?php if($current_url=='home.php') echo "active"; ?>" href="home.php">
					<span class="dz-icon">
						<i class="fa fa-home"></i>
					</span>
					<span>Home</span>
				</a>
			</li>
			<li>
				<a class="nav-link <?php if($current_url=='product.php') echo "active"; ?>" href="product.php">
					<span class="dz-icon">
						<i class="fa fa-box"></i>
					</span>
					<span>Products</span>
				</a>
			</li>
			<li>
				<a class="nav-link <?php if($current_url=='blog.php') echo "active"; ?>" href="blog.php">
					<span class="dz-icon">
						<i class="fa fa-newspaper"></i>
					</span>
					<span>News</span>
				</a>
			</li>
			<li>
				<a class="nav-link <?php if($current_url=='recharge.php') echo "active"; ?>" href="recharge.php">
					<span class="dz-icon">
						<i class="fa fa-wallet"></i>
					</span>
					<span>Recharge</span>
				</a>
			</li>
			<li>
				<a class="nav-link <?php if($current_url=='withdraw.php') echo "active"; ?>" href="withdraw.php">
					<span class="dz-icon">
						<i class="fa fa-hand-holding-usd"></i>
					</span>
					<span>Withdraw</span>
				</a>
			</li>
			<li>
				<a class="nav-link <?php if($current_url=='funding.php') echo "active"; ?>" href="funding.php">
					<span class="dz-icon">
						<i class="fas fa-chart-line"></i>
					</span>
					<span>Funding</span>
				</a>
			</li>
			<li>
				<a class="nav-link <?php if($current_url=='reward.php') echo "active"; ?>" href="reward.php">
					<span class="dz-icon">
						<i class="fas fa-gift"></i>
					</span>
					<span>Reward</span>
				</a>
			</li>
			<li>
				<a class="nav-link <?php if($current_url=='invitation.php') echo "active"; ?>" href="invitation.php">
					<span class="dz-icon">
						<i class="fas fa-user-friends"></i>
					</span>
					<span>Invitation</span>
				</a>
			</li>
			<li>
				<a class="nav-link" href="#!">
					<span class="dz-icon">
						<i class="fas fa-download"></i>
					</span>
					<span>APP</span>
				</a>
			</li>
			<li>
				<a class="nav-link <?php if($current_url=='profile.php') echo "active"; ?>" href="profile.php">
					<span class="dz-icon">
						<i class="fas fa-user"></i>
					</span>
					<span>Profile</span>
				</a>
			</li>
			<li>
				<a class="nav-link <?php if($current_url=='help.php') echo "active"; ?>" href="help.php">
					<span class="dz-icon">
						<i class="fas fa-headset"></i>
					</span>
					<span>Help Center</span>
				</a>
			</li>
			<li>
				<a class="nav-link " href="<?=base_url('api/auth/logout') ?>">
					<span class="dz-icon">
						<i class="fas fa-sign-out"></i>
					</span>
					<span>Logout</span>
				</a>
			</li>
		</ul>
		<div class="sidebar-bottom">
			<div class="app-info" style="background: black;">
				<h6 class="name"><?=website_name ?></h6>
				<span class="ver-info">App Version 1.0</span>
			</div>
        </div>
    </div>