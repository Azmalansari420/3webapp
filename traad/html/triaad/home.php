<?php include('include/allcss.php'); ?>

  <!-- loader start-->
<?php include('include/loader.php'); ?>

  <!-- side bar start -->
<?php include('include/sidebar.php'); ?>
  
  <!-- side bar end -->

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
          <div class="product-details">
            <div class="product-content">
              <div>
                <h4 style="color:black;">₹ 100520.00</h4>
                <h4 class="product-item">Total Portfolio</h4>
              </div>
            </div>
            <div class="right-panal">
              <div class="price">
                <h4 class="success-color">₹ 0.00</h4>
              </div>
              <h5>Unrealised P&L</h5>
            </div>
          </div>
        </li>
      </ul>

      <ul class="nft-horizontal-content mt-4">
        <li>
          <h6>Available Margin</h6>
        </li>
        <li>
          <h6>₹ 100450.109</h6>
        </li>
      </ul>
      <ul class="nft-horizontal-content mt-2">
        <li>
          <h6>Invested Margin</h6>
        </li>
        <li>
          <h6>₹ 0.00</h6>
        </li>
      </ul>

    </div>
  </section>

  <section class="section-lg-t-space">
    <div class="custom-container">
      <div class="offer-title">
        <img class="img-fluid metamask_fox" src="assets/images/svg/metamask_fox.svg" alt="metamask_fox" />
        <h2>No Open Position</h2>
        <h4>to submit a trade tap on +</h4>
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
 