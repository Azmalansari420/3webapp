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
<body class='sc5-2'>
    <!-- preloader area start -->
    <?php include('include/loader.php'); ?>
  
<style>
    .vh-100 {
        height: 89vh !important;
    }
    .default-form-wrap .single-input-wrap input {
        padding: 0 48px 2px 56px;
        border-radius: 16px;
        border: 1px solid;
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
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>

    <div class="container">
        <div class="align-items-center d-flex justify-content-center vh-100">
            <div class="register-page">
                <div class="logo-area text-center">
                    <img class="light-logo" src="<?=base_url() ?>media/uploads/site_setting/<?=$site_setting[0]->logo ?>" alt="img" style="width: 35%;">
                </div>
                <h3>Enter New Password.</h3>
                <p class="p-color-size"></p>
                <form class="default-form-wrap">
                    <input type="hidden" name="device_id" value="<?=$device_id ?>" id="device_id">
                    <input type="hidden" name="token" value="<?=$token ?>" id="firebase_token">
                    <input type="hidden" value="<?=$mobile ?>" id="mobile">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="single-input-wrap">
                                <label><img src="<?=base_url() ?>assets/img/icon/password.svg" alt="img"></label>
                                <input type="password" class="form-control password-input" placeholder="Password" id="password">
                                <span class="toggle-password" toggle="#password">
                                    <img src="<?=base_url() ?>images/show-svgrepo-com.svg" alt="Show" class="eye-icon">
                                </span>
                            </div>
                        </div>

                    </div>
                    <a class="btn btn-base w-100 forget-btn" href="javascript:void(0);">Submit</a>
                </form>
               

                <span class="another-way-link a-class">Back to Login? <a style="font-size: 18px;" href="login.php">Sign In</a></span>
            </div>           
        </div>
    </div>
    

    <!-- back-to-top end -->
    <div class="back-to-top">
        <span class="back-top"><i class="fas fa-angle-double-up"></i></span>
    </div>

    

      <?php include('include/allscript.php'); ?>



<script>


    $(document).on('click', '.toggle-password', function () {
        var input = $($(this).attr('toggle'));
        var icon = $(this).find('img');

        if (input.attr('type') === 'password') {
            input.attr('type', 'text');
            icon.attr('src', '<?=base_url() ?>images/hide-svgrepo-com.svg'); // Change to hide icon
        } else {
            input.attr('type', 'password');
            icon.attr('src', '<?=base_url() ?>images/show-svgrepo-com.svg'); // Change back to show icon
        }
    });




    $(document).on("click", ".forget-btn",(function(e) {
      forgetpasss();
    }));

    function forgetpasss()
    {
        var device_id = $("#device_id").val();
        var firebase_token = $("#firebase_token").val();

        var mobile = $("#mobile").val();
        var password = $("#password").val();
        
        
        if(mobile=="")
        {
            toaster("Enter Mobile No.", 'error');
            return false;
        }
        
        if(password=="")
        {
            toaster("Enter Password.", 'error');
            return false;
        }

        var form = new FormData();
        form.append("mobile", mobile);
        form.append("password", password);
        form.append("firebase_token", firebase_token);
        form.append("device_id", device_id);

        var settings = {
          "url": "<?=base_url() ?>api/auth/forget_changepassword",
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