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
  .sidebar-btn {
      background: white;
        border-radius: 50%;
        color: black;
        font-size: 23px;
        width: 42px;
        height: 42px;
    }
    header .head-content {
      justify-content: space-between;
    }
    header .head-content a {
        margin-left: unset;
    }
    .header-top-desc{
      background: linear-gradient(to bottom, #222, #111);
/*      padding: 10px 20px;*/
      border-radius: 25px;
      color: white;
      box-shadow: 0px 4px 6px rgba(255, 255, 255, 0.1);
    }
    header .head-content {
      margin-bottom: 0px;
  }

  header .head-content a i {
      background: no-repeat;
      font-size: 27px;
  }
</style>

  <!-- header start -->
  <header class="section-t-space header-top-desc">
    <div class="custom-container">
      <div class="head-content">
        <button class="sidebar-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft">
          <i class="ri-user-fill"></i>
        </button>
        
        <div>
          <h2 style="color:white;text-align: center;">Watchlist</h2>
        </div>

        <a href="notification.php">
          <i class="ri-notification-2-fill"></i>
        </a>
      </div>
    </div>
  </header>
  <!-- header end -->

  <!-- Statistics starts -->
  <section class="section-lg-t-space section-b-space">
    <div class="custom-container">

      <h2 style="color:white;margin-top: 50px;text-align: center;">COMING SOON</h2>

      <!-- <div class="category-detail-tab">
        
        <div class="tab-content tab w-100" id="pills-tabContent">
                 

          <div class="tab-pane fade show active" id="list" role="tabpanel">
            <div class="accordion theme-accordion" id="accordion-one">

              
              

              <?php
                $list = $this->db->get_where("instruments")->result_object();
                foreach ($list as $key => $value) {                
              ?>
                <div class="accordion-item instrument_key" id="row<?=$value->name ?>" data-instrument_key="<?=$value->instrument_key ?>" >
                  <div class="accordion-header" id="heading1">
                    <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#p1">
                      <div class="nft-horizontal-box d-block">
                        <a href="option-chain" class="product-details d-block select-buy-sell">
                          <div class="product-content w-100">
                            <div>
                              <h4 style="color:black;"><?=$value->name ?></h4>
                            </div>
                            <div>
                              <h6 class="success-color"><?=$value->instrument_key ?></h6>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>




            
            </div>
            
          </div>

         
        </div>
      </div> -->
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





 <script>


  var list = $(".instrument_key");

  $(list).each(function(index, item){
    var instrument_key = $(item).data('instrument_key');
    var rowId = $(item).attr('id');
     var settings = {
    "url": "https://api.upstox.com/v2/option/chain?instrument_key=NSE_EQ|INE090A01021&expiry_date=2025-04-24",
    "method": "GET",
    "timeout": 0,
    "headers": {
      "Authorization": "Bearer <?=token ?>",
    },
  };
  $.ajax(settings).always(function (response) {
    if(response.data.length>0)
    {
      var underlying_spot_price = response.data[0].underlying_spot_price;
      $("#"+rowId+" .price").html(underlying_spot_price);
    }
  });

  });


 </script>
 