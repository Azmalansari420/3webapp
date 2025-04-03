<?php include('include/header.php'); ?>
      <div class="header is-fixed">
        <div class="tf-container">
            <div class="tf-statusbar br-none d-flex justify-content-center align-items-center">
                <a href="#" class="back-btn"> <i class="icon-left"></i> </a>
            </div>
        </div>
    </div>
    <div id="app-wrap">
        <div class="reset-pass-section mt-5">
            <div class="tf-container">
                <div class="tf-title">
                    <h1>Reset Password</h1>
                    <p>Enter your registered email below to recive password reset instruction</p>
                </div>
                <div class="image-box">
                    <img src="<?=base_url() ?>images/user/forgotpass.jpg" alt="image">
                </div>
                <form action="" class="tf-form">
                    <div class="group-input">
                        <label>Emaii</label>
                        <input type="text" placeholder="Your Email">
                    </div>
                    <button type="submit" class="tf-btn accent large">Next</button>
                </form>

            </div>
        </div>
    </div>





<?php include('include/footer.php'); ?>