<?php 
$sitesetting = $this->crud->fetchdatabyid('1','site_setting'); 
include('include/header.php'); ?>
<style>
    .remember-me-container {
    display: flex;
    align-items: center;
    margin-top: 15px;
    font-size: 14px;
    color: #333;
}

/* Style for the checkbox */
.remember-me-container input[type="radio"] {
    margin-right: 10px;
    width: 18px;
    height: 18px;
    cursor: pointer;
}

/* Style for the label text */
.remember-me-container label {
    cursor: pointer;
    user-select: none;
}
</style>
    <!-- /preload -->
    <div class="mt-7 login-section">
        <div class="tf-container">
            <div class="logo d-flex justify-content-center py-2 mb-4">
                <img src="<?=base_url() ?>media/uploads/site_setting/<?=$sitesetting[0]->logo ?>" alt="" style="width: 80px !important;">
            </div>
            <form class="tf-form" action="<?=base_url('api/auth/login') ?>" method="post">
                <input type="hidden" name="device_id" value="<?=$this->session->userdata('device_id') ?>" id="device_id">
                <input type="hidden" name="firebase_token" value="<?=$this->session->userdata('firebase_token') ?>" id="firebase_token">
                <h2 class="text-center mb-5">Login</h2>
                <div class="group-input">
                    <label>Email:</label>
                    <input type="text" placeholder="Example@gmail" id="email">
                </div>
                <div class="group-input auth-pass-input last">
                    <label>Password</label>
                    <input type="password" class="password-input" placeholder="Password" id="password">
                    <a class="icon-eye password-addon" id="password-addon"></a>
                </div>
                <!-- <div class="remember-me-container">
                    <label>
                        <input type="radio" id="remember-me">
                        I Agree to the <a href="term-condition.php">Terms and Conditions</a> and <a href="privacy-policy.php">Privacy Policy</a>.
                    </label>
                </div> -->
                <div class="remember-me-container">
                    <label>
                        <input type="radio" id="remember-me">
                        Remember Me
                    </label>
                </div>

                <a href="reset-password.php" class="auth-forgot-password mt-3">Forgot Password?</a>

                <button type="button" class="tf-btn accent large login-btn">Log In</button>

            </form>
            
        </div>
    </div>





<?php include('include/footer.php'); ?>

<script>

    $(document).on("click", ".login-btn",(function(e) {
      login_distibuter();
    }));

    function login_distibuter()
    {
        var device_id = $("#device_id").val();
        var firebase_token = $("#firebase_token").val();
        var email = $("#email").val();
        var password = $("#password").val();
        // var isChecked = $("#remember-me").is(':checked');

        // if(isChecked=='')
        // {
        //     toaster("Click On Checkbox", 'success');
        //     return false;
        // }

        var form = new FormData();
        form.append("email", email);
        form.append("password", password);
        form.append("firebase_token", firebase_token);
        form.append("device_id", device_id);

        var settings = {
          "url": "<?=base_url() ?>api/auth/login",
          "method": "POST",
          "dataType": "json",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": form
        };

        $.ajax(settings).done(function (response) {
          console.log(response);
          toaster(response.message, 'success');
          if(response.status==200)
          {
            window.location.href= response.url;
          }
        });
    }

    
        // toaster('This is an error message!', 'error');
</script>