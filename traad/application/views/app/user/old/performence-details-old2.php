<?php 
$id = $this->input->get('id');
$buysell = $this->db->get_where('buy_sell_transactions',array('id'=>$id,))->result_object();
if(!empty($buysell))
{
	$buysell = $buysell[0];

	$difference = $buysell->sell_strike_price - $buysell->ltp_price;
    $percentage_difference = ($difference / $buysell->ltp_price) * 100;

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
      <div class="profit-loss <?= $class; ?>"><?= currency_simble($difference_text); ?> (<?= $percentage_text; ?>%)</div>
        <div class="trade-details">
            <h3 class="text-center">Trade Details</h3>
            <p><span>Instrument</span> <span><?=$buysell->clickable_instumentkey ?></span></p>
            <p><span>Status</span> <span><?=validate_status($buysell->validate_status) ?></span></p>
            <p><span>Quantity</span> <span><?=$buysell->quantity ?></span></p>
            <p><span>Exit Price</span> <span><?=currency_simble($buysell->sell_strike_price) ?></span></p>
            <p><span>Entry Price</span> <span><?=currency_simble($buysell->ltp_price) ?></span></p>
            <p><span>Stoploss</span> <span>--</span></p>
            <p><span>Target</span> <span>--</span></p>
            <p><span>Validity Till</span> <span><?=date('d M y, h:i A',strtotime($buysell->trade_close_datetime)) ?></span></p>
            <p><span>Margin Used</span> <span> <?php echo $buysell->ltp_price*$buysell->quantity ?></span></p>
            <!-- <p><span>Est. Charges</span> <span>₹68.34</span></p> -->

            <h3 class="mt-5 text-center mb-3">Order Logs</h3>
            <p><span>[Buy] Trade Placed<br>Price:- <?=currency_simble($buysell->ltp_price) ?></span> <span><?=date('d M y, h:i:s A',strtotime($buysell->addeddate)) ?></span></p>
            <p><span>[Sell] Trade Closed<br>Price:- <?=currency_simble($buysell->sell_strike_price) ?></span> <span><?=date('d M y, h:i:s A',strtotime($buysell->trade_close_datetime)) ?></span></p>
        </div>
        <!-- <div class="community-link">
            <a href="#">View community posts</a>
        </div> -->
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
 