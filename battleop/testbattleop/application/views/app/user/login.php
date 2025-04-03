<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php include('include/allcss.php'); ?>
</head>

<style>
    body.sc5-2.dark
    {
        background: linear-gradient(0deg, rgb(184 183 191 / 72%), rgb(153 152 161 / 78%)), url(<?=base_url() ?>media/uploads/site_setting/1710411278.png);
            background-repeat: no-repeat;
            background-position: bottom;
            padding-bottom: 75px;
            }
            .register-page h3 {
    margin-top: 10px;
    margin-bottom: 15px;
    color: black;
}
.register-page p {
    margin-bottom: 30px;
    color: black;
    font-weight: 600;
}
.rowrrrr {
    display: block;
    width: fit-content;
    color: black;
    font-weight: 700;
}
.register-page .another-way-link {
    margin-top: 10px;
    color: black;
    font-weight: 700;
}
</style>
<body class='sc5-2 dark'>
    <!-- preloader area start -->
    <?php include('include/loader.php'); ?>
<style>
.rowrrrr {
    display: block;
    width: fit-content;
}
</style>
<style>
    .vh-100 {
        height: 89vh !important;
    }
</style>  
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>

    <div class="container">
        <div class="align-items-center d-flex justify-content-center vh-100">
            <div class="register-page">
                <!-- <a class="btn back-page-btn" href=""><i class="ri-arrow-left-s-line"></i></a> -->
                <h3>Let’s login.</h3>
                <p>Let’s us know what your Mobile, and your password</p>
                <form class="default-form-wrap front_form_data" id="LoginForm1" method="post" action="<?=base_url('api/auth/login?firebase_token='.$this->session->userdata("firebase_token")) ?>" novalidate>

                    <input type="hidden" name="device_id" value="<?=$this->session->userdata('device_id') ?>">
                    <input type="hidden" name="firebase_token" value="<?=$this->session->userdata("firebase_token") ?>">


                    <div class="row">
                        <div class="col-md-6">
                            <div class="single-input-wrap">
                                <label><img src="<?=base_url() ?>assets/img/icon/profile.svg" alt="img"></label>
                                <input type="text" class="form-control" placeholder="Enter your Mobile No" name="mobile" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-input-wrap">
                                <label><img src="<?=base_url() ?>assets/img/icon/password.svg" alt="img"></label>
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                            </div>
                        </div>
                        <div class="row">
                            <a class="rowrrrr" href="<?=$sitesetting[0]->help_url ?>">Help</a>
                            <a class="rowrrrr" href="forget-pass.php" style="margin: 0 0 0 auto;">Forgot password?</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-base w-100">Sign In</button>
                </form>
                <!-- <div class="text-center">
                    <div class="or-border"><span>Or Sign In With</span></div>
                    <ul class="social-area">
                        <li><a href="https://www.facebook.com/"><img src="<?=base_url() ?>assets/img/icon/facebook.svg" alt="img"></a></li>
                        <li><a href="https://www.apple.com/"><img src="<?=base_url() ?>assets/img/icon/apple.svg" alt="img"></a></li>
                        <li><a href="https://www.google.com/"><img src="<?=base_url() ?>assets/img/icon/google.svg" alt="img"></a></li>
                    </ul>
                </div> -->

                <span class="another-way-link">Create an new account? <a href="signup.php">Sign Up</a></span>
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