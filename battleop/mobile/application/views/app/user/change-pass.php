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
        <div class="forget-pass-page">
            <a class="btn back-page-btn" href=""><i class="ri-arrow-left-s-line"></i></a>
            <h3>Change Password</h3>
                <form class="default-form-wrap front_form_data" id="SignupForm1" method="post" action="<?=base_url('api/user/password_update') ?>" novalidate >
                <div class="single-input-wrap">
                    <label><img src="<?=base_url() ?>assets/img/icon/password.svg" alt="img"></label>
                    <input type="text" class="form-control" placeholder="Enter your old password" name="oldpassword" required>
                </div>
                <div class="single-input-wrap">
                    <label><img src="<?=base_url() ?>assets/img/icon/password.svg" alt="img"></label>
                    <input type="text" class="form-control" placeholder="Enter your new password" name="npassword" required>
                </div>
                <div class="single-input-wrap">
                    <label><img src="<?=base_url() ?>assets/img/icon/password.svg" alt="img"></label>
                    <input type="text" class="form-control" placeholder="Enter confirm password" name="cpassword" required>
                </div>
                <button type="submit" class="btn btn-base w-100 mt-5">Save</button>
            </form>
        </div> 
    </div>

    <!-- back-to-top end -->
    <div class="back-to-top">
        <span class="back-top"><i class="fas fa-angle-double-up"></i></span>
    </div>

    

    <!-- all plugins here -->
    <script src="<?=base_url() ?>assets/js/jquery.3.6.min.js"></script>
    <script src="<?=base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url() ?>assets/js/imageloded.min.js"></script>
    <script src="<?=base_url() ?>assets/js/counterup.js"></script>
    <script src="<?=base_url() ?>assets/js/waypoint.js"></script>
    <script src="<?=base_url() ?>assets/js/magnific.min.js"></script>
    <script src="<?=base_url() ?>assets/js/isotope.pkgd.min.js"></script>
    <script src="<?=base_url() ?>assets/js/jquery-ui.min.js"></script>
    <script src="<?=base_url() ?>assets/js/nice-select.min.js"></script>
    <script src="<?=base_url() ?>assets/js/fontawesome.min.js"></script>
    <script src="<?=base_url() ?>assets/js/owl.min.js"></script>
    <script src="<?=base_url() ?>assets/js/slick-slider.min.js"></script>
    <script src="<?=base_url() ?>assets/js/wow.min.js"></script>
    <script src="<?=base_url() ?>assets/js/tweenmax.min.js"></script>
    <!-- main js  -->
    <script src="<?=base_url() ?>assets/js/main.js"></script>
</body>

<!-- Mirrored from s7template.com/tf/betpro/change-pass.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Mar 2024 07:34:39 GMT -->
</html>