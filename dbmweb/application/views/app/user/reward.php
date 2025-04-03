<?php include('include/header.php'); ?>

<style>
	.money-box {
    background: white;
    color: black;
    padding: 12px 15px;
    border-radius: 9px;
    font-weight: 800;
    font-size: 18px;
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
						<h6 class="title">Redeem Your Bonus </h6>
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
				<div class="row p-1">

					<div class="col-12 mt-3">
						<div class="card">
	                        
	                        <div class="card-body">
	                            <div class="mb-2">
									<label class="form-label" for="name">Enter Bonus Code</label>
									<input type="text" id="name" class="form-control" >
								</div>
	                           
	                        </div>
	                    </div>
					</div>

					<div class="total-cart">
						<a href="javascript:void(0);" class="btn btn-primary w-100" style="color: black;font-size: 17px;font-weight: 800;">Redeem Now</a>
					</div>
					
				</div>
			</div>
	</div>
	<!-- Page Content End -->
	
	<!-- Menubar -->
	<?php include('include/footer-menu.php'); ?>
	
	
</div>  


<?php include('include/footer.php'); ?>

<script>
	var amount = 0;
    $(document).on("click", ".money-btn",(function(e) {
        amount = $(this).data('amt');    
        $("#w_amount").val(amount);
    }));
</script>