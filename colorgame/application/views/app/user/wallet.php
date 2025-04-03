<?php include('include/header.php'); ?>
	
	<header class="header header-fixed">
		<div class="header-content">
			<div class="left-content">
				<a href="javascript:void(0);" class="back-btn dz-icon icon-fill icon-sm">
					<i class="feather icon-chevron-left"></i>
				</a>
			</div>
			<div class="mid-content"><h5 class="title">Wallet</h5></div>
			<!-- <div class="right-content">
				<a href="javascript:void(0);" class="dz-icon icon-fill icon-sm">
					<i class="feather icon-map-pin"></i>
				</a>
			</div> -->
		</div>
	</header>
	
	<!-- Sidebar -->
    <?php include('include/sidebar.php'); ?>
    <!-- Sidebar End -->
	
	<!-- Main Content Start -->
	<main class="page-content space-top p-b30">
		<!-- ad slider here -->
		<div class="container overflow-hidden pt-0">
			<div class="top-bar-box">
				<div class="row">
					<div class="col-12">
						<div class="wallet-box text-center">
							<i class="fi fi-rr-wallet" style="font-size:25px;"></i>
							<p>₹ 0.00</p>
							<p>Total balance</p>
						</div>
					</div>					
				</div>
			</div>
			<div class="row">
				<div class="col-6 text-center">
					<div class="wallet-boxss">
						<p>₹ 0.00</p>
						<p>Main Balance</p>
					</div>
				</div>

				<div class="col-6 text-center">
					<div class="wallet-boxss">
						<p>₹ 0.00</p>
						<p>Bonus Balance</p>
					</div>
				</div>
			</div>

			<div class="profile-area mt-4">
				<div class="content-box">
					<ul class="row g-2">
						<li class="col-6">							
							<a href="deposite.php">Deposite</a>
						</li>
						<li class="col-6">							
							<a href="withdraw.php">Withdraw</a>
						</li>
						<li class="col-6">							
							<a href="deposite-history.php">Deposite History</a>
						</li>
						<li class="col-6">							
							<a href="withdraw-history.php">Withdraw History</a>
						</li>
					</ul>
				</div>
			</div>			


		</div>
	</main>
	<!-- Main Content End -->
	
	<!-- Menubar -->
	<?php include('include/menubar.php'); ?>
	<!-- Menubar -->
	
	
</div>  





<?php include('include/footer.php'); ?>
