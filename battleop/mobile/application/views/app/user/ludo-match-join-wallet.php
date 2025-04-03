
<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php include('include/allcss.php'); ?>
</head>
<body class='sc5 dark'>
    <!-- preloader area start -->
    <?php include('include/loader.php'); ?>
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>
<style>
    .single-page-area .title-area {
        padding: 16px 20px 22px;
    }
    .deposite-boxs
    {
        display: flex;
        justify-content: space-between;
            padding: 10px 5px;
    }
    .deposite-sec {
        padding: 12px 15px;
    }
    .deposite-sec {
        padding: 4px 25px;
        border: 2px solid white;
        text-align: center;
        border-radius: 10px;
    }
    .header-wrap {
        background: #ffffff!important;
        border-radius: 0!important;
        padding: 110px 0px!important;
    }
</style>
    
    <div class="single-page-area">
        <div class="title-area">
            <a class="btn back-page-btn"><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4">Joinning Match</h3>
        </div>
        <div class="container">
            <div class="wallet-ballance-card deposite-boxs">
                <div class="deposite-sec">
                    Deposited<br>
                    <span><img src="<?=base_url() ?>assets/coin.png" style="height: 10px;"> <span class="status-win">500</span></span>
                </div>
                <div class="deposite-sec">
                    Winning<br>
                    <span><img src="<?=base_url() ?>assets/coin.png" style="height: 10px;"> <span class="status-win">0</span></span>
                </div>
                <div class="deposite-sec">
                    Bonus<br>
                    <span><img src="<?=base_url() ?>assets/coin.png" style="height: 10px;"> <span class="status-win">0</span></span>
                </div>
            </div>
            <!-- <div class="wallet-btn-wrap btn-wrap mt-4">
                <a class="btn btn-base" href="deposit.html">Deposit</a>
                <a class="btn btn-border" href="withdraw.html">Withdraw</a>
            </div> -->
        </div>
        <div class="transaction-wrap text-center">
            <div class="header-wrap">
                <div class="container">
                    <h6 class="text-dark">Match Entry Fee Per Team: 5</h6>
                    <h5 class="text-dark">You Have Enough PlayCoin to Join this Match.</h5>
                    <a class="btn btn-primary mt-3 w-100" href="ludo-join-match.php">Join Now</a>
                </div>
            </div>
        </div> 
              
    </div>  
    
 

   <?php include('include/allscript.php'); ?>

</body>
</html>