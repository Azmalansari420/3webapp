<?php 
$count_cart = count_cart();
include('include/allcss.php'); ?>
	
	<!-- Header -->
	<header class="header header-fixed">
			<div class="container">
				<div class="header-content">
					<div class="left-content">
						<a href="javascript:void(0);" class="menu-toggler">
							<i class="icon feather icon-menu"></i>
						</a>
						<h6 class="title font-14">Help Center</h6>
					</div>
					<div class="mid-content header-logo">
					</div>
					<div class="right-content dz-meta">
						<a href="search.php" class="icon">
							<i class="icon feather icon-search"></i>
						</a>
						<a href="wishlist.php" class="icon">
							<i class="icon feather icon-heart"></i>
						</a>
						<a href="cart.php" class="icon shopping-cart">
							<i class="icon feather icon-shopping-cart"></i>
							<span class="badge badge-primary"><?=$count_cart ?></span>
						</a>
					</div>
				</div>
			</div>
		</header>

		
	  <?php include('include/sidebar.php'); ?>
	<!-- Page Content Start -->
	<div class="page-content space-top" style="padding-bottom: 56px;">
		<div class="container">
			<div class="about-help">
				<div class="media media-50 me-3">
					<img src="<?=base_url() ?>assets/images/service.svg" alt="">
				</div>
				<p>Get quick customer support by seclect your item.<p>
			</div>
			<div class="faq-box">
				<h6 class="title font-w500 mb-3 px-3">What issue are you facing?</h6>	
				<div class="accordion dz-accordion style-2" id="accordionExample">
					<div class="accordion-item">
						<h2 class="accordion-header" id="headingOne">
							<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								How can I contact customer support?
							</button>
						</h2>
						<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								<p>If your order has not yet shipped, you can contact us to change your shipping address. If your order has already shipped, we may not be able to change the address.</p>
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header" id="headingTwo">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								How Do I Track My Order?
							</button>
						</h2>
						<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								<p>You can track your order by clicking on "Track Order" or a similar option on the website. This will provide real-time updates on your order status and shipping.</p>
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header" id="headingThree">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								Can I Cancel or Modify My Order?
							</button>
						</h2>
						<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
							<div class="accordion-body pt-0">
								<p>Depending on the order status and our cancellation policy, you may be able to cancel or modify your order. Contact our customer support for assistance.</p>
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header" id="headingFive">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
								Do you offer gift wrapping?
							</button>
						</h2>
						<div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
							<div class="accordion-body pt-0">
								<p>Yes, we offer gift wrapping for an additional fee. You can select this option during checkout.</p>
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header" id="headingFour">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
								What Is Your Return and Refund Policy?
							</button>
						</h2>
						<div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								<p>Our return and refund policy can be found in the website's "Terms and Conditions" or "Return Policy" section. Please review it for details..</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<h6 class="title border-bottom pb-2 mb-3 text-center">Or</h6>
			<div class="row g-3">
				<div class="col-12">
					<a href="contact.php">
						<div class="card faq-card-box">
							<img src="<?=base_url() ?>assets/images/help/service1.png" class="card-img-top" alt="...">
							<div class="card-body border-top">
								<h5 class="card-title font-12">24X7 Customer Support</h5>
							</div>
						</div>
					</a>
				</div>
				<!-- <div class="col-6">
					<a href="javascript:void(0);">
						<div class="card faq-card-box">
							<img src="<?=base_url() ?>assets/images/help/service2.png" class="card-img-top" alt="...">
							<div class="card-body border-top">
								<h5 class="card-title font-12">Customer Feedback is here</h5>
							</div>
						</div>
					</a>
				</div> -->
			</div>
		</div>
	</div>
	<?php include('include/bottom-menu.php'); ?>
	<!-- Menubar -->
	
	<?php include('include/multycolor.php'); ?>
</div>  
<?php include('include/allscript.php'); ?>