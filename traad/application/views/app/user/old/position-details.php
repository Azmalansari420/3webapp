<?php 
$id = $this->input->get('id');
$buysell = $this->db->get_where('buy_sell_transactions',array('id'=>$id,))->result_object();
if(!empty($buysell))
{
	$buysell = $buysell[0];

	$difference = $buysell->sell_strike_price - $buysell->strike_price;
    $percentage_difference = ($difference / $buysell->strike_price) * 100;

    $class = ($difference >= 0) ? "success-color" : "danger-color";
    $difference_text = ($difference >= 0) ? "+$difference" : "$difference";
    $percentage_text = ($percentage_difference >= 0) ? "+".round($percentage_difference, 2) : round($percentage_difference, 2);
}

include('include/allcss.php'); ?>

  <!-- loader start-->
<?php include('include/loader.php'); ?>

  <!-- side bar start -->
<?php include('include/sidebar.php'); ?>
  
<style>
  .theme-accordion .accordion-item .accordion-button::after {
    content: ""!important;
  }

.trade-details {
    color: white;
}

  .profit-loss {
            background: #f1f1f1;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            font-size: 18px;
/*            color: red;*/
            font-weight: bold;
        }
        .trade-details {
            margin-top: 15px;
        }
        .trade-details h3 {
            margin-bottom: 10px;
            font-size: 18px;
        }
        .trade-details p {
            margin: 5px 0;
            font-size: 16px;
            display: flex;
            justify-content: space-between;
            border-bottom: 1px dashed #ddd;
            padding-bottom: 5px;
        }
        .community-link {
            margin-top: 15px;
            text-align: center;
        }
        .community-link a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        a.bottom-btn {
          padding: 10px 40px;
          border-radius: 5px;
      }


           .modal.bottom-sheet {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            margin: 0;
            max-height: 50%;
            border-radius: 15px 15px 0 0;
            overflow: hidden;
        }
        .modal-content {
            border-radius: 15px 15px 0 0;
        }
        .bottom-btn {
            display: block;
            padding: 10px 20px;
            color: white;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }
        ul.list-unstyled {
              display: grid;
        }



        .modal.bottom-sheet {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            margin: 0;
            max-height: 100%;
            border-radius: 15px 15px 0 0;
            overflow: hidden;
        }
        .modal-content {
            border-radius: 15px 15px 0 0;
            padding: 20px;
        }
        .modal-header {
            border-bottom: 1px solid;
            text-align: center;
            justify-content: center;
            padding: 8px;
        }
        .input-box {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f5f5f5;
            color: #999;
            text-align: center;
            outline: none;
        }
        .modal-footer {
            border-top: none;
            justify-content: space-between;
        }
        .modal-footer a {
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
        }


        h5.modal-title>strong {
          color: black !important;
          font-size: 16px;
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


  <section class="">
    <div class="custom-container">
      <div class="profit-loss success-color" style="display: none;" id="total-success">... </div>
      <div class="profit-loss danger-color" style="display:none;" id="total-danger">... </div>
        <div class="trade-details">
            <h3 class="text-center">Trade Details</h3>
            <p><span>Instrument</span> <span><?=$buysell->trade_name ?></span></p>
            <p><span>Status</span> <span>Active</span></p>
            <p><span>Quantity</span> <span><?=$buysell->quantity ?></span></p>

            <?php if($buysell->type==1){ ?>
                <p><span>LTP</span> <span id="liveLtpPrice">...</span></p>
            <?php }else{ ?>
                <p><span>Exit Price</span> <span id="liveLtpPrice">...</span></p>
            <?php } ?>

            <p><span>Entry Price</span> <span><?=currency_simble($buysell->ltp_price) ?></span></p>
            <p><span>Stoploss</span> <span><?php if(!empty($buysell->modify_stoploss))echo currency_simble($buysell->modify_stoploss);else echo'--'; ?></span></p>
            <p><span>Target</span> <span><?php if(!empty($buysell->modify_target))echo currency_simble($buysell->modify_target);else echo'--'; ?></span></p>
            <p><span>Validity Till</span> <span><?=date('d M y, h:i A',strtotime($buysell->trade_close_datetime)) ?></span></p>
            <p><span>Margin Used</span> <span> <?php echo currency_simble($buysell->ltp_price*$buysell->quantity) ?></span></p>
            <!-- <p><span>Est. Charges</span> <span>₹68.34</span></p> -->

            <h3 class="mt-5 text-center mb-3">Order Logs</h3>
            <?php
            $order_log = $this->db->order_by("id desc")->get_where("modify_log",["buy_sell_id"=>$buysell->id,])->result_object();
            foreach ($order_log as $key => $value) {
                
            ?>
                <p><span><?=$value->detail ?></span> <span><?=date('d M y, h:i:s A',strtotime($value->date_time)) ?></span></p>
            <?php } ?>
            
        </div>
        <!-- <div class="community-link">
            <a href="#">View community posts</a>
        </div> -->
    </div>

  </section>

  

  <!-- panel-space start -->
  <section class="panel-space"></section>
  <!-- panel-space end -->

<?php if($buysell->type==1){ ?>
      <!-- bottom navbar start -->
     <div class="navbar-menu">
        <ul style="justify-content: space-evenly;">

          <li  class="">
            <a href="#" data-bs-toggle="modal" data-bs-target="#modal3" class="bottom-btn" style="background: #1c79e1;">Modify</a>
          </li>

          <li class="">
            <button type="button" class="bottom-btn" id="exit-btn" style="background: red;">Exit</button>
          </li>
          
        </ul>
      </div>
      <!-- bottom navbar end -->
<?php } ?>

  <!-- bootstrap js -->
 <?php include('include/allscipt.php'); ?>


 <!-- options model -->
<!-- Bottom Modal -->
<div class="modal fade bottom-sheet" id="modal3" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="text-center">
                <div class="bg-secondary" style="width: 50px; height: 5px; border-radius: 5px; margin: auto;"></div>
            </div>
            <div class="modal-body">
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <a href="#" class="d-flex align-items-center text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#modifytargetModal">
                            <span class="me-3">⚙️</span> 
                            <div>
                                <strong>Modify Target</strong>
                                <p class="mb-0 text-muted">Change target of your trade.</p>
                            </div>
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="#" class="d-flex align-items-center text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#stoplessModal">
                            <span class="me-3">🔲</span> 
                            <div>
                                <strong>Modify Stoploss</strong>
                                <p class="mb-0 text-muted">Change Stoploss of your trade.</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="d-flex align-items-center text-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#extendTimeModal">
                            <span class="me-3">⏳</span> 
                            <div>
                                <strong>Extend Time</strong>
                                <p class="mb-0 text-muted">Change time frame of your trade.</p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>



<!-- Extend Modify modifytargetModal -->
<div class="modal fade" id="modifytargetModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background: black;">
            <div class="modal-body">
                <div class="trade-details">
                  <h3 class="text-center">Modify Target</h3>
                  <p><span>Instrument</span> <span>NIFTY 06MAR25 22050 CE</span></p>
                  <p><span>Current Target</span> <span></span></p>
                  <p><span>Last Trade Price</span> <span>95622</span></p>
                  <input type="number" class="input-box" placeholder="New Target" id="modify-target-value">
              </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="text-primary" data-bs-dismiss="modal">CANCEL</a>
                <button type="button" class="text-primary" id="modify-target-btn">EXTEND</button>
            </div>
        </div>
    </div>
</div>

<!-- Extend Modify Stopleess -->
<div class="modal fade" id="stoplessModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background: black;">
            <div class="modal-body">
                <div class="trade-details">
                  <h3 class="text-center">Modify Stoploss</h3>
                  <p><span>Instrument</span> <span>NIFTY 06MAR25 22050 CE</span></p>
                  <p><span>Current Stoploss</span> <span></span></p>
                  <p><span>Last Trade Price</span> <span>95622</span></p>
                  <input type="number" class="input-box" placeholder="New Stoploss" id="modify-stoploss-value">
              </div>
            </div>
            <div class="modal-footer">
                <a  class="text-primary" data-bs-dismiss="modal">CANCEL</a>
                <button type="button" class="text-primary" id="modify-stoploss-btn">EXTEND</button>
            </div>
        </div>
    </div>
</div>

<!-- Extend Time Modal -->
<div class="modal fade" id="extendTimeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background: black;">
            <div class="modal-body">
                <div class="trade-details">
                  <h3 class="text-center">Extend Time</h3>
                  <p><span>Instrument</span> <span>NIFTY 06MAR25 22050 CE</span></p>
                  <p><span>Current Time</span> <span>3:20 PM 03 March 2025</span></p>
                  <p><span>Add below the number of market days you want to extend your trade.</span></p>
                  <input type="number" class="input-box" placeholder="No. of days to Extend" id="modify-time-value">
              </div>
            </div>
            <div class="modal-footer">
                <a  class="text-primary" data-bs-dismiss="modal">CANCEL</a>
                <button type="button" class="text-primary" id="modify-time-btn">EXTEND</button>
            </div>
        </div>
    </div>
</div>




<script>
    var plpTotal = 0;
    var liveLtpPrice = 0;
  function live_data()
  {
    var lData = [];
    var settings = {
      "url": "https://api.upstox.com/v2/option/chain?instrument_key=<?=$buysell->instrument_key ?>&expiry_date=<?=$buysell->expiry_date ?>",
      "method": "GET",
      "timeout": 0,
      "headers": {
        "Authorization": "Bearer <?=$site_setting[0]->token ?>",
      },
    };

    $.ajax(settings).always(function (response) {
      // console.log(response);

        var newLtpPrice = 0;
        var liveData = response.data;
        var clickable_instumentkey = "<?=$buysell->clickable_instumentkey ?>";
        if(liveData.length>0)
        {
          liveData = liveData;
          if(<?=$buysell->callputtype ?>==1)
          {
            liveLtpPrice = liveData;
            $(liveData).each(function(index2, item2){
              if(item2.call_options.instrument_key==clickable_instumentkey)
              {
                liveLtpPrice = item2.call_options.market_data.ltp
              }
            });
          }
          else
          {
            liveLtpPrice = liveData;
            $(liveData).each(function(index2, item2){
              if(item2.put_options.instrument_key==clickable_instumentkey)
              {
                liveLtpPrice = item2.put_options.market_data.ltp
              }
            });
          }

          var plp = 0;
          // liveLtpPrice = 318.8;
          var difference = liveLtpPrice-<?=$buysell->ltp_price ?>;
          plp = difference*<?=$buysell->quantity ?>;

          plpTotal =plp;
         

        }

          $("#total-success").hide();
          $("#total-danger").hide();
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
        $("#liveLtpPrice").html("₹ "+liveLtpPrice.toFixed(2));

        // console.log(liveLtpPrice)

    });
  }
    <?php if($buysell->type==1){ ?>
        live_data();
        $(document).ready(function() {
          live_data();
          setInterval(live_data, 1000);
        });
    <?php }else{?>
         liveLtpPrice = parseFloat("<?=$buysell->sell_price ?>");
        $("#liveLtpPrice").html("₹ "+liveLtpPrice.toFixed(2));



        
        var plp = 0;
        var difference = liveLtpPrice-<?=$buysell->ltp_price ?>;
        plp = difference*<?=$buysell->quantity ?>;



        $("#total-success").hide();
          $("#total-danger").hide();
        if(plp>0 || plp==0)
        {
          $("#total-success").html('₹ '+plp.toFixed(2));
          $("#total-success").show();
        }
        else
        {
          $("#total-danger").html('₹ '+plp.toFixed(2));      
          $("#total-danger").show();
        }




    <?php } ?>




    $(document).on("click", "#modify-target-btn",(function(e) {
        var value = $("#modify-target-value").val();
        var form = new FormData();
        form.append("id", "<?=$buysell->id ?>");
        form.append("value", value);
        var settings = {
          "url": "<?=base_url() ?>api/position/target",
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
          if(response.status==200)
          {
            toaster(response.message, 'success');            
            location.reload();
          }
          else
          {
            toaster(response.message, 'error');
          }
        });
    }));

    $(document).on("click", "#modify-stoploss-btn",(function(e) {
        var value = $("#modify-stoploss-value").val();
        var form = new FormData();
        form.append("id", "<?=$buysell->id ?>");
        form.append("value", value);
        var settings = {
          "url": "<?=base_url() ?>api/position/stoploss",
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
          if(response.status==200)
          {
            toaster(response.message, 'success');            
            location.reload();
          }
          else
          {
            toaster(response.message, 'error');
          }
        });
    }));

    $(document).on("click", "#modify-time-btn",(function(e) {
        var value = $("#modify-time-value").val();
        var form = new FormData();
        form.append("id", "<?=$buysell->id ?>");
        form.append("value", value);
        var settings = {
          "url": "<?=base_url() ?>api/position/time",
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
          if(response.status==200)
          {
            toaster(response.message, 'success');            
            location.reload();
          }
          else
          {
            toaster(response.message, 'error');
          }
        });
    }));

    $(document).on("click", "#exit-btn",(function(e) {
        
        var form = new FormData();
        form.append("id", "<?=$buysell->id ?>");
        form.append("exit_price", liveLtpPrice);
        form.append("plpTotal", plpTotal);
        var settings = {
          "url": "<?=base_url() ?>api/position/exit",
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
          if(response.status==200)
          {
            toaster(response.message, 'success');            
            location.reload();
          }
          else
          {
            toaster(response.message, 'error');
          }
        });
    }));










</script>