<?php include('include/allcss.php'); ?>

  <!-- loader start-->
<?php include('include/loader.php'); ?>

  <!-- header start -->
  <header>
    <div class="custom-container">
      <div class="auth-title">
        <h1>Forgot Password</h1>
      </div>
    </div>
  </header>
  <!-- header end -->

  <!-- forgot password start-->
  <div class="custom-container">
    <form class="auth-form" target="_blank">
      <div class="form-group">
        <label for="inputusername" class="form-label">Email</label>
        <div class="form-input">
          <input type="email" class="form-control" id="inputusername" placeholder="Enter Your Email" />
          <i class="ri-mail-line"></i>
        </div>
      </div>

      <div class="submit-btn">
        <a href="otp.php" class="btn theme-btn">Send OTP</a>
      </div>
    </form>
  </div>
  <!-- forgot password end -->
 <?php include('include/allscipt.php'); ?>