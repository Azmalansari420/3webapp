<?php include('include/allcss.php'); ?>

  <!-- loader start-->
<?php include('include/loader.php'); ?>

  <!-- header start -->
  <header>
    <div class="custom-container">
      <div class="auth-title">
        <h1>New Password</h1>
      </div>
    </div>
  </header>
  <!-- header end -->

  <!-- new password section start-->
  <div class="custom-container">
    <form class="auth-form" target="_blank">
      <div class="form-group">
        <label for="inputPassword" class="form-label">New Password</label>
        <div class="form-input mb-4">
          <input type="password" class="form-control" id="inputPassword" placeholder="Enter New Password" />
          <i class="ri-door-lock-line"></i>
        </div>
      </div>

      <div class="form-group mb-4">
        <label for="inputPassword" class="form-label">Confirm Password</label>
        <div class="form-input">
          <input type="password" class="form-control" id="inputnewPassword" placeholder="Enter Confirm Password" />
          <i class="ri-door-lock-line"></i>
        </div>
      </div>

      <div class="submit-btn">
        <button onclick="location.href = 'login.php';" class="btn theme-btn">Continue</button>
      </div>
    </form>
  </div>

 <?php include('include/allscipt.php'); ?>