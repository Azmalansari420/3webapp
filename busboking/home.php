<?php include('include/header.php'); ?>

<style>
   .nav-link {
       display: block;
       padding: .5rem .1rem;
   }
   .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
       color: #fff;
       background-color: #dd3444;
       font-weight: 600;
   }
   .nav-pills .nav-link, .nav-pills .show>.nav-link {
   
       font-size: 10px;
   }
   .form-control {
       border: 1px solid #ced4da !important;
    }
</style>
   <body class="bg-light">
      <!-- verification -->
      <div class="osahan-verification padding-bt">
         <div class="p-3 shadow bg-danger danger-nav osahan-home-header">
            <div class="font-weight-normal mb-0 d-flex align-items-center">
               <img src="img/logo.png" class="img-fluid osahan-nav-logo">
               <div class="ml-auto d-flex align-items-center">
                  <a href="profile.html" class="mr-3"><img src="img/user1.jpg" class="img-fluid rounded-circle"></a>
                  <a class="toggle osahan-toggle h4 m-0 text-white ml-auto" href="#"><i class="icofont-navigation-menu"></i></a>
               </div>
            </div>
         </div>
         <div class="bg-danger px-1 pb-3">
            <div class="bg-white rounded-1 p-2">
               <ul class="nav nav-pills mb-0 nav-justified bg-white  border-top border-bottom" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                     <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="icofont-info-circle"></i> One Way</a>
                  </li>
                   <li class="nav-item" role="presentation">
                     <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="icofont-history"></i> Round Way</a>
                  </li>
                  <li class="nav-item" role="presentation">
                     <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="icofont-star"></i> Airport</a>
                  </li>
                  <li class="nav-item" role="presentation">
                     <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="icofont-star"></i> Local Cab</a>
                  </li>
                 
                  <!-- <li class="nav-item" role="presentation">
                     <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="icofont-star"></i> Railway</a>
                  </li> -->
                 <!--  <li class="nav-item" role="presentation">
                     <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="icofont-star"></i> Tour Package</a>
                  </li> -->
                 
               </ul>
               <div class="tab-content" id="pills-tabContent">
                  <!-- One Way -->
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                     <div class="bg-white rounded-1 p-2">
                        <form action="bus-list.php" class="mt-2">
                           <div class="form-group ">
                              <label for="exampleFormControlSelect1" class=""><span class="icofont-search-map text-danger"></span> Pickup Location</label><br>
                              <select class="js-example-basic-single form-control" name="state">
                                 <option value="Amritsar">Amritsar</option>
                                 <option value="Agra">Agra</option>
                                 <option value="Ahmedabad">Ahmedabad</option>
                                 <option value="Bareilly">Bareilly</option>
                                 <option value="Bathinda">Bathinda</option>
                                 <option value="Bhiwani">Bhiwani</option>
                                 <option value="Chandigarh">Chandigarh</option>
                                 <option value="Delhi">Delhi</option>
                                 <option value="Fatehabad">Fatehabad</option>
                                 <option value="Gurgaon">Gurgaon</option>
                                 <option value="Hissar">Hissar</option>
                                 <option value="Jajpur">Jajpur</option>
                                 <option value="Jodhpur">Jodhpur</option>
                                 <option value="Mumbai">Mumbai</option>
                                 <option value="Nanded">Nanded</option>
                              </select>
                           </div>
                           <div class="form-group">
                              <label for="exampleFormControlSelect1" class=""><span class="icofont-google-map text-danger"></span> Drop Location</label><br>
                              <select class="js-example-basic-single form-control" name="state">
                                 <option value="Amritsar">Amritsar</option>
                                 <option value="Agra">Agra</option>
                                 <option value="Ahmedabad">Ahmedabad</option>
                                 <option value="Bareilly">Bareilly</option>
                                 <option value="Bathinda">Bathinda</option>
                                 <option value="Bhiwani">Bhiwani</option>
                                 <option value="Chandigarh" selected>Chandigarh</option>
                                 <option value="Delhi">Delhi</option>
                                 <option value="Fatehabad">Fatehabad</option>
                                 <option value="Gurgaon">Gurgaon</option>
                                 <option value="Hissar">Hissar</option>
                                 <option value="Jajpur">Jajpur</option>
                                 <option value="Jodhpur">Jodhpur</option>
                                 <option value="Mumbai">Mumbai</option>
                                 <option value="Nanded">Nanded</option>
                              </select>
                           </div>

                           <div class="form-group">
                              <label for="exampleFormControlSelect1" class="mb-2"><span class="icofont-ui-calendar text-danger"></span> Pick Up Date</label><br>
                              <input name="date" class="form-control border-0 p-0" type="date">
                           </div>

                           <div class="form-group">
                              <label for="exampleFormControlSelect1" class="mb-2"><span class="icofont-ui-calendar text-danger"></span> Pick Up Time</label><br>
                              <input name="time" class="form-control border-0 p-0" type="time">
                           </div>

                           <div class="form-group">
                              <label for="exampleFormControlSelect1" class="mb-2"><span class="icofont-ui-calendar text-danger"></span> Mobile</label><br>
                              <input name="number" class="form-control border-0 p-0" type="number">
                           </div>
                           
                           <button type="submit" class="btn btn-danger btn-block osahanbus-btn rounded-1">Search</button>
                        </form>
                     </div>
                  </div>
               </div>



            </div>
         </div>
         <div class="p-3 bg-warning">
            <div class="row m-0">
               <div class="col-6 py-1 pr-1 pl-0">
                  <div class="p-3 bg-white shadow-sm rounded-1">
                     <img class="img-fluid" src="img/safe-vehicles.svg" alt="">
                     <p class="mb-0 mt-4 font-weight-bold">Safe and Hygenic<br>Vehicles</p>
                  </div>
               </div>
               <div class="col-6 py-1 pl-1 pr-0">
                  <div class="p-3 bg-white shadow-sm rounded-1">
                     <img class="img-fluid" src="img/customer-support.svg" alt="">
                     <p class="mb-0 mt-4 font-weight-bold">Best Customer<br>Support</p>
                  </div>
               </div>
               <div class="col-6 py-1 pr-1 pl-0">
                  <div class="p-3 bg-white shadow-sm rounded-1">
                     <img class="img-fluid" src="img/live-tracking.svg" alt="">
                     <p class="mb-0 mt-4 font-weight-bold">Live Track your<br>Journey</p>
                  </div>
               </div>
               <div class="col-6 py-1 pl-1 pr-0">
                  <div class="p-3 bg-white shadow-sm rounded-1">
                     <img class="img-fluid" src="img/verified-drivers.svg" alt="">
                     <p class="mb-0 mt-4 font-weight-bold">Verified Drivers<br>and Vehicles</p>
                  </div>
               </div>
            </div>
         </div>

         <div class="p-3">
            <h6 class="text-center">Bus Discounts For You</h6>
            <div class="row m-0">
               <div class="col-6 py-1 pr-1 pl-0">
                  <a href="bus-list.php">
                  <img class="img-fluid rounded-1 shadow-sm" src="img/offer1.jpg" alt="">
                  </a>
               </div>
               <div class="col-6 py-1 pl-1 pr-0">
                  <a href="bus-list.php">
                  <img class="img-fluid rounded-1 shadow-sm" src="img/offer2.jpg" alt="">
                  </a>
               </div>
               <div class="col-6 py-1 pr-1 pl-0">
                  <a href="bus-list.php">
                  <img class="img-fluid rounded-1 shadow-sm" src="img/offer3.jpg" alt="">
                  </a>
               </div>
               <div class="col-6 py-1 pl-1 pr-0">
                  <a href="bus-list.php">
                  <img class="img-fluid rounded-1 shadow-sm" src="img/offer4.jpg" alt="">
                  </a>
               </div>
            </div>
         </div>
      </div>

      <!-- Footer Fixed -->
        <?php include('include/menu-bar.php'); ?>
      
      <!-- sidebar -->
        <?php include('include/sidebar.php'); ?>
        <?php include('include/footer.php'); ?>