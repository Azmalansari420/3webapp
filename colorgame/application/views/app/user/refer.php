<?php include('include/header.php'); ?>

	<header class="header header-fixed" >
		<div class="header-content">
			<div class="left-content">
				<a href="javascript:void(0);" class="menu-toggler">
					<svg class="text-dark" xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="30px" fill="#000000"><path d="M13 14v6c0 .55.45 1 1 1h6c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1h-6c-.55 0-1 .45-1 1zm-9 7h6c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1zM3 4v6c0 .55.45 1 1 1h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1zm12.95-1.6L11.7 6.64c-.39.39-.39 1.02 0 1.41l4.25 4.25c.39.39 1.02.39 1.41 0l4.25-4.25c.39-.39.39-1.02 0-1.41L17.37 2.4c-.39-.39-1.03-.39-1.42 0z"></path></svg>
				</a>
			</div>
			<div class="mid-content header-logo">
				<a href="javascript:void(0);" style="font-size: 22px;">
					<img src="<?=base_url() ?>media/uploads/site_setting/<?=$site_setting[0]->logo ?>" class="img-fluid">
				</a>
			</div>
			<div class="right-content">
				<a href="notification.php" class="dz-icon icon-fill icon-sm">
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M15 6.66675C15 5.34067 14.4732 4.0689 13.5355 3.13121C12.5979 2.19353 11.3261 1.66675 10 1.66675C8.67392 1.66675 7.40215 2.19353 6.46447 3.13121C5.52678 4.0689 5 5.34067 5 6.66675C5 12.5001 2.5 14.1667 2.5 14.1667H17.5C17.5 14.1667 15 12.5001 15 6.66675Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M11.4417 17.5C11.2952 17.7526 11.0849 17.9622 10.8319 18.1079C10.5789 18.2537 10.292 18.3304 10 18.3304C9.70803 18.3304 9.42117 18.2537 9.16816 18.1079C8.91515 17.9622 8.70486 17.7526 8.55835 17.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</a>
			</div>
		</div>
	</header>
	
	
	
	<!-- Sidebar -->
    <?php include('include/sidebar.php'); ?>
    <!-- Sidebar End -->
	<style>
	
	.view-cart ul {
	    display: flex;
	    flex-direction: column;
	    gap: 5px;
	}
</style>
	<!-- Main Content Start -->
	<main class="page-content space-top p-b40">
		<div class="container">

			<div class="col-12 col-lg-12  mb-3">
               <div class="card adminuiux-card">
                   <div class="card-body">
                      <div class="row gx-2 gx-sm-3 align-items-center">
                         <div class="col">
                             <p class="h4 mb-0">
                                 <i class="bi bi-people fs-4 text-success-emphasis"></i> Referral Code
                             </p>
                             <div class="input-group mt-2">
                                 <input type="text" class="form-control" id="referralUrl" placeholder="Referral Code" value="<?=$full_detail->user_id ?>" readonly>
                                 <button class="btn btn-outline-success" id="copyBtn" onclick="copyReferral()">Copy</button>
                             </div>
                             <span id="copyMsg" class="text-success" style="display:none;">Copied!</span>
                         </div>
                         
                      </div>
                   </div>
               </div>
           </div>

			<div class="profile-area">
				<div class="pt-0">
					<div>
						<table class="table table-responsive">
							<thead>
								<tr>
									<th>Username</th>
									<th>Mobile No</th>
									<th >Date</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>20201245630</td>
									<td>2</td>
									<td>22/02/2024</td>
								</tr>
								<tr>
									<td>20201245630</td>
									<td>2</td>
									<td>22/02/2024</td>
								</tr>
								<tr>
									<td>20201245630</td>
									<td>2</td>
									<td>22/02/2024</td>
								</tr>
								<tr>
									<td>20201245630</td>
									<td>2</td>
									<td>22/02/2024</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>				
			</div>
		</div>
	</main>
	<!-- Main Content End -->
	
	<!-- Menubar -->
	<?php include('include/menubar.php'); ?>
	<!-- Menubar -->
	
	
</div>  





<?php include('include/footer.php'); ?>


<script>
	function copyReferral() {
	    var referralInput = document.getElementById("referralUrl");
	    referralInput.select();
	    referralInput.setSelectionRange(0, 99999); // For mobile devices
	    document.execCommand("copy");
	    var copyMsg = document.getElementById("copyMsg");
	    copyMsg.style.display = "inline";
	    setTimeout(function() {
	        copyMsg.style.display = "none";
	    }, 2000);
	}
</script>