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

              
              

              <?php
                $list = $this->db->get_where("instruments")->result_object();
                foreach ($list as $key => $value) {      
                // print_r($value);          
              ?>
                <div class="accordion-item instrument_key" id="row<?=$value->name ?>" data-instrument_key="<?=$value->instrument_key ?>" >
                  <div class="accordion-header" id="heading1">
                    <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#p1">
                      <div class="nft-horizontal-box d-block">
                        <a href="option-chain" class="product-details d-block select-buy-sell">
                          <div class="product-content w-100">
                            <div>
                              <h4 style="color:black;"><?=$value->name ?></h4>
                              <!-- <h6>NSL_IDX</h6> -->
                            </div>
                            <div>
                              <!-- <h4 class="price">...</h4> -->
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
 