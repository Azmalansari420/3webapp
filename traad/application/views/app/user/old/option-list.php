<?php
$instrument_key = $this->input->get('instrument_key');
$expirey_key = $this->input->get('expirey_key');


 include('include/allcss.php'); 


?>

 
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #fff;
            text-align: center;
        }
        .header {
            background: #1e1e1e;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 5px;
            border: 1px solid #333;
            text-align: center;
        }
        th {
            background-color: #222;
        }
        .negative {
            color: #ff4c4c;
        }
        .positive {
            color: #4caf50;
        }
        .highlight {
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
        }
        .header {
            background: #1e1e1e;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header select, .header button {
            background: #333;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .dropdown {
            display: flex;
            gap: 10px;
        }
        .negative {
            color: #ff4c4c !important;
        }
        .positive {
            color: #4caf50 !important;
        }
        .ltp-button {
            background: #888;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: not-allowed;
        }
        .market-price-row {
    background-color: transparent;
    text-align: center;
}

.market-price-box {
    background-color: #007bff;
    color: white;
    font-weight: bold;
    padding: 0px 7px;
    border-radius: 9px;
/*    border-radius: 15px;*/
    display: inline-block;
}

.market-price-box {
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 14px;
    padding: 0px;
    color: #fff;
}

.market-price-box .line {
    flex-grow: 1;
    height: 1px;
    background-color: #ffffff; /* Change color if needed */
    margin: 0 10px;
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
        <h3 class="middle-title text-white">Option List</h3>
        <a href="notification.php">
          <i class="ri-notification-2-line"></i>
        </a>
      </div>
    </div>
  </header>
  <!-- header end -->



<section class="">
    <div class="custom-container">
        <div class="header">
            <div class="dropdown text-center">
                <!-- <label for="index">Index</label> -->
                <select id="instrument_key">
                    <?php
                    $instruments = $this->db->get_where('instruments',array('status'=>1))->result_object();
                    foreach ($instruments as $key => $data) 
                      { ?>
                    <option value="<?=$data->instrument_key ?>" <?php if($instrument_key==$data->instrument_key) echo "selected"; ?>><?=$data->name ?></option>
                    <?php } ?>
                </select>
            </div>
            
        </div>

        <div class="header">
            <input type="date"  id="expiry_date" value="<?=$expirey_key ?>">
          
            <button id="fetchData">Fetch Data</button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Call LTP (Chng%)</th>
                    <th>Strike</th>
                    <th>Put LTP (Chng%)</th>
                </tr>
            </thead>
            <tbody id="optionChainBody">
                <tr>
                    <td colspan="3">Select index and expiry date, then click "Fetch Data".</td>
                </tr>
            </tbody>
        </table>
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
    var instrument_key = '';
    var expDate = '';

function fetchOptionChain() 
{

    expDate = $("#expiry_date").val();
    instrument_key = $("#instrument_key").val();

            $.ajax({
                url: "https://api.upstox.com/v2/option/chain?instrument_key="+instrument_key+"&expiry_date="+expDate,
                method: "GET",
                headers: {
                    "Authorization": "Bearer <?=$site_setting[0]->token ?>"
                },
                success: function(response) {
                    console.log("API Response:", response);

                    if (response && response.status === "success" && Array.isArray(response.data)) {
                        updateTable(response.data);
                    } else {
                        console.error("Invalid response format", response);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching data:", error);
                }
            });
        }

        function updateTable(data) 
        {
            const tbody = $("#optionChainBody");
            tbody.empty();

            // Fetch current market price from API response
            const marketPrice = data[0]?.underlying_spot_price || 0;
            console.log("Current Market Price:", marketPrice);

            // Sort data based on strike price
            data.sort((a, b) => a.strike_price - b.strike_price);

            let marketRowInserted = false;

            data.forEach((option, index) => 
            {

                const strikePrice = option.strike_price || "-"; 
                const expiry = option.expiry || "-"; 

                const ceLTP = option.call_options?.market_data?.ltp || 0;
                const ceClosePrice = option.call_options?.market_data?.close_price || 1; 
                // const ceChange = ((ceLTP - ceClosePrice) / ceClosePrice * 100).toFixed(2); 
                const ceChange = ceClosePrice !== 0 ? ((ceLTP - ceClosePrice) / ceClosePrice * 100).toFixed(2) : "0.00";


                const call_instumentkey = option.call_options?.instrument_key; 

                const peLTP = option.put_options?.market_data?.ltp || 0;
                const peClosePrice = option.put_options?.market_data?.close_price || 1;
                const peChange = peClosePrice !== 0 ? ((peLTP - peClosePrice) / peClosePrice * 100).toFixed(2) : "0.00";
                // const peLTP = option.put_options?.market_data?.ltp || "0.00"; 
                // const peClosePrice = option.put_options?.market_data?.close_price || 1; 
                // const peChange = ((peLTP - peClosePrice) / peClosePrice * 100).toFixed(2);
 

                const getbid_qty = option.put_options?.market_data?.bid_qty || "0.00"; 
                const callgetbid_qty = option.call_options?.market_data?.bid_qty || "0.00"; 
                const put_instumentkey = option.put_options?.instrument_key; 

                // Market price row insertion logic
                if (!marketRowInserted && marketPrice < strikePrice) {
                    tbody.append(`
                        <tr class="market-price-row">
                            <td colspan="3">
                                <div class="market-price-box">
                                    <span class="line"></span>
                                     ${marketPrice.toFixed(2)}
                                    <span class="line"></span>
                                </div>
                            </td>
                        </tr>
                    `);
                    marketRowInserted = true;
                }

                const ceColor = ceChange >= 0 ? "green" : "red";
                const peColor = peChange >= 0 ? "green" : "red";

                const row = `
                    <tr>
                        <td><a style="color:white;" href="buy-sell.php?instrument_key=${instrument_key}&clickable_instumentkey=${call_instumentkey}&type=1&strike_price=${strikePrice}&bid_quantity=${getbid_qty}&expiry=${expiry}&ltp_price=${ceLTP}">
                            <span>${ceLTP} <span style="color:${ceColor}">(${ceChange}%)</span></span></a> 
                        </td>
                        <td><strong>${strikePrice}</strong></td>
                        <td><a style="color:white;" href="buy-sell.php?instrument_key=${instrument_key}&clickable_instumentkey=${put_instumentkey}&type=2&strike_price=${strikePrice}&bid_quantity=${callgetbid_qty}&expiry=${expiry}&ltp_price=${peLTP}">
                            <span>${peLTP} <span style="color:${peColor}">(${peChange}%)</span></span></a> 
                        </td>
                    </tr>
                `;
                tbody.append(row);
            });

            // If market price is higher than all strikes, append at the end
            if (!marketRowInserted) {
                tbody.append(`
                    <tr class="market-price-row">
                        <td colspan="3">
                            <div class="market-price-box">
                                <span class="line"></span>
                                 ${marketPrice.toFixed(2)}
                                <span class="line"></span>
                            </div>
                        </td>
                    </tr>
                `);
            }
        }


        $(document).ready(function() {
            fetchOptionChain();
            setInterval(fetchOptionChain, 1000);
        });





    



 



 </script> 
 

