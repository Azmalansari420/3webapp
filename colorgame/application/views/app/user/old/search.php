<?php 
$count_cart = count_cart();
include('include/allcss.php'); ?>
<style>
	.search-input {
	    margin-bottom: 20px;
	    align-items: center;
	    border-bottom: 1px solid black;
	}
</style>
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
	<div class="page-content space-top p-b50">
		<div class="container">
			<div class="input-group search-input">
				<a href="javascript:void(0);" class="search-icon">
					<i class="icon feather icon-search"></i>
				</a>
				<input type="search" placeholder="Search here..." class="form-control main-in">
			</div>

			<div class="row g-3 mb-3 searchdata"></div>

		</div>
	</div>
	
	<?php include('include/bottom-menu.php'); ?>
	
<?php include('include/multycolor.php'); ?>

</div>  
<?php include('include/allscript.php'); ?>

<script>
	$(document).on("keyup", ".main-in",(function(e) {
     searchdata();
   }));

	function searchdata()
	{
		var search = $('.main-in').val();

		var form = new FormData();
		form.append("search", search);

		var settings = {
		  "url": "<?=base_url() ?>api/Image_filter/searchproduct",
		  "method": "POST",
		  "dataType": "json",
		  "timeout": 0,
		  "processData": false,
		  "mimeType": "multipart/form-data",
		  "contentType": false,
		  "data": form
		};

		$.ajax(settings).done(function (response) {
		  console.log(response);		  
		  	$(".searchdata").html(response.data);		  
		});
	}

	searchdata();
</script>