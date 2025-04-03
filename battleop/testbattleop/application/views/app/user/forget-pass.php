<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php include('include/allcss.php'); ?>
</head>
<style>
    .forget-pass-page {
        padding-top: 32px;
    }
</style>
<body class='sc5-2 dark'>
    <!-- preloader area start -->
    <?php include('include/loader.php'); ?>
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>
    
    <div class="container">
        <div class="forget-pass-page">
            <a class="btn back-page-btn" href="login.php"><i class="ri-arrow-left-s-line"></i></a>
            <h3>Forgot Password</h3>
            <p>Enter the email address associated with your Betpro account</p>
            <form class="default-form-wrap">
                <div class="row">
                    <div class="col-md-6">
                        <div class="single-input-wrap">
                            <label><img src="<?=base_url() ?>assets/img/icon/message.svg" alt="img"></label>
                            <input type="text" class="form-control" placeholder="***0@gmail.com">
                        </div>
                    </div>
                </div>
            </form>
            <a class="btn btn-base w-100" href="login.php">Next</a>
        </div> 
    </div>

    <!-- back-to-top end -->
    <div class="back-to-top">
        <span class="back-top"><i class="fas fa-angle-double-up"></i></span>
    </div>

    

     <?php include('include/allscript.php'); ?>
</body>
</html>