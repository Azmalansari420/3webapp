<?php 
include('include/allcss.php'); ?>
	
	<!-- Header -->
		<header class="header header-fixed">
			<div class="container">
				<div class="header-content">
					<div class="left-content">
						<a href="javascript:void(0);" class="back-btn">
							<i class="icon feather icon-chevron-left"></i>
						</a>
					</div>
					<div class="mid-content">
						<h6 class="title">Order Success</h6>
					</div>
					<div class="right-content">
						<a href="javascript:void(0);">
							<i class="icon feather icon-more-vertical-"></i>
						</a>
					</div>
				</div>
			</div>
		</header>
	<!-- Header -->
	<style>
		._failed{ border-bottom: solid 4px red !important; }
		._failed i{  color:red !important;  }
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
	                <div class="message-box _success _failed">
	                     <i class="fa fa-times-circle" aria-hidden="true"></i>
	                    <h2> Your payment failed </h2>
	             <p>  Try again later </p> 
	         
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