<?php include('include/allcss.php'); ?>

  <!-- loader start-->
  <?php include('include/loader.php'); ?>

  <?php include('include/sidebar.php'); ?>
  <!-- loader end -->

<style>
  .theme-accordion .accordion-item .accordion-button::after 
  {
    content: " "!important;
  }
</style>

  <!-- header start -->
  <header class="section-t-space">
    <div class="custom-container">
      <div class="header-panel">
        <button class="sidebar-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft">
          <i class="ri-menu-line"></i>
        </button>
        <h3 class="middle-title">Watchlist</h3>
        <a href="notification.php">
          <i class="ri-notification-2-line"></i>
        </a>
      </div>
    </div>
  </header>
  <!-- header end -->

  <!-- Statistics starts -->
  <section class="section-lg-t-space section-b-space">
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
  <!-- Statistics end -->

 

  <!-- panel-space start -->
  <section class="panel-space"></section>
  <!-- panel-space end -->

  <!-- bottom navbar start -->
 <?php include('include/bootom-menu.php'); ?>
  <!-- bottom navbar end -->

  <!-- bootstrap js -->
 <?php include('include/allscipt.php'); ?>
 