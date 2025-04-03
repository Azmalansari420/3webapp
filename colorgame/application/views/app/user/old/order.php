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
						<h6 class="title font-14">Orders</h6>
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
	
	<!-- Sidebar -->
    <?php include('include/sidebar.php'); ?>

		
	
	
	<!-- Page Content Start -->	
	<div class="page-content space-top" style="padding-bottom: 56px;">
        <div class="container p-0">
			<div class="dz-tab style-1 tab-fixed">
				<div class="tab-slide-effect">
					<ul class="nav nav-tabs" id="myTab2" role="tablist">
						<li class="tab-active-indicator" style="width: 90.7188px; transform: translateX(0px);"></li>
						<li class="nav-item active" role="presentation">
							<button class="nav-link active" id="home-tab2" data-bs-toggle="tab" data-bs-target="#home-tab-pane2" type="button" role="tab" aria-controls="home-tab-pane2" aria-selected="true">All</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="profile-tab2" data-bs-toggle="tab" data-bs-target="#profile-tab-pane2" type="button" role="tab" aria-controls="profile-tab-pane2" aria-selected="false">Confirm</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="contact-tab2" data-bs-toggle="tab" data-bs-target="#contact-tab-pane2" type="button" role="tab" aria-controls="contact-tab-pane2" aria-selected="false">Completed</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="order-tab2" data-bs-toggle="tab" data-bs-target="#order-tab-pane2" type="button" role="tab" aria-controls="order-tab-pane2" aria-selected="false">Cancel</button>
						</li>
						
					</ul>
				</div>

				<div class="tab-content pt-0" id="myTabContent2">
					<div class="tab-pane fade active show" id="home-tab-pane2" role="tabpanel" aria-labelledby="home-tab2" tabindex="0">
						<div class="row">
							<?php
							
							$finalorder = finalorder();
							
							foreach($finalorder as $data)
								{ ?>
							<?php $this->load->view('app/user/include/order-cart',array('data'=>$data)); ?>
						<?php } ?>
						</div>
					</div>
					<!-- Confirm -->
					<div class="tab-pane fade" id="profile-tab-pane2" role="tabpanel" aria-labelledby="profile-tab2" tabindex="0">
						<div class="row">
							<div class="col-12">
								<?php
								$status = 1;
								$finalorder = finalorder($status);
								$this->db->order_by('id desc');
								foreach($finalorder as $data)
									{ ?>
								<?php $this->load->view('app/user/include/order-cart',array('data'=>$data)); ?>
							<?php } ?>
							</div>
						</div>
					</div>
					<!-- Completed -->
					<div class="tab-pane fade" id="contact-tab-pane2" role="tabpanel" aria-labelledby="contact-tab2" tabindex="0">
						<div class="row">
							<?php
							$status = 4;
							$finalorder = finalorder($status);
							$this->db->order_by('id desc');
							foreach($finalorder as $data)
								{ ?>
							<?php $this->load->view('app/user/include/order-cart',array('data'=>$data)); ?>
						<?php } ?>
						</div>
					</div>
					<!-- Cancel -->
					<div class="tab-pane fade" id="order-tab-pane2" role="tabpanel" aria-labelledby="order-tab2" tabindex="0">
						<div class="row">
							<?php
							$status = 5;
							$finalorder = finalorder($status);
							$this->db->order_by('id desc');
							foreach($finalorder as $data)
								{ ?>
							<?php $this->load->view('app/user/include/order-cart',array('data'=>$data)); ?>
						<?php } ?>
						</div>
					</div>

					

				</div>
			</div>
        </div>
	</div>
	<!-- Page Content End -->
<!-- Menubar -->
	<?php include('include/bottom-menu.php'); ?>
	<!-- Menubar -->
	<?php include('include/multycolor.php'); ?>
	
</div>  
<?php include('include/allscript.php'); ?>