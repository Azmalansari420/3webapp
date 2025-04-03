<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php include('include/allcss.php'); ?>
</head>
<body class='sc5'>
    <!-- preloader area start -->
    <?php include('include/loader.php'); ?>
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>
    <style>
   
    .single-page-area {
	    padding-top: 50px;
	}
    .profile-details {
        margin-top: 24px;
        border-radius: 0;
    }
    .profile-list-inner li .single-profile-wrap 
    {
    	background: #5b0100;
    }
</style>
    
    <div class="single-page-area">
        <div class="title-area justify-content-between">
            <a class="btn back-page-btn" href="home.php"><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4 text-white"><?=website_name ?></h3>
            <div class="balance"><?=$full_detail->wallet ?> <span><img src="<?=base_url() ?>assets/coin.png" alt="img"></span></div> 
        </div>

                
        <div class="container">
            <ul class="profile-list-inner">
                <li>
                    <a class="single-profile-wrap" href="edit-profile.php"><i class="fa fa-user"></i> <?=lang("My Profile") ?> <i class="ri-arrow-right-s-line"></i></a>
                </li>
                <li>
                    <a class="single-profile-wrap" href="change-pass.php"><i class="fas fa-lock"></i> <?=lang("Change Password") ?> <i class="ri-arrow-right-s-line"></i></a>
                </li>
                <li>
                    <a class="single-profile-wrap" href="user-wallet.php"><i class="fa fa-wallet"></i> <?=lang("Wallet") ?> <i class="ri-arrow-right-s-line"></i></a>
                </li>
                <li>
                    <a class="single-profile-wrap" href="result-chart.php"><i class="fas fa-chart-bar"></i><?=lang("Result Chart") ?> <i class="ri-arrow-right-s-line"></i></a>
                </li>

                <li>
                    <a class="single-profile-wrap" href="play-history.php"><i class="fas fa-gamepad"></i> <?=lang("Play History") ?> <i class="ri-arrow-right-s-line"></i></a>
                </li>

                <li>
                    <a class="single-profile-wrap" href="passbook.php"><i class="fas fa-book-open"></i> <?=lang("Passbook"); ?> <i class="ri-arrow-right-s-line"></i></a>
                </li>

                <li>
                    <a class="single-profile-wrap" href="game-rate.php"><i class="fas fa-book-reader"></i> <?=lang("Game Rate") ?><i class="ri-arrow-right-s-line"></i></a>
                </li>
                <li>
                    <a class="single-profile-wrap" href="how-to-play.php"><i class="fas fa-bookmark"></i> <?=lang("How to Play") ?><i class="ri-arrow-right-s-line"></i></a>
                </li>

                <!-- redirect to play store -->
                <li>
                    <a class="single-profile-wrap" href="point-transfer.php"><i class="fas fa-mail-bulk"></i> <?=lang("Amount Transfer") ?><i class="ri-arrow-right-s-line"></i></a>
                </li>

                <!-- <li>
                    <a class="single-profile-wrap" href="about.php"><i class="fas fa-share"></i> Refer & Earn<i class="ri-arrow-right-s-line"></i></a>
                </li> -->

                <li>
                    <a class="single-profile-wrap" href="about.php"><i class="fas fa-atom"></i> <?=lang("About Us") ?><i class="ri-arrow-right-s-line"></i></a>
                </li>

               <!--  <li>
                    <a class="single-profile-wrap" href="term-condition.php"><i class="fas fa-lock"></i> Term & Conditions <i class="ri-arrow-right-s-line"></i></a>
                </li>  -->               
                <li>
                    <a class="single-profile-wrap" href="privacy-policy.php"><i class="fas fa-exclamation-triangle"></i><?=lang("Privacy Policy") ?> <i class="ri-arrow-right-s-line"></i></a>
                </li>
               <!--  <li>
                    <a class="single-profile-wrap" href=""><i class="fas fa-star"></i>Rate App <i class="ri-arrow-right-s-line"></i></a>
                </li> -->
                <li>
                    <a class="single-profile-wrap" href="https://api.whatsapp.com/send?text=Download App From Link https://dreamapp.in/dreamapp.apk">
                       <i class="fas fa-share"></i> <?=lang("Share App") ?> <i class="ri-arrow-right-s-line"></i>
                    </a>
                </li>
                <li>
                    <a class="single-profile-wrap" href="<?=base_url('api/auth/logout') ?>"><i class="fas fa-sign-out-alt"></i><?=lang("Log Out") ?> <i class="ri-arrow-right-s-line"></i></a>
                </li>                
            </ul>
        </div>
          <?php include('include/menubar.php'); ?>
    </div>     

   <?php include('include/allscript.php'); ?>
   <?php include('include/chat-btn.php'); ?>

   

</body>
</html>