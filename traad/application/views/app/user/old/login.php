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
  
  <style type="text/css">
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
  background-image: url(<?=base_url() ?>media/login.jpg)!important;
  
      background-size: contain;
/*    background: #141414;*/
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-position-y: 0px!important;
}

.container {
    width: 100%;
    max-width: 400px;
        padding: 40px !important;
/*    background: linear-gradient(135deg, #000, #222);*/
    border-radius: 10px;
    text-align: center;
    color: white;
    margin-top: 156px;
/*    box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.1);*/
}

.logo img {
    width: 100px;
    margin-bottom: 20px;
}

.login-box h2 {
    font-size: 40px;
    margin-bottom: 0;
}

.subtext {
    font-size: 14px;
    margin-bottom: 20px;
    color: #ccc;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    font-size: 15px;
    text-align: left;
    margin-bottom: 5px;
    color: #ffffff;
}

input {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 12px;
    background: #333;
    color: white;
    font-size: 16px;
    margin-bottom: 13px !important;
}

.login-btn {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: none;
    background: #999;
    color: black;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    font-weight: bold;
}

.login-btn:hover {
    background: #ffffff;
}

.links {
    margin-top: 15px;
}

.links a {
    color: #ffffff;
    font-size: 14px;
    text-decoration: none;
    display: block;
}
.login-box {
    margin-top: 100px;
}

.signup {
    margin-top: 5px;
}

</style>
  
<?php include('include/allcss.php'); ?>

  <!-- loader start-->
<?php include('include/loader.php'); ?>
  <!-- loader end -->

  <div class="container">
        <div class="login-box">
            <h2>Login</h2>
            <p class="subtext">Sign in to continue.</p>
            <form action="<?=base_url('api/auth/login') ?>" method="post">
              <input type="hidden" name="device_id" value="<?=$device_id ?>" id="device_id">
              <input type="hidden" name="token" value="<?=$token ?>" id="firebase_token">

                <label for="name">Mobile</label>
                <input type="text" id="mobile"  name="name" placeholder="Enter Mobile" required>

                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Enter Your Password">

                <button type="button" class="login-btn">Log in</button>
            </form>
            <div class="links">
                <a href="forgot-password.ph" class="forgot-password">Forgot Password?</a>
                <a href="signup.php" class="signup">Signup!</a>
            </div>
        </div>
    </div>
  <!-- Sign section end-->


 <?php include('include/allscipt.php'); ?>



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