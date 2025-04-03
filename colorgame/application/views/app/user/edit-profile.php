<?php include('include/header.php'); ?>
	
	<header class="header header-fixed">
		<div class="header-content">
			<div class="left-content">
				<a href="javascript:void(0);" class="back-btn dz-icon icon-fill icon-sm">
					<i class="feather icon-chevron-left"></i>
				</a>
			</div>
			<div class="mid-content"><h5 class="title">Upadte Profile</h5></div>
		</div>
	</header>
	
	<!-- Sidebar -->
    <?php include('include/sidebar.php'); ?>
    <!-- Sidebar End -->
	
	<main class="page-content space-top p-b80">
		<div class="container">
			<div class="edit-profile">
				<div class="profile-image">
					<div class="avatar-upload">
						<div class="avatar-preview">
							<div id="imagePreview" style="background-image: url(assets/images/avatar/1.png);"></div>
							<div class="change-btn">
								<input type='file' class="form-control d-none"  id="imageUpload" accept=".png, .jpg, .jpeg">
								<label for="imageUpload">
									<i class="fi fi-rr-pencil"></i>
								</label>
							</div>
						</div>
					</div>	
				</div>

				<div class="m-b10 input-group input-group-icon style-2 input-lg">
					<div class="input-group-text style-1">
						<span class="input-icon">
							<i class="feather icon-lock"></i>
						</span>
					</div>
					<div class="dz-input-animate focused">
						<label class="form-label" for="name">Name</label>
						<input type="text" id="name" class="form-control style-1" value="Amelia">
					</div>
				</div>
				<div class="m-b15 input-group input-group-icon style-2 input-lg">
					<div class="input-group-text style-1">
						<span class="input-icon">
							<i class="feather icon-mail"></i>
						</span>
					</div>
					<div class="dz-input-animate">
						<label class="form-label" for="email">Email Address</label>
						<input type="email" id="email" class="form-control style-1">
					</div>
				</div>
				<div class="m-b15 input-group input-group-icon style-2 input-lg">
					<div class="input-group-text style-1">
						<span class="input-icon">
							<i class="feather icon-phone-call"></i>
						</span>
					</div>
					<div class="dz-input-animate">
						<label class="form-label" for="phone">Mobile Number</label>
						<input type="number" id="phone" class="form-control style-1">
					</div>
				</div>
				<div class="m-b15 input-group input-group-icon style-2 input-lg">
					<div class="input-group-text style-1">
						<span class="input-icon">
							<i class="feather icon-map-pin"></i>
						</span>
					</div>
					<div class="dz-input-animate">
						<label class="form-label" for="location">Location</label>
						<input type="address" id="location" class="form-control style-1">
					</div>
				</div>

				<a href="#!" class="btn btn-lg btn-thin btn-primary w-100">Update Profile</a>
            </div>
		</div>
	</main>
	
	<!-- Menubar -->
	<?php include('include/menubar.php'); ?>
	<!-- Menubar -->
	
	
</div>  





<?php include('include/footer.php'); ?>
