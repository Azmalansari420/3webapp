
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
            padding: 15px 20px 15px;
        }
        .single-page-area {
            padding-top: 60px;
        }
    </style>
    
    <div class="single-page-area">
        <div class="title-area">
            <a class="btn back-page-btn" href=""><i class="ri-arrow-left-s-line"></i></a>
            <h3>Ludo Game #201</h3>
            <!-- <div class="balance">$500 <span><img src="<?=base_url() ?>assets/img/icon/dollar-sign.png" alt="img"></span></div>  -->
        </div>
        <div class="container">
           
            <!-- <h6 class="mb-3 mt-4">Bet Slip (1)</h6> -->
            <div class="predict-amount-card mt-4">
                <h6 class="title">User Details</h6>
                <p class="price">Abhinav</p>
            </div>
            <div class="bet-slip-card mb-3 mt-3">
                <h6 class="title">Ludo Game #201</h6>
                <ul class="bet-result">
                    <li>Match Fee: <span><img src="<?=base_url() ?>assets/coin.png" style="height: 10px;"> 50 </span></li>
                    <li>Winning Amount: <span><img src="<?=base_url() ?>assets/coin.png" style="height: 10px;"> 100</span></li>
                </ul>
                <!-- <button><i class="ri-close-line"></i></button> -->
            </div>
            <div class="predict-amount-card">
                <h6 class="title">Room ID</h6>
                <p class="price">Join To See Room ID</p>
            </div>
            <div class="text-center mt-4 mb-3">
                <!-- <p>Maximum 2000.00 USD Predict in this option</p> -->
                <!-- <p>If you win 1% Charge Apply From This Amount </p> -->
            </div>
            <a class="btn btn-base w-100" href="ludo-match-join-wallet.php">Join Now</a>
        </div>
       <?php include('include/menubar.php'); ?>
    </div>  

    
    
    <?php include('include/allscript.php'); ?>

</body>
</html>