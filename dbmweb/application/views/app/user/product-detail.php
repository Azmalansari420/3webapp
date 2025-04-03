<?php 
$p_id = $this->input->get('p_id');
$product = $this->db->get_where('product',array('id'=>$p_id))->result_object();
if(!empty($product))
{
	$product = $product[0];
}
include('include/header.php'); ?>
	
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
						<h6 class="title">Product</h6>
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
	<div class="page-content space-top p-b50">
		<div class="container p-0">
			<?php
			if(!empty($product))
			{ ?>
			<div class="container">
				<div class="dz-product-detail">
					<div class="detail-content text-center">
						<h5><?=$product->name ?></h5>
					</div>
					<div class="dz-product-preview mb-3">
						<img src="<?=base_url() ?>media/uploads/product/<?=$product->image ?>" alt="">
					</div>
					
					<div class="view-cart mb-2">
						<ul>
							<li>
								<span class="name">Price :</span>
								<span class="text-secondary font-w500"><?=currency_simble($product->price) ?></span>
							</li>
							<li>
								<span class="name">Term :</span>
								<span class="text-secondary font-w500"><?=$product->cycle ?> days</span>
							</li>
							<li>
								<span class="name">Purchase Limit :</span>
								<span class="text-secondary font-w500"><?=$product->purchase_limit ?></span>
							</li>
							<li>
								<span class="name">Daily Income :</span>
								<span class="text-secondary font-w500"><?=currency_simble($product->daily_income) ?></span>
							</li>
							<li>
								<span class="name">Total Revenue :</span>
								<span class="text-secondary font-w500"><?=currency_simble($product->total_income) ?></span>
							</li>
							<li>
								<span class="name">Total Yield :</span>
								<span class="text-secondary font-w500">%</span>
							</li>							
						</ul>
					</div>

					<?=$product->description ?>
					
				</div>
			</div>
			<?php } else { ?>
				<h2>Product Not Found!</h2>
			<?php } ?>
		</div>
	</div>
	<!-- Page Content End -->
	
	<!-- Menubar -->
	<div class="footer fixed bg-white border-top">
		<div class="container py-2">
			<div class="total-cart">
				<a href="javascript:void(0);" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" style="color: black;font-size: 17px;font-weight: 800;">Invest in this Project</a>
			</div>
		</div>
	</div>
	
	
</div>  


<?php include('include/footer.php'); ?>

<div class="modal fade" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="justify-content: center;">
                <h5 class="modal-title"><?=$product->name ?></h5>
            </div>
            <div class="modal-body">
            	<div class="profile-area mt-3">				
					<div class="content-box my-0 custom-boxs">
						<ul class="row g-2">
							<li class="col-6">							
								<a href="#!">
									<div class="dz-icon-box">
										<i class="fa fa-wallet"></i>
									</div>
									<span>Current Balance <br><?=currency_simble($full_detail->wallet) ?></span>
								</a>
							</li>
							<li class="col-6">							
								<a href="recharge.php">
									<div class="dz-icon-box">
										<i class="fa fa-hand-holding-usd"></i>
									</div>
									<span>Recharge Wallet</span>
								</a>
							</li>
							
						</ul>
					</div>				
				</div>
                <div class="view-cart mb-2">
					<ul>
						<li>
							<span class="name">Price :</span>
							<span class="text-secondary font-w500"><?=currency_simble($product->price) ?></span>
						</li>
						<div class="divider divider-dashed mt-0"></div>
						<li>
							<span class="name">The amount actually paid :</span>
							<h4 class="price"><?=currency_simble($product->price) ?></h4>
						</li>						
					</ul>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-sm btn-primary purchase-product-btn">Confirm</button>
            </div>
        </div>
    </div>
</div>




<script>
	 /*withdraw request*/
    $(document).on("click", ".purchase-product-btn",(function(e) {
      purchase_product();
    }));

    function purchase_product()
    {
        var p_id = "<?=$product->id ?>"
        var p_name = "<?=$product->name ?>"
        var p_phase = "<?=$product->phase ?>"
        var p_price = "<?=$product->price ?>"
        var p_cycle = "<?=$product->cycle ?>"
        var p_daily_income = "<?=$product->daily_income ?>"
        var p_total_income = "<?=$product->total_income ?>"
        var purchase_limit = "<?=$product->purchase_limit ?>"

        
        var form = new FormData();
        form.append("p_id", p_id);
        form.append("p_name", p_name);
        form.append("p_phase", p_phase);
        form.append("p_price", p_price);
        form.append("p_cycle", p_cycle);
        form.append("p_daily_income", p_daily_income);
        form.append("p_total_income", p_total_income);
        form.append("purchase_limit", purchase_limit);

        var settings = {
          "url": "<?=base_url() ?>api/Wallet/purchase_product",
          "method": "POST",
          "dataType": "json",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": form
        };

        $.ajax(settings).done(function (response) 
        {
          console.log(response);
          if(response.status==200)
          {
          	toaster(response.message, 'success');
          	setTimeout(function(){
                window.location.href = response.url;
            }, 1000);
          }
          else
          {
          	toaster(response.message, 'error');
          }
        });
    }

    /*withdraw data*/
</script>