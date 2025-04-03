<?php 
// $ciur = gettimediffrence('2024-09-18 16:38:47');
// print_r($ciur);
// die;

$count_cart = count_cart();
include('include/allcss.php'); ?>
    <!-- Preloader end-->
<style>
	.profile-image{
		display: flex;
    	justify-content: center;
	}
	.icon-edit-2{
	    position: relative;
	    top: 24px;
	    left: -10px;
	}
	.icon-bell{
		font-size: 21px;
	    color: black;
	    font-weight: 600;
	}
	.dz-notification .notification-list .list-items .list-content p {
	    font-size: 12px;
	    margin-bottom: 0;
	    color: #000000;
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
						<h6 class="title font-14">Coupons</h6>
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
	<div class="page-content space-top p-b50">
		<div class="container">
		
			<div class="title-bar mb-0">
				 <h6 class="title mb-0">All Coupons</h6>
			</div>

			<div class="dz-notification">
				<ul class="notification-list load-more"></ul>
				<div style="text-align: center;margin-top: 15px;">
					<button class="btn btn-primary btn-sm load-more-btn" >Load More</button>
				</div>	
			</div>
		</div>
	</div>
	<?php include('include/bottom-menu.php'); ?>
	
</div>  

<?php include('include/allscript.php'); ?>

<script>
	$(document).on("click", ".load-more-btn",(function(e) {
        click_btn = $(this);
      load_more();
    }));

    var page = 0;
    function load_more()
    {
        var click_btn = '.load-more-btn';

        $(click_btn).text('Wait..');
        $(click_btn).attr('disabled',true);

        var form = new FormData();
        form.append("page", page); 

        var settings = {
          "url": "<?=base_url() ?>api/Image_filter/couponlist",
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
            if(response.status==200)
            {
              if(page==0)
                    $('.load-more').html(response.data);
                else
                    $(".load-more").append(response.data);
                page++;
                $(click_btn).show();
            }
            else
          {
            $(click_btn).hide();
            toaster(response.message, 'success');
          }
          $(click_btn).text('Load More');
          $(click_btn).attr('disabled',false);


        });
    }

    load_more();

    
</script>


