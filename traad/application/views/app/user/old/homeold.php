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
                <h4 class="success-color" >₹ <span id="total">...</span></h4>
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


  <section class="section-lg-t-space section-b-space">
    <div class="custom-container">
      <div class="category-detail-tab">
        <div class="tab-content tab w-100" id="pills-tabContent">
          <div class="tab-pane fade show active" id="list" role="tabpanel">
            <div class="accordion theme-accordion" id="accordion-one">
              <ul class="load-more">
                <!-- load more -->
              </ul>          
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
  $(document).on("click", ".load-more-btn",(function(e) {
        click_btn = $(this);
      load_more();
    }));

    var page = 0;
    var total = 0;
    var wallet = 0;
    var instrument_keys = [];
    var expiry_dates = [];
    function load_more()
    {
        var click_btn = '.load-more-btn';

        $(click_btn).text('Wait..');
        $(click_btn).attr('disabled',true);

        var form = new FormData();
        form.append("page", page); 

        var settings = {
          "url": "<?=base_url() ?>api/position/positionlist",
          "method": "POST",
          "dataType": "json",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": form
        };

        $.ajax(settings).done(function (response) {
          console.log(response);
              total = parseFloat(response.total);
              wallet = parseFloat(response.wallet);

              instrument_keys  = response.instrument_keys
              expiry_dates  = response.expiry_dates
              



              var html = ``;

              $(response.data).each(function(index, item){
                html = html+`

                  <div class="accordion-item">
                      <div class="accordion-header" id="heading1">
                          <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#p1">
                              <div class="nft-horizontal-box d-block">
                                  <a href="option-list.php" class="product-details d-block">
                                      <div class="product-content w-100">
                                          <div>
                                              <h4 style="color: white;">${item.clickable_instumentkey}</h4>
                                          </div>
                                          <div class="counter">${item.strike_price}</div>
                                      </div>
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>

                `;



              });

              $(".load-more").html(html);
              $("#wallet").html(wallet+total);
              $("#total").html(total);

              if(response.status==200)
              {
                




                  $(click_btn).show();
              }
              else
              {
                $(click_btn).hide();
                toaster(response.message, 'success');
              }

              $(instrument_keys).each(function(index, item){
                live_data_fetch(index, item);
              });

          $(click_btn).text('Load More');
          $(click_btn).attr('disabled',false);


        });
    }

    load_more();


    var livestrik_price_total = 0;
    
    function live_data_fetch(index, item)
    {
      $.ajax({
          url: `https://api.upstox.com/v2/option/chain?instrument_key=${instrument_keys[index]}&expiry_date=${expiry_dates[index]}`,
          method: "GET",
          headers: {
              "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJrZXlfaWQiOiJza192MS4wIiwiYWxnIjoiSFMyNTYifQ.eyJzdWIiOiIzQUNXTDYiLCJqdGkiOiI2N2M1MzcyYzllZTZhOTY5NjFhNTlhMjIiLCJpc011bHRpQ2xpZW50IjpmYWxzZSwiaWF0IjoxNzQwOTc3OTY0LCJpc3MiOiJ1ZGFwaS1nYXRld2F5LXNlcnZpY2UiLCJleHAiOjE3NDEwMzkyMDB9.egtO-0Crc0W-rhDB4etj2trMRev-v-4NC9iZkcX-o90"
          },
          success: function(response) {
              console.log("API Response:", response);

              


          },
          error: function(xhr, status, error) {
              console.error("Error fetching data:", error);
          }
      });
    }




    
</script>