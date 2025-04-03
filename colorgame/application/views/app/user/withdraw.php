<?php include('include/header.php'); ?>
	
	<header class="header header-fixed">
		<div class="header-content">
			<div class="left-content">
				<a href="javascript:void(0);" class="back-btn dz-icon icon-fill icon-sm">
					<i class="feather icon-chevron-left"></i>
				</a>
			</div>
			<div class="mid-content"><h5 class="title">Withdraw</h5></div>
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
		.dz-timeline.style-2 .timeline-item {
    padding-bottom: 5px;
}
	.swiper-slide.swiper-slide-active {
	    width: 100% !important;
	    
	}
	.payment-card
	{
		background-image: url(assets/card.png)!important;
	    border-radius: 14px;
	}
</style>
	<!-- Main Content Start -->
	<main class="page-content space-top p-b30">
		<!-- ad slider here -->
		<div class="container overflow-hidden pt-0">

			<div class="swiper payment-card-swiper" style="">
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
										Avaliable Balance
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
					<a href="#!" class="btn btn-lg btn-thin btn-info w-100" style="padding: 12px 30px;color: white;">Withdraw</a>
				</div>			
            </div>

            <div class="order-status m-t30">
				<ul class="dz-timeline style-2">

					<li class="timeline-item active">
						<div class="active-box">
							<p class="timeline-text">Need to bet <span class="red">₹ 0.00</span> to be able to withdraw</p>
						</div>
					</li>
					<li class="timeline-item active">
						<div class="active-box">
							<p class="timeline-text">Withdraw time <span class="red">00:00-23:59</span></p>
						</div>
					</li>
					<li class="timeline-item active">
						<div class="active-box">
							<p class="timeline-text">Inday Remaining Withdrawal Times <span class="red">3</span></p>
						</div>
					</li>

					<li class="timeline-item active">
						<div class="active-box">
							<p class="timeline-text">Withdrawal amount range <span  class="red">₹110.00 - ₹10,000,000.00</span></p>
						</div>
					</li>
					<li class="timeline-item active">
						<div class="active-box">
							<p class="timeline-text">Please confirm your beneficial account information before withdrawing. If your information is incorrect, our company will not be liable for the amount of loss.</p>
						</div>
					</li>

					<li class="timeline-item active">
						<div class="active-box">
							<p class="timeline-text">If your beneficial information is incorrect, please contact customer service.</p>
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
