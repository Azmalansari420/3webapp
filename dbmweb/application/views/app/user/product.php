<?php include('include/header.php'); ?>
	
<style>
	.nav-link {
    color: #f2fffc;
}
</style>
	<!-- Header -->
		<header class="header shadow header-fixed border-0">
			<div class="container">
				<div class="header-content">
					<div class="left-content">
						<a href="javascript:void(0);" class="menu-toggler">
							<i class="icon feather icon-menu"></i>
						</a>
					</div>
					<div class="mid-content">
						<h6 class="title">Product </h6>
					</div>
					<div class="right-content">
						<a href="notification.php" class="search-icon">
							<i class="icon feather icon-bell"></i>
						</a>
					</div>
				</div>
			</div>
		</header>
	<!-- Header -->
	
	<!-- Sidebar -->
	<?php include('include/sidebar.php'); ?>
    <!-- Sidebar End -->
	
	<!-- Page Content Start -->
	<div class="page-content space-top p-b80">
		<div class="container">
				<div class="row g-3">

					<div class="col-12">
						<div class="card-body">
							<ul class="nav nav-pills mb-3 light justify-content-around" role="tablist">
								<li class="nav-item" role="presentation">
									<button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls=		"pills-home" aria-selected="true">PHASE I</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">PHASE II</button>
								</li>
							</ul>
							<div class="tab-content" id="pills-tabContent">
								<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
									<div class="row">
										<?php 
										$product = $this->db->get_where('product',array('status'=>1,'phase'=>1))->result_object();
										foreach ($product as $key => $data) 
											{ ?>
										<div class="col-6">
											<div class="shop-card">
												<div class="dz-media">
													<a href="product-detail.php?p_id=<?=$data->id ?>">
														<img src="<?=base_url() ?>media/uploads/product/<?=$data->image ?>" alt="image">
													</a>
												</div>
												<div class="dz-content text-center">
													<h6 class="title">
														<a href="product-detail.php?p_id=<?=$data->id ?>" style="font-weight: 700;"><?=$data->name ?></a>
													</h6>
													<p class="price">
														Price: <?=currency_simble($data->price) ?><br>
														Cycle: <?=$data->cycle ?> days<br>
														Daily Income: <?=currency_simble($data->daily_income) ?><br>
														Total Income: <?=currency_simble($data->total_income) ?>
													</p>
												</div>
											</div>
										</div>

										<?php } ?>


									</div>
								</div>

								<!-- phase 2 -->
								<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
									<div class="row">
										
										<?php 
										$product = $this->db->get_where('product',array('status'=>1,'phase'=>2))->result_object();
										foreach ($product as $key => $data) 
											{ ?>
										<div class="col-6">
											<div class="shop-card">
												<div class="dz-media">
													<a href="product-detail.php?p_id=<?=$data->id ?>">
														<img src="<?=base_url() ?>media/uploads/product/<?=$data->image ?>" alt="image">
													</a>
												</div>
												<div class="dz-content text-center">
													<h6 class="title">
														<a href="product-detail.php?p_id=<?=$data->id ?>" style="font-weight: 700;"><?=$data->name ?></a>
													</h6>
													<p class="price">
														Price: <?=currency_simble($data->price) ?><br>
														Cycle: <?=$data->cycle ?> days<br>
														Daily Income: <?=currency_simble($data->daily_income) ?><br>
														Total Income: <?=currency_simble($data->total_income) ?>
													</p>
												</div>
											</div>
										</div>

										<?php } ?>

									</div>
								</div>
								
								
							</div>
						</div>
					</div>

				</div>
			</div>
	</div>
	
	<?php include('include/footer-menu.php'); ?>
	
	
</div>  


<?php include('include/footer.php'); ?>