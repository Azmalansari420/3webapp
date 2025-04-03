<?php include('include/allcss.php'); ?>

  <!-- loader start-->
<?php include('include/loader.php'); ?>

  <!-- header start-->
  <header>
    <div class="custom-container">
      <div class="auth-title">
        <h1>Create an Account</h1>
      </div>
    </div>
  </header>
  <!-- header start-->

  <!-- Sign Form start-->
  <div class="custom-container">
    <form class="auth-form" target="_blank">
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
        <label for="inputPassword" class="form-label">Password</label>
        <div class="form-input">
          <input type="password" class="form-control" id="inputPassword" placeholder="Enter Your Password" />
          <i class="ri-door-lock-line"></i>
        </div>
      </div>

      <div class="submit-btn">
        <a href="login.php" class="btn theme-btn">Continue</a>
      </div>

      <div class="division">
        <span>OR</span>
      </div>


      <h5 class="signup">Already have an account ?<a href="login.php"> Sign in now</a></h5>
    </form>
    <!-- Sign Form end -->
  </div>

<?php include('include/allscipt.php'); ?>