<?php include('include/header.php'); ?>
	
	<header class="header header-fixed">
		<div class="header-content">
			<div class="left-content">
				<a href="javascript:void(0);" class="back-btn dz-icon icon-fill icon-sm">
					<i class="feather icon-chevron-left"></i>
				</a>
			</div>
			<div class="mid-content"><h5 class="title">Feedback</h5></div>
		</div>
	</header>
	
	<!-- Sidebar -->
    <?php include('include/sidebar.php'); ?>

<style>
	.input-group.style-2 .dz-input-animate {
    height: 230px;
}
</style>
    <!-- Sidebar End -->
	
	<main class="page-content space-top p-b80">
		<div class="container">
			<div class="edit-profile">
				<div class="profile-image">
					<div class="avatar-upload">
						<div class="avatar-preview">
							<div id="imagePreview" style="background-image: url(assets/images/avatar/1.png);"></div>
						</div>
					</div>	
				</div>

				<div class="m-b10 input-group input-group-icon style-2 input-lg">
					<div class="dz-input-animate focused">
						<label class="form-label" for="name">Send Feedback</label>
						<textarea rows="10" class="form-control style-1"></textarea>
						<!-- <input type="text" id="name" class="form-control style-1" value="Amelia"> -->
					</div>
				</div>
				

				<a href="#!" class="btn btn-lg btn-thin btn-primary w-100">Submit</a>
            </div>
		</div>
	</main>
	
	<!-- Menubar -->
	<?php include('include/menubar.php'); ?>
	<!-- Menubar -->
	
	
</div>  





<?php include('include/footer.php'); ?>
