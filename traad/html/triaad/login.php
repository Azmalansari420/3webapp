
  
  
<?php include('include/allcss.php'); ?>

  <!-- loader start-->
<?php include('include/loader.php'); ?>
  <!-- loader end -->

  <!-- header start -->
  <header>
    <div class="custom-container">
      <div class="auth-title">
        <h1>Sign In</h1>
      </div>
    </div>
  </header>
  <!-- header end -->

  <!-- Sign section start -->
  <div class="custom-container">
    <form class="auth-form" target="_blank" action="home.php">
      <div class="form-group">
        <label for="inputusername" class="form-label">User Name</label>
        <div class="form-input mb-4">
          <input type="text" class="form-control" id="inputusername" placeholder="Enter User Name" />
          <i class="ri-user-line user"></i>
        </div>
      </div>

      <div class="form-group">
        <label for="inputPassword" class="form-label">Password</label>
        <div class="form-input">
          <input type="password" class="form-control" id="inputPassword" placeholder="Enter Your Password" />
          <i class="ri-door-lock-line"></i>
        </div>
      </div>

      <div class="forgot">
        <a href="forgot-password.php">Forgot password?</a>
      </div>

      <div class="submit-btn">
        <a href="home.php" class="btn theme-btn">Sign In</a>
      </div>
      <div class="division">
        <span>OR</span>
      </div>

     

      <h5 class="signup">Haven't registered?<a href="signup.php"> Sign up now</a></h5>
    </form>
  </div>
  <!-- Sign section end-->



 <?php include('include/allscipt.php'); ?>