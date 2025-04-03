<?php include('include/allcss.php'); ?>

  <!-- loader start-->
<?php include('include/loader.php'); ?>

  <!-- side bar start -->
<?php include('include/sidebar.php'); ?>

  <!-- header start -->
  <header class="section-t-space">
    <div class="custom-container">
      <div class="head-content">
        <button class="sidebar-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft">
          <i class="ri-menu-line"></i>
        </button>
        <img class="img-fluid logo" src="assets/logo1.png" alt="nfty-logo" />
        <a href="notification.php">
          <i class="ri-notification-2-line"></i>
        </a>
      </div>
    </div>
  </header>
  <!-- header end -->

  <!-- setting section start -->
  <span id="copyResult"></span>
  <section class="section-lg-t-space">
    <div class="custom-container">
      <div class="wallet-profile">
        <img class="img-fluid profile-pic" src="assets/images/product/45.png" alt="Profile" />
      </div>
    </div>
  </section>

  
  <section class="section-t-space section-lg-b-space">
    <div class="custom-container">
      <form class="auth-form create-form" target="_blank">
        <div class="form-group mb-3">
          <label for="inputusername" class="form-label">User Name</label>
          <div class="form-input">
            <input type="text" class="form-control" id="inputusername" placeholder="Enter User Name" />
            <i class="ri-user-line user"></i>
          </div>
        </div>

        <div class="form-group mb-3">
          <label for="inputusername" class="form-label">Email</label>
          <div class="form-input">
            <input type="email" class="form-control" id="inputemail" placeholder="Enter User Email" />
            <i class="ri-user-line user"></i>
          </div>
        </div>

        <div class="form-group mb-3">
          <label for="inputMobile" class="form-label">Mobile</label>
          <div class="form-input">
            <input type="number" class="form-control" id="inputMobile" placeholder="Enter Mobile" />
            <i class="ri-phone-line user"></i>
          </div>
        </div>

        <div class="form-group mb-3">
          <label for="inputPassword" class="form-label">Password</label>
          <div class="form-input">
            <input type="password" class="form-control" id="inputPassword" placeholder="Enter Your Password" />
            <i class="ri-door-lock-line"></i>
          </div>
        </div>

        

        <div class="submit-btn mb-0">
          <a href="#" class="btn theme-btn">Submit</a>
        </div>
      </form>
    </div>
  </section>

  <!-- panel-space start -->
  <section class="panel-space"></section>
  <!-- panel-space end -->

  <!-- bottom navbar start -->
 <?php include('include/bootom-menu.php'); ?>
  <!-- bottom navbar end -->

  <!-- bootstrap js -->
 <?php include('include/allscipt.php'); ?>
 