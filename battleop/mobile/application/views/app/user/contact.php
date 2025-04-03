<?php

$sitesetting = $this->db->get_where('site_setting',array('id'=>1))->result_object();

?>

<!DOCTYPE html>
<html lang="zxx">
<head>
     <?php include('include/allcss.php'); ?>
</head>
<body class='sc5 dark'>
    <!-- preloader area start -->
    <?php include('include/loader.php'); ?>
     <style>
        .single-page-area .title-area {
            padding: 14px 20px 14px;
        }
        .single-page-area {
            padding-top: 60px;
        }
         .money-btn {
        position: inherit !important;
        background: white !important;
        color: black !important;
        border-radius: 7px;
        padding: 0px 20px;
        height: 35px;
        line-height: 1;
        margin: 0 0 5px 0;
    }
    .money-btn:after {
        content: inherit;
    }
    </style>
    
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>

    
    <div class="single-page-area">
        <div class="title-area">
            <a class="btn back-page-btn" href=""><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4">Contact Us </h3>
        </div>

        <div class="container mt-4 mb-4">
            <div class="text-center">
                <div class="predict-amount-card">
                <h6 class="title">Contact Us</h6>
                <p class="price"><?=$sitesetting[0]->mobile ?></p>
                <p class="price"><?=$sitesetting[0]->email ?></p>
            </div>
                    <div class="or-border"><span>Or</span></div>
                    <ul class="social-area mt-4"> 

                        <li><a class="chrome-btn" data-href="https://linktr.ee/CustomersupportBattleop">Click to Chat</a></li>                       
                        <!-- <li><a onClick="window.open('<?=$sitesetting[0]->facebook ?>');"><img class="google" src="<?=base_url() ?>/assets/img/icon/facebook.svg" alt="img"></a></li> -->

                        <!-- <li><a onClick="window.open('<?=$sitesetting[0]->instagram ?>');" ><img class="google" src="<?=base_url() ?>assets/img/icon/instagram.svg" alt="img" style="width: 32px;"></a></li> -->
                        <br>
                        <li><a data-href="<?=$sitesetting[0]->alt_mobile ?>" class="whatsapp-btn"><img class="google" src="<?=base_url() ?>assets/img/icon/whatsapp.svg" alt="img" style="width: 32px;"></a></li>
                        <!-- <li><a onClick="window.open('<?=$sitesetting[0]->telegram ?>');"><img class="google" src="<?=base_url() ?>assets/img/icon/telegram.svg" alt="img" style="width: 32px;"></a></li> -->
                        <!-- <li><a onClick="window.open('<?=$sitesetting[0]->twitter ?>');"><img class="google" src="<?=base_url() ?>assets/img/icon/twitter.svg" alt="img" style="width: 32px;"></a></li> -->
                    </ul>
                </div>   
        </div>
        <?php include('include/menubar.php'); ?>               
    </div>  


     <?php include('include/allscript.php'); ?>




</body>
</html>