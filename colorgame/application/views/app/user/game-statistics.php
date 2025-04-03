<?php include('include/header.php'); ?>

	<header class="header header-fixed">
		<div class="header-content">
			<div class="left-content">
				<a href="javascript:void(0);" class="back-btn dz-icon icon-fill icon-sm">
					<i class="feather icon-chevron-left"></i>
				</a>
			</div>
			<div class="mid-content"><h5 class="title">Game  Statistics</h5></div>
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

	.nav-link-new{
		padding: 7px 15px!important;
	}
</style>
	<!-- Main Content Start -->
	<main class="page-content space-top p-b30">
		<!-- ad slider here -->
		<div class="container overflow-hidden pt-0">

			<div class="row " id="contentArea">
					<div class="col-12">
						<div class="card" style="background-color:#21232f;">
	                        <div class="card-body" style="padding: 0;">
								<div class="default-tab">
									<ul class="nav nav-tabs justify-content-center" role="tablist">
										<li class="nav-item" role="presentation">
											<a class="nav-link nav-link-new active" data-bs-toggle="tab" href="#home" aria-selected="true" role="tab"> Today</a>
										</li>
										<li class="nav-item" role="presentation">
											<a class="nav-link nav-link-new" data-bs-toggle="tab" href="#profile" aria-selected="false" role="tab" tabindex="-1">Yesterday</a>
										</li>

										<li class="nav-item" role="presentation">
											<a class="nav-link nav-link-new" data-bs-toggle="tab" href="#week" aria-selected="false" role="tab" tabindex="-1">This Week</a>
										</li>

										<li class="nav-item" role="presentation">
											<a class="nav-link nav-link-new" data-bs-toggle="tab" href="#month" aria-selected="false" role="tab" tabindex="-1">This Month</a>
										</li>
										
									</ul>
									<div class="tab-content">
										<div class="tab-pane fade active show" id="home" role="tabpanel">
											<div class="pt-1">
												<div class="view-cart mt-2">
													<ul>
														<li class="dz-total pt-2 mt-2">
															<span class="name font-18 font-w600">30 Sec</span>
															<h5 class="status">Win</h5>
														</li>
														
														<li>
															<span class="name">Play Game</span>
															<span class="about">₹ 200.00</span>
														</li>
														<li>
															<span class="name">2024/02/12 12:25:00</span>
														</li>			
													</ul>
												</div>
											</div>
											<div class="pt-1">
												<div class="view-cart mt-2">
													<ul>
														<li class="dz-total pt-2 mt-2">
															<span class="name font-18 font-w600">30 Sec</span>
															<h5 class="status">Win</h5>
														</li>
														
														<li>
															<span class="name">Play Game</span>
															<span class="about">₹ 200.00</span>
														</li>
														<li>
															<span class="name">2024/02/12 12:25:00</span>
														</li>			
													</ul>
												</div>
											</div>
											<div class="pt-1">
												<div class="view-cart mt-2">
													<ul>
														<li class="dz-total pt-2 mt-2">
															<span class="name font-18 font-w600">30 Sec</span>
															<h5 class="status">Win</h5>
														</li>
														
														<li>
															<span class="name">Play Game</span>
															<span class="about">₹ 200.00</span>
														</li>
														<li>
															<span class="name">2024/02/12 12:25:00</span>
														</li>			
													</ul>
												</div>
											</div>
										</div>
										<!-- yesterday -->
										<div class="tab-pane fade" id="profile" role="tabpanel">
											<div class="pt-1">
												<div class="view-cart mt-2">
													<ul>
														<li class="dz-total pt-2 mt-2">
															<span class="name font-18 font-w600">30 Sec</span>
															<h5 class="status">Win</h5>
														</li>
														
														<li>
															<span class="name">Play Game</span>
															<span class="about">₹ 200.00</span>
														</li>
														<li>
															<span class="name">2024/02/12 12:25:00</span>
														</li>			
													</ul>
												</div>
											</div>
										</div>
										<!-- week -->
										<div class="tab-pane fade" id="week" role="tabpanel">
											<div class="pt-1">
												<div class="view-cart mt-2">
													<ul>
														<li class="dz-total pt-2 mt-2">
															<span class="name font-18 font-w600">30 Sec</span>
															<h5 class="status">Win</h5>
														</li>
														
														<li>
															<span class="name">Play Game</span>
															<span class="about">₹ 200.00</span>
														</li>
														<li>
															<span class="name">2024/02/12 12:25:00</span>
														</li>			
													</ul>
												</div>
											</div>
										</div>
										<!-- month -->
										<div class="tab-pane fade" id="month" role="tabpanel">
											<div class="pt-1">
												<div class="view-cart mt-2">
													<ul>
														<li class="dz-total pt-2 mt-2">
															<span class="name font-18 font-w600">30 Sec</span>
															<h5 class="status">Win</h5>
														</li>
														
														<li>
															<span class="name">Play Game</span>
															<span class="about">₹ 200.00</span>
														</li>
														<li>
															<span class="name">2024/02/12 12:25:00</span>
														</li>			
													</ul>
												</div>
											</div>
										</div>
									
									</div>
								</div>
							</div>
						</div>
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
