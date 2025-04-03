<?php
$mobile = $this->input->get('mobile');
$device_id = $this->input->get('device_id');
if(!empty($device_id) && $device_id!='undefined')
{
    $device_id = $device_id;
}
else
{
    $device_id = uniqid();
}

$token = $this->input->get('token');
if(!empty($token) && $token!='undefined')
{
    $token = $token;
}
else
{
    $token = rand();
}


?>
<!DOCTYPE html>
<html lang="zxx">
<head>
<?php include('include/allcss.php'); ?>
</head>
<style>
    
    .register-page {
      margin-top: 0px; 
    }
    .single-input-wrap input {
        font-size: 16px;
        color: black!important;
    }
    .a-class{
        color: black;
        font-weight: 600;
    }
    .default-form-wrap .single-input-wrap input {
        border: 1px solid black;
        font-size: 18px;
    }
    .register-page .another-way-link {
        margin-top: 10px;
        margin-bottom: 26px;
    }
    .vh-100 {
    height: 114vh !important;
}

.single-input-wrap select {
    border: none;
    padding: 0 30px 2px 30px;
    font-size: 14px;
    width: 100%;
    height: 100%;
    color: #5f5f5f;
    background: rgba(255, 255, 255, 0.3);
    border-radius: 16px;
    transition: all 0.4s ease-in;
    position: relative;
}


.toggle-password {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        z-index: 10;
    }

    .eye-icon {
        width: 20px;
        height: 20px;
    }
</style>
<body class='sc5-2'>
    <!-- preloader area start -->
     <?php include('include/loader.php'); ?>
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>

    
    <div class="container">
        <div class="align-items-center d-flex justify-content-center vh-100">
            <div class="register-page">
                <div class="logo-area text-center mb-2">
                    <img class="light-logo" src="<?=base_url() ?>media/uploads/site_setting/<?=$site_setting[0]->logo ?>" alt="img" style="width: 35%;">
                </div>

                <h3>Enter Your OTP</h3>
                <form class="default-form-wrap">
                    <input type="hidden" name="device_id" value="<?=$device_id ?>" id="device_id">
                    <input type="hidden" name="token" value="<?=$token ?>" id="firebase_token">
                    <input type="hidden" value="<?=$mobile ?>" id="mobile">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="single-input-wrap">
                                <label><img src="<?=base_url() ?>assets/img/icon/mobile.svg" alt="img"></label>
                                <input type="number" class="form-control" placeholder="Enter your OTP" id="otp">
                            </div>
                        </div>                        
                     
                      
                       


                    </div>
                    <a class="btn btn-base w-100 verify-btn" href="javascript:void(0);" >Verify Now</a>
                </form>
                

                <span class="another-way-link a-class">Already have an account? <a href="login.php" style="font-size: 18px;">Sign In</a></span>
            </div>           
        </div>
    </div>

    <!-- back-to-top end -->
    <div class="back-to-top">
        <span class="back-top"><i class="fas fa-angle-double-up"></i></span>
    </div>

      <?php include('include/allscript.php'); ?>

    


<script>


    $(document).on("click", ".verify-btn",(function(e) {
      verifyotp();
    }));

    function verifyotp()
    {
        var device_id = $("#device_id").val();
        var firebase_token = $("#firebase_token").val();

        var mobile = $("#mobile").val();
        var otp = $("#otp").val();

        if(otp=="")
        {
            toaster("Enter OTP.", 'error');
            return false;
        }
        
        if(mobile=="")
        {
            toaster("Mobile No Not Found.", 'error');
            return false;
        }

        var form = new FormData();
        form.append("mobile", mobile);
        form.append("otp", otp);
        form.append("firebase_token", firebase_token);
        form.append("device_id", device_id);

        var settings = {
          "url": "<?=base_url() ?>api/auth/forget_otp_verify",
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
          if(response.status == 200) 
            {
                toaster(response.message, 'success');
                setTimeout(function(){
                    window.location.href = response.url;
                }, 1000);
            }
            else
            {
              toaster(response.message, 'error');
            }
        });
    }



        // toaster('This is an error message!', 'error');
</script>




</body>

</html>