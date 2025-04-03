<?php
$user = getuserdata();
// print_r($user[0]->name);
// die;
?>

<div class="dark-overlay"></div>
	<div class="sidebar">
		<div class="inner-sidebar">
			<a href="edit-profile.php" class="author-box">
				<div class="dz-media">
					<img src="<?=base_url() ?>media/uploads/<?=$user[0]->image ?>" alt="author-image" style="padding: 0;" onerror="this.onerror=null;this.src='<?=base_url() ?>media/uploads/user.png';">
				</div>
				<div class="dz-info">
					<h5 class="name"><?=$user[0]->name ?></h5>
					<span><?=$user[0]->mobile ?></span>
				</div>
			</a>
			<ul class="nav navbar-nav">	
				<li>
					<a class="nav-link active" href="home.php">
						<span class="dz-icon">
							<i class="icon feather icon-home"></i>
						</span>
						<span>Home</span>
					</a>
				</li>
				<li>
					<a class="nav-link" href="javascript:;">
						<span class="dz-icon">
							<i class="icon feather icon-settings"></i>
						</span>
						<span>Setting</span>
					</a>
				</li>
				<?php
				if($user[0]->role==1)
					{ ?>
				<li>
					<a class="nav-link" href="plant-information.php">
						<span class="dz-icon">
							<i class="icon feather icon-plus-square"></i>
						</span>
						<span>Plant Information </span>
					</a>
				</li>
				<li>
					<a class="nav-link" href="leave-form.php">
						<span class="dz-icon">
							<i class="icon feather icon-layout"></i>
						</span>
						<span>Leave Form </span>
					</a>
				</li>
			<?php } ?>
				<li>
					<a class="nav-link" href="term-condition.php">
						<span class="dz-icon">
							<i class="icon feather icon-list"></i>
						</span>
						<span>Term & Conditions</span>
					</a>
				</li>
				<li>
					<a class="nav-link" href="privacy-policy.php">
						<span class="dz-icon">
							<i class="icon feather icon-server"></i>
						</span>
						<span>Privacy Policy</span>
					</a>
				</li>
			
				<li>
					<a class="nav-link" href="edit-profile.php">
						<span class="dz-icon">
							<i class="icon feather icon-user"></i>
						</span>
						<span>Profile</span>
					</a>
				</li>
				<li>
					<a class="nav-link" href="contact.php">
						<span class="dz-icon">
							<i class="icon feather icon-box"></i>
						</span>
						<span>Complaint Box </span>
					</a>
				</li>
				<li>
					<a class="nav-link" href="<?=base_url() ?>api/user/user_logout">
						<span class="dz-icon">
							<i class="icon feather icon-log-out"></i>
						</span>
						<span>Logout</span>
					</a>
				</li>
			</ul>
			<div class="sidebar-bottom">
				<ul class="app-setting">
					<li class="nav-color">
						<a href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
							<span class="dz-icon">                        
								<svg class="color-plate" width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M10.725.787a9.325 9.325 0 0 1 	8.425 7.65 2.35 2.35 0 0 1-.625 2.275 1.662 1.662 0 0 1-1.863.188c-.462-.225-.812-.6-1.25-.788a4.238 4.238 0 0 0-4.5.725A3.751 3.751 0 0 0 10 14.825c.237.725.75 1.25 1.012 1.987a1.713 1.713 0 0 1-.762 2.063 3.312 3.312 0 0 1-2.5.125A9.262 9.262 0 0 1 3.125 3.837a9.2 9.2 0 0 1 7.6-3.05zM2.162 11.6A8.112 8.112 0 0 0 8 17.85c.487.125 1.25.3 1.6 0 .35-.3.15-.9-.125-1.25a4.674 4.674 0 0 1-.725-1.388A5 5 0 0 1 10 9.925a5.187 5.187 0 0 1 3.6-1.4 5.063 5.063 0 0 1 3.137 1.025.887.887 0 0 0 .95.225c.4-.213.338-.75.263-1.125a8.413 8.413 0 0 0-1.963-3.95 8.087 8.087 0 0 0-11.937 0 8.075 8.075 0 0 0-1.9 6.9h.012z"/><path d="M14.313 4.862a1.575 1.575 0 1 1 .024 3.15 1.575 1.575 0 0 1-.024-3.15zm0 2.2a.637.637 0 1 0 0-1.274.637.637 0 0 0 0 1.274zm-4.075-4.075a1.575 1.575 0 1 1 0 3.15 1.575 1.575 0 0 1 0-3.15zm0 2.2a.637.637 0 1 0 0-1.274.637.637 0 0 0 0 1.274zM6.25 7.925a1.575 1.575 0 1 1 .025-3.15 1.575 1.575 0 0 1-.025 3.15zm0-2.2A.637.637 0 1 0 6.25 7a.637.637 0 0 0 0-1.275zm.125 4.675a1.575 1.575 0 1 1-3.15 0 1.575 1.575 0 0 1 3.15 0zm-2.2 0a.638.638 0 1 0 1.275 0 .638.638 0 0 0-1.275 0zm2.075 2.387a1.575 1.575 0 1 1 0 3.151 1.575 1.575 0 0 1 0-3.15zm0 2.213a.638.638 0 1 0 0-1.276.638.638 0 0 0 0 1.276z"/>
								</svg>
							</span>					
							<span>Color Theme</span>
							<div class="color-active ms-auto">
								<span>Active</span>	
								<div class="current-color"></div>
							</div>	
						</a>
					</li>
					<li>
						<div class="mode">
							<span class="dz-icon">                        
								<i class="icon feather icon-moon"></i>
							</span>					
							<span>Dark Mode</span>
							<div class="custom-switch">
								<input type="checkbox" class="switch-input theme-btn" id="toggle-dark-menu">
								<label class="custom-switch-label" for="toggle-dark-menu"></label>
							</div>					
						</div>
					</li>
					
				</ul>
				<div class="app-info">
					<h6 class="name"><?=website_name ?></h6>
					<!-- <span class="ver-info">My Business My Dream</span> -->
				</div>
			</div>
		</div>
	</div>