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
	
	<!-- Sidebar -->
    <?php include('include/sidebar.php'); ?>
    <!-- Sidebar End -->
	
	<!-- Page Content Start -->
	<div class="page-content space-top p-b65">
		<div class="container py-0">
			<!-- Banner -->
			<div class="dz-banner">
				<div class="swiper banner-swiper">
					<div class="swiper-wrapper">
						<?php
						$this->db->order_by('id desc');
						$slider = $this->crud->selectDataByMultipleWhere('slider',array('status'=>1,));
						foreach($slider as $data)
							{ ?>
						<div class="swiper-slide">
							<div class="dz-media">
								<img src="<?=base_url() ?>media/uploads/slider/<?=$data->image ?>" alt="<?=website_name ?>">
							</div>	
						</div>
						<?php } ?>
					</div>
					<div class="swiper-pagination style-2"></div>
				</div>
			</div>
			
			
			<!-- Catagory Start -->
			<div class="category-area">
				<ul class="row g-3">
					<?php
					$this->db->limit(8);
					$category = $this->crud->selectDataByMultipleWhere('categories',array('status'=>1,'show_home'=>1,));
					foreach($category as $data)
						{ ?>
					<li class="category-item col-3">
						<a href="shop.php?cat_id=<?=$data->id ?>">
							<div class="media media-55">
								<img src="<?=base_url() ?>media/uploads/categories/<?=$data->icon ?>" alt="<?=$data->name ?>">
							</div>
							<span><?=$data->name ?></span>
						</a>
					</li>

					<?php } ?>
				</ul>
			</div>
			
			<div class="title-bar">
				<h6 class="title mb-0">Our Latest Product</h6>
			</div>
			<div class="swiper product-swiper">
				<div class="swiper-wrapper">
					<?php
					$this->db->limit(10);
					$this->db->order_by('id desc');
					$product = $this->crud->selectDataByMultipleWhere('product',array('status'=>1,));
					foreach($product as $data)
						{ ?>
					<?php $this->load->view('app/user/include/home-productcard',array('data'=>$data)); ?>
				<?php } ?>				
				</div>
			</div>
			<!-- most populer -->
			<div class="title-bar">
				<h6 class="title mb-0">Most Popular</h6>
				<a href="product-list.php">View all <i class="icon feather icon-chevron-right"></i></a>
			</div>
			<div class="swiper most-product-swiper">
				<div class="swiper-wrapper">
					<?php
					$this->db->limit(10);
					$this->db->order_by('id desc');
					$product = $this->crud->selectDataByMultipleWhere('product',array('status'=>1,'most_populer'=>1));
					foreach($product as $data)
						{ ?>
					<?php $this->load->view('app/user/include/home-productcard',array('data'=>$data)); ?>
				<?php } ?>				
				</div>
			</div>

			<!-- Best Oroduct -->
			<div class="title-bar">
				<h6 class="title mb-0">Best Product</h6>
				<a href="product-list.php">View all <i class="icon feather icon-chevron-right"></i></a>
			</div>
			<div class="swiper best-product-swiper">
				<div class="swiper-wrapper">
					<?php
					$this->db->limit(10);
					$this->db->order_by('id desc');
					$product = $this->crud->selectDataByMultipleWhere('product',array('status'=>1,'best_product'=>1));
					foreach($product as $data)
						{ ?>
					<?php $this->load->view('app/user/include/home-productcard',array('data'=>$data)); ?>
				<?php } ?>
				
				</div>
			</div>

			
<?php
$this->db->limit(4);
$this->db->order_by('id desc');
$product = $this->crud->selectDataByMultipleWhere('product',array('status'=>1,'deals_of_today'=>1));
if(!empty($product))
	{ ?>
			<!-- Top Selection Start -->
			<div class="top-selection">
				<div class="title-bar mt-0">
					<h6 class="title text-white">Deals for Today </h6>
				</div>
				<div class="row g-3">
					<?php
					foreach($product as $data)
						{
						$this->db->limit(1);
						$this->db->group_by('color_id');
						$this->db->order_by('id asc');
						$allimage = $this->crud->selectDataByMultipleWhere('all_images',array('p_id'=>$data->id));
						 ?>

					<div class="col-6">
						<div class="shop-card">
							<div class="dz-media">
								<a href="<?=('product-detail.php?id='.$data->id) ?>">
									<img src="<?=base_url() ?>media/uploads/product/<?=$data->thumb_image ?>" alt="image">	
								</a>
							</div>
							<div class="dz-content">
								<h6 class="title"><a href="<?=('product-detail.php?id='.$data->id) ?>"><?=$data->name ?></a></h6>
								<h6 class="price"><?=currency_simble($allimage[0]->sale_price) ?><del><?=currency_simble($allimage[0]->mrp_price) ?></del></h6>

							</div>
						</div>
					</div>
				<?php } ?>
				
				</div>	
			</div>	
<?php } ?>
		</div>
	</div>
	
	<?php include('include/bottom-menu.php'); ?>
	
<?php include('include/multycolor.php'); ?>

</div>  
<?php include('include/allscript.php'); ?>