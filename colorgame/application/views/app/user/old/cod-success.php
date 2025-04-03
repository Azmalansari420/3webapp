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
						<h6 class="title font-14">Order Success</h6>
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
	<!-- Header -->
	<style>
		._success {
		    box-shadow: 0 15px 25px #00000019;
		    padding: 25px;
		    width: 100%;
		    text-align: center;
		    margin: 40px auto;
		    border-bottom: solid 4px #28a745;
		}

		._success i {
		    font-size: 55px;
		    color: #28a745;
		}

		._success h2 {
		    margin-bottom: 12px;
		    font-size: 40px;
		    font-weight: 500;
		    line-height: 1.2;
		    margin-top: 10px;
		}

		._success p {
		    margin-bottom: 0px;
		    font-size: 18px;
		    color: #495057;
		    font-weight: 500;
		}
	</style>
	<!-- Page Content Start -->
	<div class="page-content space-top">
		<div class="container">
			<div class="row justify-content-center">
	            <div class="col-md-5">
	                <div class="message-box _success">
                     <i class="fa fa-check-circle" aria-hidden="true"></i>
                     <h2> Your Order was successful </h2>
                     <p> Thank you for your Order. we will <br>	be in contact with more details shortly </p>
	            	</div> 
	        	</div> 
	    	</div> 
		</div>
	</div>
	<!-- Page Content End -->
	
	<!-- Menubar -->
	<?php include('include/bottom-menu.php'); ?>
	<!-- Menubar -->
	
	
</div>  
<?php include('include/allscript.php'); ?>