<?php 
$this->db->order_by('id desc');
$buysell = $this->db->get_where('buy_sell_transactions',array('user_id'=>$full_detail->id,'status'=>1,))->result_object();

include('include/allcss.php'); ?>

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
          <div class="product-details">
            <div class="product-content">
              <div>
                <h4 style="color:white;">₹ <span id="wallet">...</span></h4>
                <h4 class="product-item">Total Portfolio</h4>
              </div>
            </div>
            <div class="right-panal">
              <div class="price">
                <h4 class="success-color" > <span id="total-success">...</span></h4>
                <h4 class="danger-color" > <span id="total-danger">...</span></h4>
              </div>
              <h5>Unrealised P&L</h5>
            </div>
          </div>
        </li>
      </ul>

     <!--  <ul class="nft-horizontal-content mt-4">
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
              
              $buysell = [];
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
                      <a href="position-details.php?id=<?=$data->id ?>" class="product-details d-block">
                        <div class="product-content w-100">
                          <div>
                            <h4><?=$data->clickable_instumentkey ?></h4>
                            <h6><?=$data->quantity ?> Qty. <?=validate_status($data->validate_status) ?></h6>
                          </div>
                          <div>
                            <!-- <h4><?=currency_simble($data->strike_price) ?></h4> -->

                            <h6 class="<?= $class; ?>"><?= currency_simble($difference_text); ?> </h6>

                            <h6 class="<?= $class; ?>">(<?= $percentage_text; ?>%)</h6>

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



 <!--  <section class="section-lg-t-space">
    <div class="custom-container">
      <div class="offer-title">
        <img class="img-fluid metamask_fox" src="<?=base_url() ?>assets/images/svg/metamask_fox.svg" alt="metamask_fox" />
        <h2>No Open Position</h2>
        <h4>to submit a trade tap on +</h4>
      </div>
    </div>
  </section> -->






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
    "url": "<?=base_url() ?>api/home/list",
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

    // $("#wallet").html(wallet_amount);

    if(response.data.length<1)
    {
      $("#accordion-one").html(`<h1 style="opacity: 0.5;color: white;text-align: center;font-weight: 900 !important;font-size: 35px;
    display: block;margin-bottom: 10px;"><i class="ri-timer-line" style="font-size: 42px;display: block;margin-bottom: 10px;"></i>No Open Positions</h1>`);
      return false;
    }

    $(response.data).each(function (index, item) {
      var ltp_price = item.ltp_price;

      // Create a Promise for the live_data API call
      var liveDataPromise = new Promise((resolve, reject) => {
        var settings = {
          "url": `https://api.upstox.com/v2/option/chain?instrument_key=${item.instrument_key}&expiry_date=${item.expiry_date}`,
          "method": "GET",
          "timeout": 0,
          "headers": {
            "Authorization": "Bearer <?=$site_setting[0]->token ?>",
          },
        };

        $.ajax(settings)
          .done(function (response) {
            // console.log("Live Data Response:", response);
            resolve(response); // Resolve the promise with the response
          })
          .fail(function (error) {
            console.error("API Error:", error);
            reject(error); // Reject if API call fails
          });
      });

      // Store the Promise in the array
      promises.push(
        liveDataPromise.then((liveData) => {

            var liveLtpPrice = 0;
            var newLtpPrice = 0;
            var liveData = liveData.data;
            var clickable_instumentkey = item.clickable_instumentkey;
            if(liveData.length>0)
            {
              liveData = liveData;
              if(item.callputtype==1)
              {
                var liveLtpPrice = liveData;
                $(liveData).each(function(index2, item2){
                  if(item2.call_options.instrument_key==clickable_instumentkey)
                  {
                    liveLtpPrice = item2.call_options.market_data.ltp
                  }
                });
              }
              else
              {
                var liveLtpPrice = liveData;
                $(liveData).each(function(index2, item2){
                  if(item2.put_options.instrument_key==clickable_instumentkey)
                  {
                    liveLtpPrice = item2.put_options.market_data.ltp
                  }
                });
              }
              var plp = 0;
              // liveLtpPrice = 318.8;
              var difference = liveLtpPrice-item.ltp_price;
              plp = difference*item.quantity;

              if(item.status==1) plpTotal+=plp;

            }

            if(item.type==1) status = 'Active';
            else status = 'Pending';

          html += `
            <div class="accordion-item">
                <div class="accordion-header" id="heading1">
                  <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#p1">
                    <div class="nft-horizontal-box d-block">
                      <a href="position-details.php?id=${item.id}" class="product-details d-block">
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
                              <span style="font-size:10px">LTP: ${liveLtpPrice}</span><br>
                              <span>${status}</span>
                              
                            </h6>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
          `;
        })
      );
    });

    // Wait for all API calls to complete
    await Promise.all(promises);

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

// list();

$(document).ready(function() {
  list();
  setInterval(list, 1000);
});



  // function live_data(instrument_key, expiry_date)
  // {
  //   var lData = [];
  //   var settings = {
  //     "url": "https://api.upstox.com/v2/option/chain?instrument_key="+instrument_key+"&expiry_date="+expiry_date,
  //     "method": "GET",
  //     "timeout": 0,
  //     "headers": {
  //       "Authorization": "Bearer <?=$site_setting[0]->token ?>",
  //     },
  //   };

  //   $.ajax(settings).always(function (response) {
  //     // console.log(response);
  //   });
  // }




</script>
