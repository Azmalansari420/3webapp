<?php
$about = $this->crud->fetchdatabyid('2','site_setting');
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
            <h3 class="ps-4">About Us </h3>
        </div>

        <div class="container mt-4 mb-4">
            <!-- <h4 class="mt-4 mb-4">About Us</h4> -->
            <?=$about[0]->content ?>        
        </div>
        <?php include('include/menubar.php'); ?>               
    </div>  


     <?php include('include/allscript.php'); ?>




</body>
</html>