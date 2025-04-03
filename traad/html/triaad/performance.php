<?php include('include/allcss.php'); ?>

  <!-- loader start-->
<?php include('include/loader.php'); ?>

  <!-- side bar start -->
<?php include('include/sidebar.php'); ?>
  
<style>
  .theme-accordion .accordion-item .accordion-button::after {
    content: ""!important;
  }
</style>

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

   <section class="section-t-space section-lg-b-space">
    <div class="custom-container">
      <ul class="order-listing">
        <li>
          <div class="product-details" style="justify-content: center!important;">
            <div class="product-content">
              <div style="text-align: center;">
                <h4 class="success-color">₹ 100520.00 (2.98%) </h4>
                <h4>Net P&L</h4>
              </div>
            </div>
            
          </div>
        </li>
      </ul>

      <ul class="nft-horizontal-content mt-4">
        <li>
          <h6>Realised P&L</h6>
        </li>
        <li>
          <h6 class="success-color">₹ 32,260.109</h6>
        </li>
      </ul>
      <ul class="nft-horizontal-content mt-2">
        <li>
          <h6>Unrealised Margin</h6>
        </li>
        <li>
          <h6 class="success-color">₹ 0.00</h6>
        </li>
      </ul>
      <ul class="nft-horizontal-content mt-2">
        <li>
          <h6>Est Charges</h6>
        </li>
        <li>
          <h6>₹ 2471.99</h6>
        </li>
      </ul>

    </div>
  </section>

  <section class="">
    <div class="custom-container">
      <div class="category-detail-tab">
        
        <div class="tab-content tab w-100" id="pills-tabContent">
          <div class="tab-pane fade show active" id="list" role="tabpanel">
            <div class="accordion theme-accordion" id="accordion-one">
              <div class="accordion-item">
                <div class="accordion-header" id="heading1">
                  <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#p1">
                    <div class="nft-horizontal-box d-block">
                      <a href="" class="product-details d-block">
                        <div class="product-content w-100">
                          <div>
                            <h4>NIFTY BANK</h4>
                            <h6>NSL_IDX</h6>
                          </div>
                          <div>
                            <h4>5124.15</h4>
                            <h6 class="success-color">+521.95 (+1.03%)</h6>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <div class="accordion-header" id="heading1">
                  <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#p1">
                    <div class="nft-horizontal-box d-block">
                      <a href="" class="product-details d-block">
                        <div class="product-content w-100">
                          <div>
                            <h4>TATAMOTOR</h4>
                            <h6>NSE</h6>
                          </div>
                          <div>
                            <h4>722.15</h4>
                            <h6 class="danger-color">+521.95 (+1.03%)</h6>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <div class="accordion-header" id="heading1">
                  <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#p1">
                    <div class="nft-horizontal-box d-block">
                      <a href="" class="product-details d-block">
                        <div class="product-content w-100">
                          <div>
                            <h4>RELIANCE</h4>
                            <h6>NSE</h6>
                          </div>
                          <div>
                            <h4>1222.15</h4>
                            <h6 class="success-color">+21.95 (+1.20%)</h6>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <div class="accordion-header" id="heading1">
                  <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#p1">
                    <div class="nft-horizontal-box d-block">
                      <a href="" class="product-details d-block">
                        <div class="product-content w-100">
                          <div>
                            <h4>HDFCBANK</h4>
                            <h6>NSE</h6>
                          </div>
                          <div>
                            <h4>1722.15</h4>
                            <h6 class="success-color">+28.95 (+1.03%)</h6>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>             
            </div>            
          </div>         
        </div>

      </div>
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
 