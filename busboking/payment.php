  <?php include('include/header.php'); ?>

   <body class="bg-light">
      <!-- Payment -->
      <div class="payment padding-bt">
         <div class="osahan-header-nav shadow-sm p-3 d-flex align-items-center bg-danger">
            <h5 class="font-weight-normal mb-0 text-white">
               <a class="text-danger mr-3" href="select-seat.html"><i class="icofont-rounded-left"></i></a>
               Payment
            </h5>
            <div class="ml-auto d-flex align-items-center">
               <a class="toggle osahan-toggle h4 m-0 text-white ml-auto" href="#"><i class="icofont-navigation-menu"></i></a>
            </div>
         </div>
         <!-- You Ticket -->
         <div class="your-ticket pt-2">
            <div class="p-3">
               <div class="bg-white rounded-1 shadow-sm p-2 mb-2">
                  <div class="row mx-0 px-1">
                     <div class="col-6 p-0">
                        <small class="text-muted mb-1 f-10 pr-1">GOING FROM</small>
                        <p class="small mb-0"> LUDHIANA</p>
                     </div>
                     <div class="col-6 p-0">
                        <small class="text-muted mb-1 f-10 pr-1">GOING TO</small>
                        <p class="small mb-0"> GOA</p>
                     </div>
                  </div>
               </div>
               <div class="bg-white rounded-1 shadow-sm p-2 mb-2 w-100">
                  <div class="row mx-0 px-1">
                     <div class="col-12 p-0 mb-2">
                        <small class="text-danger mb-1 f-10 pr-1">PICKUP FROM</small>
                        <p class="small mb-0 l-hght-14"> Model Towm, Ludhiana - 8:15 PM</p>
                     </div>
                     <div class="col-12 p-0">
                        <small class="text-danger mb-1 f-10 pr-1">DROPPING AT</small>
                        <p class="small mb-0 l-hght-14">Goa Mall Road - 7: 00 AM</p>
                     </div>
                  </div>
               </div>
               <div class="seat-no small pb-2">
                  <div class="voucher-code">
                     <div class="input-group border-0 shadow-sm bg-white rounded-1">
                        <input type="text" class="form-control small form-controlsm border-0 rounded-1" id="inlineFormInputGroup" placeholder="Enter Voucher Code">
                        <div class="input-group-prepend m-1">
                           <div class="rounded-1 small rounded btn btn-sm btn-danger inpt-group-text shadow-sm text-white border-0">Apply</div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="list_item d-flex col-12 m-0 p-3 bg-white shadow-sm rounded-1 shadow-sm">
                  <div class="d-flex w-100">
                     <div class="bus_details w-100">
                        <p class="mb-2 l-hght-18 font-weight-bold">Traveller’s Info.</p>
                        <div class="l-hght-10 d-flex align-items-center my-2">
                           <small class="text-muted mb-0 pr-1">Passenger</small>
                           <p class="small mb-0 ml-auto l-hght-14"> Joan Rase</p>
                        </div>
                        <div class="l-hght-10 d-flex align-items-center my-2">
                           <small class="text-muted mb-0 pr-1">Ticket Number</small>
                           <p class="small mb-0 ml-auto l-hght-14"> 1313</p>
                        </div>
                        <div class="l-hght-10 d-flex align-items-center my-2">
                           <small class="text-muted mb-0 pr-1">Seat No</small>
                           <p class="small mb-0 ml-auto l-hght-14"> C1 - C2 - C3</p>
                        </div>
                        <div class="l-hght-10 d-flex align-items-center mt-3">
                           <p class="mb-0 pr-1 font-weight-bold">Amount Paid</p>
                           <p class="mb-0 ml-auto l-hght-14 text-danger font-weight-bold">$700</p>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Select Payment -->
               <div class="payment-borrad shadow-sm bg-white mt-2 rounded-1">
                  <div class="border-bottom p-3">
                     <div class="w-100 mastercard custom-control custom-radio custom-control-inline mr-0">
                        <input type="radio" id="customRadiomaster1" name="customRadiocard1" class="custom-control-input" checked>
                        <label class="custom-control-label small w-100" for="customRadiomaster1">
                           <a href="#!" class="d-flex align-items-start">
                              <div class="">
                                 <p class="mb-0 text-dark">Razorpay</p>
                                 <small class="text-muted">Pay from mastercard account using mastercard payment gateway</small>
                              </div>
                              <img src="img/master.png" class="img-fluid rounded ml-auto">
                           </a>
                        </label>
                     </div>
                  </div>
                  <div class="p-3">
                     <div class="w-100 visa custom-control custom-radio custom-control-inline mr-0">
                        <input type="radio" id="customRadiovisa1" name="customRadiocard1" class="custom-control-input">
                        <label class="custom-control-label small w-100" for="customRadiovisa1">
                           <a href="#!" class="d-flex align-items-start">
                              <div class="">
                                 <p class="mb-0 text-dark">Phonepay</p>
                                 <small class="text-muted">Pay from visa account using visa payment gateway</small>
                              </div>
                              <img src="img/visa.png" class="img-fluid rounded ml-auto">
                           </a>
                        </label>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Select Seat -->
         </div>
      </div>
      <div class="fixed-bottom view-seatbt p-3">
         <a href="#!" class="btn btn-danger btn-block d-flex align-items-center osahanbus-btn rounded-1">
         <span class="text-left l-hght-14">
         TOTAL $700<br>
         <small class="f-10 text-white-50">Seats Selected : 3</small>
         </span>
         <span class="font-weight-bold ml-auto">CONFIRM</span>
         </a>
      </div>


      <?php include('include/sidebar.php'); ?>
      
  <?php include('include/footer.php'); ?>