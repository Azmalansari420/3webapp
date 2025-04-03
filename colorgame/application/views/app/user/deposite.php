<?php include('include/header.php'); ?>
	
	<header class="header header-fixed">
		<div class="header-content">
			<div class="left-content">
				<a href="javascript:void(0);" class="back-btn dz-icon icon-fill icon-sm">
					<i class="feather icon-chevron-left"></i>
				</a>
			</div>
			<div class="mid-content"><h5 class="title">Deposit</h5></div>
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
	.swiper-slide.swiper-slide-active {
	    width: 100% !important;
	}
</style>
	<!-- Main Content Start -->
	<main class="page-content space-top p-b30">
		<!-- ad slider here -->
		<div class="container overflow-hidden pt-0">

			<div class="swiper payment-card-swiper">
				<div class="swiper-wrapper">
					<div class="swiper-slide" >
						<div class="payment-card">
							<div class="card-content">
								<div class="card-info">
									<h5 class="card-title">
										<span class="activity">
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
												<circle cx="10" cy="10" r="9.5" stroke="white"/>
												<circle cx="10.0003" cy="10.0001" r="5.83333" fill="white"/>
												<circle cx="10.0003" cy="10.0001" r="5.83333" stroke="white"/>
											</svg>
										</span>
										Balance
									</h5>
								</div>
								<h3 class="card-number">₹ 0.00</h3>
								<div class="bottom-info">
									<h6 class="holder-name">**** **** ****</h6>
								</div>
							</div>
						</div>
					</div>					
				</div>
			</div>


			<div class="edit-profile">
				<div class="m-b10 input-group input-group-icon style-2 input-lg">
					<div class="input-group-text style-1">
						<span class="input-icon" style="color: white;font-size: 20px;">₹</span>
					</div>
					<div class="dz-input-animate focused">
						<label class="form-label" for="name">Enter Amount</label>
						<input type="text" id="bet-amount" class="form-control style-1" value="10">
					</div>
				</div>

				<div class="col-12 mt-3">
					<div style="display: flex;justify-content: space-evenly;width: 100%;">
						<span class="amt-block setText select-amount selected" data-amt="10">10</span>
						<span class="amt-block setText select-amount" data-amt="50">50</span>
						<span class="amt-block setText select-amount" data-amt="100">100</span>
						<span class="amt-block setText select-amount" data-amt="200">200</span>
						<span class="amt-block setText select-amount" data-amt="500">500</span>
						<span class="amt-block setText select-amount" data-amt="1000">1000</span>
						<span class="amt-block setText select-amount" data-amt="10000">10000</span>
					</div>
				</div>
				<div class="col-12 mt-3">
					<a href="#!" class="btn btn-lg btn-thin btn-primary w-100" style="padding: 12px 30px;">Deposite</a>
				</div>			
            </div>

            <div class="order-status m-t30">
				<h5 class="title mb-1">Recharge instructions</h5>
				<ul class="dz-timeline style-2">

					<li class="timeline-item active">
						<div class="active-box">
							<p class="timeline-text">If the transfer time is up, please fill out the deposit form again.</p>
						</div>
					</li>
					<li class="timeline-item active">
						<div class="active-box">
							<p class="timeline-text">The transfer amount must match the order you created, otherwise the money cannot be credited successfully.</p>
						</div>
					</li>
					<li class="timeline-item active">
						<div class="active-box">
							<p class="timeline-text">If you transfer the wrong amount, our company will not be responsible for the lost amount!</p>
						</div>
					</li>
					<li class="timeline-item active">
						<div class="active-box">
							<p class="timeline-text">Note: do not cancel the deposit order after the money has been transferred.</p>
						</div>
					</li>

					
				</ul>		
			</div>




		</div>
	</main>
	<!-- Main Content End -->
	
	<!-- Menubar -->
	<?php include('include/menubar.php'); ?>
	<!-- Menubar -->
	
	
</div>  





<?php include('include/footer.php'); ?>
