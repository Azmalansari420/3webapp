<?php
 include('include/allcss.php'); ?>

 
    <style>
         
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .call { background-color: #d4edda; } /* Light green */
        .put { background-color: #f8d7da; } /* Light red */
        .highlight { background-color: #ffff99; font-weight: bold; } /* Highlighted row */
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
        <h3 class="middle-title">NSE_EQ|INE090A01021</h3>
        <a href="notification.php">
          <i class="ri-notification-2-line"></i>
        </a>
      </div>
    </div>
  </header>
  <!-- header end -->



  <section class="">
    <div class="custom-container">
      <div class="category-detail-tab">
        
        <div class="tab-content tab w-100" id="pills-tabContent">
          <div class="tab-pane fade show active" id="list" role="tabpanel">
            <div class="accordion theme-accordion" id="optionsContainer" style="overflow: auto;">

                <table>
                    <tr>
                        <th colspan="5">Call Options</th>
                        <th>Strike Price</th>
                        <th colspan="5">Put Options</th>
                    </tr>
                    <tr>
                        <th>Instrument</th>
                        <th>LTP</th>
                        <th>Bid Price</th>
                        <th>Ask Price</th>
                        <th>OI</th>
                        <th>Strike</th>
                        <th>OI</th>
                        <th>Bid Price</th>
                        <th>Ask Price</th>
                        <th>LTP</th>
                        <th>Instrument</th>
                    </tr>
                    <tbody id="optionChainBody"></tbody>
                </table>
              
             
            </div>            
          </div>         
        </div>

      </div>
    </div>
  </section>

 <!--  <section class="section-lg-t-space section-b-space">
    <div class="custom-container d-flex justify-content-between">
      <button class="btn btn-primary">buy</button>
      <button class="btn btn-success">Sale</button>
    </div>
  </section> -->
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

      const optionData = response;
        const tableBody = document.getElementById('optionChainBody');
        const spotPrice = optionData.data[0].underlying_spot_price;
        
        optionData.data.forEach(option => {
            const highlightClass = (option.strike_price === spotPrice) ? 'highlight' : '';
            const row = `<tr class="${highlightClass}">
                <td class="call" onclick="openBuySellPage('${option.call_options.instrument_key}')">${option.call_options.instrument_key}</td>
                <td class="call" onclick="openBuySellPage('${option.call_options.instrument_key}')">${option.call_options.market_data.ltp}</td>
                <td class="call" onclick="openBuySellPage('${option.call_options.instrument_key}')">${option.call_options.market_data.bid_price}</td>
                <td class="call" onclick="openBuySellPage('${option.call_options.instrument_key}')">${option.call_options.market_data.ask_price}</td>
                <td class="call" onclick="openBuySellPage('${option.call_options.instrument_key}')">${option.call_options.market_data.oi}</td>
                <td>${option.strike_price}</td>
                <td class="put" onclick="openBuySellPage('${option.put_options.instrument_key}')">${option.put_options.market_data.oi}</td>
                <td class="put" onclick="openBuySellPage('${option.put_options.instrument_key}')">${option.put_options.market_data.bid_price}</td>
                <td class="put" onclick="openBuySellPage('${option.put_options.instrument_key}')">${option.put_options.market_data.ask_price}</td>
                <td class="put" onclick="openBuySellPage('${option.put_options.instrument_key}')">${option.put_options.market_data.ltp}</td>
                <td class="put" onclick="openBuySellPage('${option.put_options.instrument_key}')">${option.put_options.instrument_key}</td>
            </tr>`;
            tableBody.innerHTML += row;
        });

    });


    function openBuySellPage(instrument, action) {
        // alert(`Opening ${action} page for ${instrument}`);
        window.location.href=`buy-sell?instrument_key=${instrument}`;
    }



 </script> 
 

