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
            <p><span>Status</span> <span>Exit</span></p>
            <p><span>Quantity</span> <span><?=$buysell->quantity ?></span></p>

            <p><span>Exit Price</span> <span id="liveLtpPrice">...</span></p>
            

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



  <!-- bootstrap js -->
 <?php include('include/allscipt.php'); ?>








<script>
    var plpTotal = 0;
    var liveLtpPrice = 0;
  
    
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




   




 





</script>