<?php 
$this->db->order_by('id desc');
$buysell = $this->db->get_where('buy_sell_transactions',array('user_id'=>$full_detail->id,'status'=>1,"type"=>2,))->result_object();

include('include/allcss.php'); ?>

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
        <img class="img-fluid logo" src="<?=base_url() ?>assets/logo1.png" alt="nfty-logo" />
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
                <h4 class="success-color" > <span id="total-success">...</span></h4>
                <h4 class="danger-color" > <span id="total-danger">...</span></h4>
                <h4>Net P&L</h4>
              </div>
            </div>
            
          </div>
        </li>
      </ul>

      

      <!-- <ul class="nft-horizontal-content mt-2">
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
      </ul> -->

    </div>
  </section>

  <section class="">
    <div class="custom-container">
      <div class="category-detail-tab">
        
        <div class="tab-content tab w-100" id="pills-tabContent">
          <div class="tab-pane fade show active" id="list" role="tabpanel">
            <div class="accordion theme-accordion" id="accordion-one">

              <?php
              
              foreach ($buysell as $key => $data) 
                {

                  $difference = $data->sell_strike_price - $data->ltp_price;
                  $percentage_difference = ($difference / $data->ltp_price) * 100;

                  $class = ($difference >= 0) ? "success-color" : "danger-color";
                  $difference_text = ($difference >= 0) ? "+$difference" : "$difference";
                  $percentage_text = ($percentage_difference >= 0) ? "+".round($percentage_difference, 2) : round($percentage_difference, 2);


                 ?>
              <div class="accordion-item">
                <div class="accordion-header" id="heading1">
                  <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#p1">
                    <div class="nft-horizontal-box d-block">
                      <a href="performence-details.php?id=<?=$data->id ?>" class="product-details d-block">
                        <div class="product-content w-100">
                          <div>
                            <h4><?=$data->trade_name ?></h4>
                            <h6><?=$data->quantity ?> Qty. <?=validate_status($data->validate_status) ?></h6>
                          </div>
                          <div>
                            <!-- <h4><?=currency_simble($data->strike_price) ?></h4> -->

                            <h6 class="<?= $class; ?>"><?= currency_simble($difference_text); ?> </h6>


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

  

  <!-- panel-space start -->
  <section class="panel-space"></section>
  <!-- panel-space end -->

  <!-- bottom navbar start -->
 <?php include('include/bootom-menu.php'); ?>
  <!-- bottom navbar end -->

  <!-- bootstrap js -->
 <?php include('include/allscipt.php'); ?>
 


 <script>
  function list() {

    var form = new FormData();
    var settings = {
      "url": "<?=base_url() ?>api/home/performance",
      "method": "POST",
      "dataType": "json",
      "timeout": 0,
      "processData": false,
      "mimeType": "multipart/form-data",
      "contentType": false,
      "data": form
    };

    $.ajax(settings).done(async function (response) {
      console.log(response);
      
      var html = ``;
      var plpTotal = 0;
      var promises = [];
      var wallet_amount = response.wallet_amount;


      $(response.data).each(function(index, item){

        var plp = 0;
        var difference = item.sell_price-item.ltp_price;
        plp = difference*item.quantity;

        plpTotal+=plp;

        html += `
            <div class="accordion-item">
                <div class="accordion-header" id="heading1">
                  <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#p1">
                    <div class="nft-horizontal-box d-block">
                      <a href="performence-details.php?id=${item.id}" class="product-details d-block">
                        <div class="product-content w-100">
                          <div>
                            <h4>${item.trade_name}</h4>
                            <h6>${item.quantity} Qty. <br>Avg. ${item.ltp_price}</h6>
                          </div>
                          <div>`;
                            if(plp>0 || plp==0)
                            html+=`<h6 class="success-color">₹ ${plp.toFixed(2)}</h6>`;
                            else
                            html+=`<h6 class="danger-color">₹ ${plp.toFixed(2)}</h6>`;

                            html+=`<h6 class="sdanger-color">
                              <span style="font-size:10px">LTP: ${item.sell_price}</span>
                              
                            </h6>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
          `;
      });



      
      // Update the HTML content after all promises are resolved
      $("#total-danger, #total-success").hide();
      if(plpTotal>0 || plpTotal==0)
      {
        $("#total-success").html('₹ '+plpTotal.toFixed(2));
        $("#total-success").show();
      }
      else
      {
        $("#total-danger").html('₹ '+plpTotal.toFixed(2));      
        $("#total-danger").show();
      }
      $("#wallet").html((parseFloat(wallet_amount)+plpTotal).toFixed(2));
      $("#accordion-one").html(html);
    });
  }

list();

 </script>