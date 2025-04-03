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
						<h6 class="title font-14"><?=website_name ?></h6>
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
	<!-- Header -->
	
	
	<!-- Page Content Start -->	
	<div class="page-content space-top p-b50">
        <div class="container p-0">
			<div class="dz-tab style-1 tab-fixed">
				<div class="tab-slide-effect">
					<ul class="nav nav-tabs" id="myTab2" role="tablist">
						<li class="tab-active-indicator" style="width: 90.7188px; transform: translateX(0px);"></li>
						<li class="nav-item active" role="presentation">
							<button class="nav-link active" id="home-tab2" data-bs-toggle="tab" data-bs-target="#home-tab-pane2" type="button" role="tab" aria-controls="home-tab-pane2" aria-selected="true">Most Popular</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="profile-tab2" data-bs-toggle="tab" data-bs-target="#profile-tab-pane2" type="button" role="tab" aria-controls="profile-tab-pane2" aria-selected="false">Best Products</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="contact-tab2" data-bs-toggle="tab" data-bs-target="#contact-tab-pane2" type="button" role="tab" aria-controls="contact-tab-pane2" aria-selected="false">Deals for Today</button>
						</li>
					</ul>
				</div>
				<div class="tab-content" id="myTabContent2">
					<div class="tab-pane fade active show" id="home-tab-pane2" role="tabpanel" aria-labelledby="home-tab2" tabindex="0">
						<div class="row">
							<?php
							$this->db->order_by('id desc');
							$product = $this->crud->selectDataByMultipleWhere('product',array('status'=>1,'most_populer'=>1));
							foreach($product as $data)
								{ ?>
							<?php $this->load->view('app/user/include/product-list-card',array('data'=>$data)); ?>
							<?php } ?>


						</div>
					</div>

					<!-- best  -->
					<div class="tab-pane fade" id="profile-tab-pane2" role="tabpanel" aria-labelledby="profile-tab2" tabindex="0">
						<div class="row">
							<?php
							$this->db->order_by('id desc');
							$product = $this->crud->selectDataByMultipleWhere('product',array('status'=>1,'best_product'=>1));
							foreach($product as $data)
								{ ?>
							<?php $this->load->view('app/user/include/product-list-card',array('data'=>$data)); ?>
							<?php } ?>
						</div>
					</div>
					<!-- deal -->
					<div class="tab-pane fade" id="contact-tab-pane2" role="tabpanel" aria-labelledby="contact-tab2" tabindex="0">
						<div class="row">

							<?php
							$this->db->order_by('id desc');
							$product = $this->crud->selectDataByMultipleWhere('product',array('status'=>1,'deals_of_today'=>1));
							foreach($product as $data)
								{ ?>
							<?php $this->load->view('app/user/include/product-list-card',array('data'=>$data)); ?>
							<?php } ?>
							
						</div>
					</div>
				</div>
			</div>
        </div>
	</div>
	<!-- Page Content End -->
		<?php include('include/bottom-menu.php'); ?>
	
<?php include('include/multycolor.php'); ?>
</div>  
<?php include('include/allscript.php'); ?>