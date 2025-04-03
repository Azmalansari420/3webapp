<?php include('include/header.php'); ?>


   <body>
      <!-- sign up -->
      <div class="osahan-signup">
         <div class="osahan-header-nav shadow-sm p-3 d-flex align-items-center bg-danger">
            <h5 class="font-weight-normal mb-0 text-white">
               <a class="text-danger mr-3" href="get-started.html"><i class="icofont-rounded-left"></i></a>
               Create an account
            </h5>
            <div class="ml-auto d-flex align-items-center">
               <a class="toggle osahan-toggle h4 m-0 text-white ml-auto" href="#"><i class="icofont-navigation-menu"></i></a>
            </div>
         </div>
         <div class="p-3">
            <form action="otp.php">
               <div class="form-group">
                  <label class="text-muted f-10 mb-1">Username</label>
                  <input type="text" class="form-control" placeholder="Enter Username"  value="Azmal Ansari">
               </div>

               <div class="form-group">
                  <label class="text-muted f-10 mb-1">Mobile Number</label>
                  <input type="number" class="form-control" placeholder="Enter Mobile Number"  value="1234567890">
               </div>

               <div class="form-group">
                  <label class="text-muted f-10 mb-1">Your Email</label>
                  <input type="email" class="form-control" placeholder="Enter Your Email"  value="example@mail.com">
               </div>
               <div class="form-group">
                  <label class="text-muted f-10 mb-1">Password</label>
                  <input type="password" class="form-control" placeholder="Enter Your Password"  value="osahan94">
               </div>
               <div class="form-group">
                  <label class="text-muted f-10 mb-1">Confirm Password</label>
                  <input type="password" class="form-control" placeholder="Enter Your Password"  value="osahan94">
               </div>
               <button type="submit" class="btn btn-danger btn-block osahanbus-btn mb-3 rounded-1 mt-4">CREATE AN ACCOUNT</button>
               <p class="text-muted text-center small">By signing up you agree to our Privacy Policy and Terms.</p>
            </form>
            <div class="sign-or d-flex align-items-center justify-content-center mb-4">
               <hr class="mr-4">
               <p class="text-muted text-center py-2 m-0">OR</p>
               <hr class="ml-4">
            </div>
            <div class="osahan-signin text-center p-1">
               <p class="m-0">Already  a member ? <a href="login.php" class="text-danger ml-2">Sign In</a></p>
            </div>
         </div>
      </div>

      <!-- sidebar -->
      <nav id="main-nav">
         <ul class="second-nav">
            <li>
               <a href="#" class="bg-danger sidebar-user d-flex align-items-center py-4 px-3 border-0 mb-0">
                  <img src="img/user1.jpg" class="img-fluid rounded-pill mr-3">
                  <div class="text-white">
                     <h6 class="mb-0">I Am Osahan</h6>
                     <small>+91 12345-67890</small><br>
                     <span class="f-10 text-white-50">Version 1.32</span>    
                  </div>
               </a>
            </li>
            <li>
               <a href="index-2.html"><i class="icofont-page mr-2"></i> Splash</a>
            </li>
            <li>
               <a href="landing.html"><i class="icofont-stylish-right mr-2"></i> Landing</a>
            </li>
            <li>
               <a href="get-started.html"><i class="icofont-ui-play mr-2"></i> Get Started</a>
            </li>
            <li>
               <a href="#"><i class="icofont-key mr-2"></i> Authentication</a>
               <ul>
                  <li><a href="signin.html">Sign In</a></li>
                  <li><a href="signup.html">Sign Up</a></li>
                  <li><a href="change-password.html">Change Password</a></li>
                  <li><a href="verification.html">Verification</a></li>
               </ul>
            </li>
            <li><a href="home.html"><i class="icofont-ui-home mr-2"></i> Homepage</a></li>
            <li><a href="gift-card.html"><i class="icofont-sale-discount mr-2"></i> Offers</a></li>
            <li><a href="listing.html"><i class="icofont-list mr-2"></i> Listing</a></li>
            <li><a href="bus-details.html"><i class="icofont-file-text mr-2"></i> Bus Detail</a></li>
            <li><a href="select-seat.html"><i class="icofont-check-circled mr-2"></i> Select Seat</a></li>
            <li><a href="payment.html"><i class="icofont-id-card mr-2"></i> Checkout</a></li>
            <li><a href="payment-card.html"><i class="icofont-ui-v-card mr-2"></i> Payment</a></li>
            <li>
               <a href="#"><i class="icofont-user-alt-3 mr-2"></i> Profile Pages</a>
               <ul>
                  <li><a href="profile.html"> Profile</a></li>
                  <li><a href="your-ticket.html"> Your Ticket</a></li>
                  <li><a href="my-ticket.html"> History</a></li>
                  <li><a href="customer-feedback.html">  Customer Feedback</a></li>
               </ul>
            </li>
            <li>
               <a href="#"><i class="icofont-page mr-2"></i> Extra Pages</a>
               <ul>
                  <li><a href="support.html">Support</a></li>
                  <li><a href="notification.html">Notification</a></li>
                  <li><a href="not-available.html">Not Available</a></li>
                  <li><a href="404.html"> Not Found</a></li>
               </ul>
            </li>
            <li>
               <a href="#"><i class="icofont-link mr-2"></i> Navigation Link Example</a>
               <ul>
                  <li>
                     <a href="#">Link Example 1</a>
                     <ul>
                        <li>
                           <a href="#">Link Example 1.1</a>
                           <ul>
                              <li><a href="#">Link</a></li>
                              <li><a href="#">Link</a></li>
                              <li><a href="#">Link</a></li>
                              <li><a href="#">Link</a></li>
                              <li><a href="#">Link</a></li>
                           </ul>
                        </li>
                        <li>
                           <a href="#">Link Example 1.2</a>
                           <ul>
                              <li><a href="#">Link</a></li>
                              <li><a href="#">Link</a></li>
                              <li><a href="#">Link</a></li>
                              <li><a href="#">Link</a></li>
                           </ul>
                        </li>
                     </ul>
                  </li>
                  <li><a href="#">Link Example 2</a></li>
                  <li><a href="#">Link Example 3</a></li>
                  <li><a href="#">Link Example 4</a></li>
                  <li data-nav-custom-content>
                     <div class="custom-message">
                        You can add any custom content to your navigation items. This text is just an example.
                     </div>
                  </li>
               </ul>
            </li>
         </ul>
         <ul class="bottom-nav">
            <li class="email">
               <a class="text-danger nav-item text-center" href="home.html" tabindex="0" role="menuitem">
                  <p class="h5 m-0"><i class="icofont-ui-home text-danger"></i></p>
                  Home
               </a>
            </li>
            <li class="github">
               <a href="gift-card.html" class="nav-item text-center" tabindex="0" role="menuitem">
                  <p class="h5 m-0"><i class="icofont-sale-discount"></i></p>
                  Offer
               </a>
            </li>
            <li class="ko-fi">
               <a href="support.html" class="nav-item text-center" tabindex="0" role="menuitem">
                  <p class="h5 m-0"><i class="icofont-support-faq"></i></p>
                  Help
               </a>
            </li>
         </ul>
      </nav>

      <?php include('include/footer.php'); ?>