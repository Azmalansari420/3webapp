<?php
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
<html lang="en">
<head>
    <?php include('include/allcss.php'); ?>
</head>

<body>
    <!-- login page start -->
    <div class="login-img">
        <img class="img-fluid img" src="<?=base_url() ?>assets/images/login-vector.svg" alt="login-img">
    </div>
    <div class="custom-container">
        <h2 class="login-title">Login</h2>
        <h3 class="login-content">Let’s start again to chat with friends</h3>
        <form class="auth-form pb-3">
            <input type="hidden" name="device_id" value="<?=$device_id ?>" id="device_id">
            <input type="hidden" name="token" value="<?=$token ?>" id="firebase_token">

            <div class="form-group mt-4">
                <label class="form-label fw-semibold dark-text" for="validationDefault01">Mobile Number</label>
                <div class="d-flex gap-2">
                    <div class="form-input">
                        <input type="number" class="form-control" id="mobile" placeholder="Enter your number" required>
                    </div>
                </div>                
            </div>
            <div class="form-group mt-2">
                <label class="form-label fw-semibold dark-text" for="validationDefault01">Password</label>
                <div class="d-flex gap-2">
                    <div class="form-input">
                        <input type="password" class="form-control" id="password"
                            placeholder="Enter your Password" required>
                    </div>
                </div>                
            </div> 
            <a href="javascript:void(0);" class="btn theme-btn w-100 mt-4 login-btn">Sign Up</a>
        </form>

    </div>

   <?php include('include/allscript.php'); ?>


<script>

    $(document).on("click", ".login-btn",(function(e) {
      login_distibuter();
    }));

    function login_distibuter()
    {
        var device_id = $("#device_id").val();
        var firebase_token = $("#firebase_token").val();
        var mobile = $("#mobile").val();
        var password = $("#password").val();

        if(mobile=='')
        {
            toaster("Enter Your Mobile No.", 'error');
            return false;
        }
        if(password=='')
        {
            toaster("Enter Your Password.", 'error');
            return false;
        }

        var form = new FormData();
        form.append("mobile", mobile);
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
          toaster(response.message, 'error');
          if(response.status==200)
          {
            window.location.href= response.url;
          }
        });
    }

    
        // toaster('This is an error message!', 'error');
</script>











</body>

</html>