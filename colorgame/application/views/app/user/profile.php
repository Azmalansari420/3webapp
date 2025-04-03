<?php include('include/header.php'); ?>

	<header class="header header-fixed">
		<div class="header-content">
			<div class="left-content">
				<a href="javascript:void(0);" class="back-btn dz-icon icon-fill icon-sm">
					<i class="feather icon-chevron-left"></i>
				</a>
			</div>
			<div class="mid-content"><h5 class="title">Profile</h5></div>
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
	<style>
	
	.view-cart ul {
	    display: flex;
	    flex-direction: column;
	    gap: 5px;
	}
</style>
	<!-- Main Content Start -->
	<main class="page-content space-top p-b40">
		<div class="container">
			<div class="profile-area">
				<div class="main-profile">
					<div class="media">
						<div class="media-40 me-2 user-image">
							<img src="assets/images/avatar/1.png" alt="profile-image">
						</div>
						<h4 class="name mb-0"> 
							<b class="font-w600">Amelia</b><br>
							<b class="font-w600">UID | 2021452</b>
						</h4>
					</div>
				</div>

				<div class="content-box" style="margin-bottom: 5px;">
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
					<ul class="row g-2">
						<li class="col-4">							
							<a href="wallet.php">Wallet</a>
						</li>
						<li class="col-4">							
							<a href="deposite.php">Deposite</a>
						</li>
						<li class="col-4">							
							<a href="withdraw.php">Withdraw</a>
						</li>
					</ul>
				</div>

				<div class="dz-list style-1 m-b20">
					<ul>
						<li>
							<a href="login-history.php" class="item-content item-link">
								<div class="list-icon">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M19.7695 11.6453C19.039 10.7923 18.7071 10.0531 18.7071 8.79716V8.37013C18.7071 6.73354 18.3304 5.67907 17.5115 4.62459C16.2493 2.98699 14.1244 2 12.0442 2H11.9558C9.91935 2 7.86106 2.94167 6.577 4.5128C5.71333 5.58842 5.29293 6.68822 5.29293 8.37013V8.79716C5.29293 10.0531 4.98284 10.7923 4.23049 11.6453C3.67691 12.2738 3.5 13.0815 3.5 13.9557C3.5 14.8309 3.78723 15.6598 4.36367 16.3336C5.11602 17.1413 6.17846 17.6569 7.26375 17.7466C8.83505 17.9258 10.4063 17.9933 12.0005 17.9933C13.5937 17.9933 15.165 17.8805 16.7372 17.7466C17.8215 17.6569 18.884 17.1413 19.6363 16.3336C20.2118 15.6598 20.5 14.8309 20.5 13.9557C20.5 13.0815 20.3231 12.2738 19.7695 11.6453Z" fill="black"/>
										<path opacity="0.4" d="M14.0086 19.2283C13.5087 19.1215 10.4625 19.1215 9.96263 19.2283C9.53527 19.327 9.07312 19.5566 9.07312 20.0602C9.09797 20.5406 9.37923 20.9646 9.76882 21.2335L9.76783 21.2345C10.2717 21.6273 10.8631 21.877 11.4822 21.9667C11.8122 22.012 12.1481 22.01 12.49 21.9667C13.1082 21.877 13.6995 21.6273 14.2034 21.2345L14.2024 21.2335C14.592 20.9646 14.8733 20.5406 14.8981 20.0602C14.8981 19.5566 14.436 19.327 14.0086 19.2283Z" fill="black"/>
									</svg>
								</div>
								<div class="dz-inner me-2">
									<span class="title">Login History</span>
								</div>
							</a>
						</li>

						<li>
							<a href="game-statistics.php" class="item-content item-link">
								<div class="list-icon">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M21.9964 8.37513H17.7618C15.7911 8.37859 14.1947 9.93514 14.1911 11.8566C14.1884 13.7823 15.7867 15.3458 17.7618 15.3484H22V15.6543C22 19.0136 19.9636 21 16.5173 21H7.48356C4.03644 21 2 19.0136 2 15.6543V8.33786C2 4.97862 4.03644 3 7.48356 3H16.5138C19.96 3 21.9964 4.97862 21.9964 8.33786V8.37513ZM6.73956 8.36733H12.3796H12.3831H12.3902C12.8124 8.36559 13.1538 8.03019 13.152 7.61765C13.1502 7.20598 12.8053 6.87318 12.3831 6.87491H6.73956C6.32 6.87664 5.97956 7.20858 5.97778 7.61852C5.976 8.03019 6.31733 8.36559 6.73956 8.36733Z" fill="black"/>
										<path opacity="0.4" d="M16.0374 12.2966C16.2465 13.2478 17.0805 13.917 18.0326 13.8996H21.2825C21.6787 13.8996 22 13.5715 22 13.166V10.6344C21.9991 10.2297 21.6787 9.90077 21.2825 9.8999H17.9561C16.8731 9.90338 15.9983 10.8024 16 11.9102C16 12.0398 16.0128 12.1695 16.0374 12.2966Z" fill="black"/>
										<circle cx="18" cy="11.8999" r="1" fill="black"/>
									</svg>
								</div>
								<div class="dz-inner">
									<span class="title">Game  Statistics</span>
								</div>
							</a>
						</li>						
					</ul>
				</div>

				<div class="title-bar">
					<h4 class="title mb-0 font-w500">Service Center</h4>
				</div>

				<div class="content-box" style="margin-bottom: 5px;">
					<ul class="row g-2 justify-content-center">
						<li class="col-4">							
							<a href="feedback.php">Feedback</a>
						</li>
						<li class="col-4">							
							<a href="notification.php">Notification</a>
						</li>
						<li class="col-4">							
							<a href="" style="font-size: 14px;padding: 13px 4px;">Customer Service</a>
						</li>
						<li class="col-4">							
							<a href="" style="font-size: 14px;padding: 13px 4px;">Beginner's Guide</a>
						</li>
						<li class="col-4">							
							<a href="">About Us</a>
						</li>
					</ul>
				</div>

				<div class="title-bar mt-3">
					<h4 class="title mb-0 font-w500">Profile Setting</h4>
				</div>
				<div class="dz-list style-1 m-b20">
					<ul>
						<li>
							<a href="edit-profile.php" class="item-content item-link">
								<div class="list-icon">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M11.9968 15.1746C7.68376 15.1746 3.99976 15.8546 3.99976 18.5746C3.99976 21.2956 7.66076 21.9996 11.9968 21.9996C16.3098 21.9996 19.9938 21.3206 19.9938 18.5996C19.9938 15.8786 16.3338 15.1746 11.9968 15.1746Z" fill="black"/>
										<path opacity="0.4" d="M11.9967 12.5838C14.9347 12.5838 17.2887 10.2288 17.2887 7.29176C17.2887 4.35476 14.9347 1.99976 11.9967 1.99976C9.05971 1.99976 6.70471 4.35476 6.70471 7.29176C6.70471 10.2288 9.05971 12.5838 11.9967 12.5838Z" fill="black"/>
									</svg>
								</div>
								<div class="dz-inner">
									<span class="title">Edit Profile</span>
								</div>
							</a>
						</li>
						<li>
							<a href="payment.html" class="item-content item-link">
								<div class="list-icon">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M21.9964 8.37513H17.7618C15.7911 8.37859 14.1947 9.93514 14.1911 11.8566C14.1884 13.7823 15.7867 15.3458 17.7618 15.3484H22V15.6543C22 19.0136 19.9636 21 16.5173 21H7.48356C4.03644 21 2 19.0136 2 15.6543V8.33786C2 4.97862 4.03644 3 7.48356 3H16.5138C19.96 3 21.9964 4.97862 21.9964 8.33786V8.37513ZM6.73956 8.36733H12.3796H12.3831H12.3902C12.8124 8.36559 13.1538 8.03019 13.152 7.61765C13.1502 7.20598 12.8053 6.87318 12.3831 6.87491H6.73956C6.32 6.87664 5.97956 7.20858 5.97778 7.61852C5.976 8.03019 6.31733 8.36559 6.73956 8.36733Z" fill="black"/>
										<path opacity="0.4" d="M16.0374 12.2966C16.2465 13.2478 17.0805 13.917 18.0326 13.8996H21.2825C21.6787 13.8996 22 13.5715 22 13.166V10.6344C21.9991 10.2297 21.6787 9.90077 21.2825 9.8999H17.9561C16.8731 9.90338 15.9983 10.8024 16 11.9102C16 12.0398 16.0128 12.1695 16.0374 12.2966Z" fill="black"/>
										<circle cx="18" cy="11.8999" r="1" fill="black"/>
									</svg>
								</div>
								<div class="dz-inner">
									<span class="title">Update Password</span>
								</div>
							</a>
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
