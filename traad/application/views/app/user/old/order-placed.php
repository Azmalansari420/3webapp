<?php
 include('include/allcss.php'); ?>

<style>
    body {
        font-family: Arial, sans-serif;
        text-align: center;
        padding: 50px;
        background-color: #f8f9fa;
    }
    .container {
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        margin: auto;
    }
    .icon {
        font-size: 50px;
        color: green;
    }
    h2 {
        color: #333;
    }
    p {
        color: #666;
    }
    .btn {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        color: white;
        background-color: #007bff;
        text-decoration: none;
        border-radius: 5px;
    }
    .btn:hover {
        background-color: #0056b3;
    }
</style>

  <!-- loader start-->
  <?php include('include/loader.php'); ?>

  <?php include('include/sidebar.php'); ?>
  <!-- loader end -->

  <!-- header start -->
  <header class="section-t-space">
    <div class="custom-container">
      <div class="header-panel">
        <button class="sidebar-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft">
          <i class="ri-menu-line"></i>
        </button>
        <h3 class="middle-title"><?=$this->input->get('instrument_key') ?></h3>
        <a href="notification.php">
          <i class="ri-notification-2-line"></i>
        </a>
      </div>
    </div>
  </header>
  <!-- header end -->



  <section class="">
    <div class="custom-container">
        <div class="container">
            <div class="icon">✅</div>
            <h2>Order Placed</h2>
            <p>Thank you for your purchase. Your order has been placed successfully.</p>
            
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


 <!-- <script>
     
     var settings = {
      "url": "https://api.upstox.com/v2/option/chain?instrument_key=NSE_EQ|INE090A01021&expiry_date=2025-04-24",
      "method": "GET",
      "timeout": 0,
      "headers": {
        "Authorization": "Bearer <?=token ?>",
      },
    };

    $.ajax(settings).done(function (response) {
      console.log(response);
    });


 </script> -->
 

