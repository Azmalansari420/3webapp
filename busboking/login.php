<?php include('include/header.php'); ?>

   <body>
      <!-- sign up -->
      <div class="osahan-signup">
         <div class="osahan-header-nav shadow-sm p-3 d-flex align-items-center bg-danger">
            <h5 class="font-weight-normal mb-0 text-white">
               <a class="text-danger mr-3" href="#!"><i class="icofont-rounded-left"></i></a>
               Sign in to your account
            </h5>
            
         </div>
         <div class="px-3 pt-3 pb-5">
            <form action="otp.php">
               <div class="form-group">
                  <label class="text-muted f-10 mb-1">Mobile Number</label>
                  <input type="number" class="form-control" placeholder="Enter Mobile Number"  value="1234567890">
               </div>
               
               <div class="form-group">
                  <label class="text-muted f-10 mb-1">Password</label>
                  <input type="password" class="form-control" placeholder="Enter Your Password"  value="osahan94">
               </div>
               <div class="text-right mb-3">
                  <a href="forgot-password.php" class="text-muted small">Forgot your password?</a>
               </div>
               <button type="submit" class="btn btn-danger btn-block osahanbus-btn mb-4 rounded-1">SIGN IN</button>
            </form>

            <div class="sign-or d-flex align-items-center justify-content-center mb-4">
               <hr class="mr-4">
               <p class="text-muted text-center py-2 m-0">OR</p>
               <hr class="ml-4">
            </div>
           
            <div class="osahan-signin text-center p-1">
               <p class="m-0">Not a member ? <a href="register.php" class="text-danger ml-2">Sign Up</a></p>
            </div>
         </div>
      </div>

      <!-- sidebar -->
     



     <?php include('include/footer.php'); ?>