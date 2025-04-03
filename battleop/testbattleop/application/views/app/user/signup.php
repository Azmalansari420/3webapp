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
<style>
    
    .register-page {
      margin-top: 45px; 
    }
</style>
<body class='sc5-2 dark'>
    <!-- preloader area start -->
     <?php include('include/loader.php'); ?>
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>

    
    <div class="container">
        <div class="align-items-center d-flex justify-content-center vh-100">
            <div class="register-page">
                <a class="btn back-page-btn" href=""><i class="ri-arrow-left-s-line"></i></a>
                <h3>Create an Account</h3>
                <p>Let’s us know what your name, email, and your password</p>
                <form class="default-form-wrap front_form_data" id="SignupForm1" method="post" action="<?=base_url('api/auth/sign_up') ?>" novalidate >
                    <input type="hidden" name="device_id" value="<?=$this->session->userdata('device_id') ?>">
                    <input type="hidden" name="firebase_token" value="<?=$this->session->userdata('firebase_token') ?>">
                    <input type="hidden" name="type" value="2">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="single-input-wrap">
                                <label><img src="<?=base_url() ?>assets/img/icon/profile.svg" alt="img"></label>
                                <input type="text" class="form-control" placeholder="Enter Refer ID (Optional)" name="referral_id">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-input-wrap">
                                <label><img src="<?=base_url() ?>assets/img/icon/profile.svg" alt="img"></label>
                                <input type="text" class="form-control" placeholder="Enter your Name" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-input-wrap">
                                <label><img src="<?=base_url() ?>assets/img/icon/message.svg" alt="img"></label>
                                <input type="email" id="exampleInputEmail11" class="form-control" placeholder="Enter your Email" name="email" required pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-input-wrap">
                                <label>
                                    <img src="<?=base_url() ?>assets/img/icon/svg/phone.svg" alt="img"></label>
                                <input type="number" class="form-control" placeholder="Enter your Mobile" name="mobile" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-input-wrap">
                                <label><img src="<?=base_url() ?>assets/img/icon/password.svg" alt="img"></label>
                                <input type="password" class="form-control" placeholder="Create Password" name="password" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-input-wrap">
                                <label><img src="<?=base_url() ?>assets/img/icon/password.svg" alt="img"></label>
                                <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-base w-100" name="submit">Sign Up</button>
                </form>
                <!-- <div class="text-center">
                    <div class="or-border"><span>Or Sign Up With</span></div>
                    <ul class="social-area">
                        <li><a href="https://www.facebook.com/"><img src="<?=base_url() ?>assets/img/icon/facebook.svg" alt="img"></a></li>
                        <li><a href="https://www.apple.com/"><img src="<?=base_url() ?>assets/img/icon/apple.svg" alt="img"></a></li>
                        <li><a href="https://www.google.com/"><img src="<?=base_url() ?>assets/img/icon/google.svg" alt="img"></a></li>
                    </ul>
                </div> -->

                <span class="another-way-link">Already have an account? <a href="login.php">Sign In</a></span>
            </div>           
        </div>
    </div>

    <!-- back-to-top end -->
    <div class="back-to-top">
        <span class="back-top"><i class="fas fa-angle-double-up"></i></span>
    </div>

      <?php include('include/allscript.php'); ?>
<script>

    $(document).on("submit", "#SignupForm1",(function(e) {

        ValidateEmail();
        }));





function ValidateEmail(input) {

   return false;
  var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

  var email = $("#exampleInputEmail11");

  if (email.value.match(validRegex)) {
    // alert("Valid email address!");
    // document.form1.text1.focus();
    // return true;
  }else{
    alert("Invalid email address!");
    document.form1.text1.focus();
    return false;

  }

}

    // function ValidateEmail(input) {

    //    return false;
    //   var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

    //   var email = $("#exampleInputEmail11");

    //   if (email.value.match(validRegex)) {
    //     // alert("Valid email address!");
    //     // document.form1.text1.focus();
    //     // return true;
    //   }else{
    //     alert("Invalid email address!");
    //     document.form1.text1.focus();
    //     return false;

    //   }

    // }

</script>
</body>

</html>