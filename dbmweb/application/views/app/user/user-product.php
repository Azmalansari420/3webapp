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
									<button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls=		"pills-home" aria-selected="true">Active Product</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Expired Product</button>
								</li>
							</ul>
							<div class="tab-content" id="pills-tabContent">
								<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
									<div class="row">
										<div class="dz-list style-2 p-0">
											<ul>
												<?php
												$todaydate = date("Y-m-d");
												$this->db->where('end_date >=', $todaydate);
												$this->db->order_by('id desc');
												$pur_product = $this->db->get_where('purchase_product',array('user_id'=>$full_detail->id,'status'=>1))->result_object();
												if(!empty($pur_product))
												{
												foreach ($pur_product as $key => $data)
													{ ?>
												<li>
													<a href="plan-details.php?request_id=<?=$data->request_id ?>" class="item-content item-link">
														<div class="dz-inner">
															<span class="title">
																<?=$data->p_name ?>
															</span><br>
															<span>Expire Date:- <?=date('d M, Y',strtotime($data->end_date)) ?></span>
														</div>
													</a>
												</li>
												<?php } } else{?>
													<li>
													<a href="#!" class="item-content justify-content-center">
														<div class="dz-inner">
															<span class="title">
																No Products Available.
															</span>
														</div>
													</a>
												</li>
												<?php } ?>
											</ul>
										</div>
									</div>
								</div>

								<!-- phase 2 -->
								<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
									<div class="row">

										<div class="dz-list style-2 p-0">
											<ul>
												<?php
												$todaydate = date("Y-m-d");
												$this->db->where('end_date <=', $todaydate);
												$this->db->order_by('id desc');
												$pur_product = $this->db->get_where('purchase_product',array('user_id'=>$full_detail->id,'status'=>1))->result_object();
												if(!empty($pur_product))
												{
												foreach ($pur_product as $key => $data)
													{ ?>
												<li>
													<a href="plan-details.php?request_id=<?=$data->request_id ?>" class="item-content item-link">
														<div class="dz-inner">
															<span class="title">
																<?=$data->p_name ?>
															</span><br>
															<span>Expire Date:- <?=date('d M, Y',strtotime($data->end_date)) ?></span>
														</div>
													</a>
												</li>
												<?php } } else{?>
													<li>
													<a href="#!" class="item-content justify-content-center">
														<div class="dz-inner">
															<span class="title">
																No Products Available.
															</span>
														</div>
													</a>
												</li>
												<?php } ?>

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
	
	<?php include('include/footer-menu.php'); ?>
	
	
</div>  


<?php include('include/footer.php'); ?>