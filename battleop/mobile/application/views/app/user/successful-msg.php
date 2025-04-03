<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php include('include/allcss.php'); ?>
</head>
<body class='sc5-2 dark'>
    <!-- preloader area start -->
   <?php include('include/loader.php'); ?>
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>

    
    <div class="container">
        <div class="align-items-center d-flex justify-content-center vh-100">
            <div class="successful-msg-page text-center">
                <div class="icon">
                    <img src="<?=base_url() ?>assets/img/icon/user.png" alt="img">
                </div>
                <h3>Success!</h3>
                <p>Now you are registered get ready to play</p>
                <a class="btn btn-base w-100" href="home.php">Start Now</a>               
            </div>           
        </div>
    </div>

    <!-- back-to-top end -->
    <div class="back-to-top">
        <span class="back-top"><i class="fas fa-angle-double-up"></i></span>
    </div>

    <?php include('include/allscript.php'); ?>
</body>
</html>