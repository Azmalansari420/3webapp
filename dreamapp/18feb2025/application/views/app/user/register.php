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
                <div class="logo-area text-center">
                    <img class="light-logo" src="<?=base_url() ?>media/uploads/site_setting/<?=$site_setting[0]->logo ?>" alt="img" style="width: 35%;">
                </div>
                <h3>Create an Account</h3>
                <p class="p-color-size">Let’s us know what your Name, Email, Mobile, and your Password</p>
                <form class="default-form-wrap">
                    <input type="hidden" name="device_id" value="<?=$device_id ?>" id="device_id">
                    <input type="hidden" name="token" value="<?=$token ?>" id="firebase_token">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="single-input-wrap">
                                <label><img src="<?=base_url() ?>assets/img/icon/profile.svg" alt="img"></label>
                                <input type="text" class="form-control" placeholder="Enter your Name" id="name">
                            </div>
                        </div>

                        <div class="col-md-6" style="display:none;">
                            <div class="single-input-wrap">
                                <label><img src="<?=base_url() ?>assets/img/icon/message.svg" alt="img"></label>
                                <input type="email" class="form-control" placeholder="Enter your Email" id="email" value="XX">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="single-input-wrap">
                                <label><img src="<?=base_url() ?>assets/img/icon/mobile.svg" alt="img"></label>
                                <input type="number" class="form-control" placeholder="Enter your Mobile" id="mobile">
                            </div>
                        </div>                        
                        
                        <div class="col-md-6">
                            <div class="single-input-wrap" style="position: relative;">
                                <label>
                                    <img src="<?=base_url() ?>assets/img/icon/password.svg" alt="img">
                                </label>
                                <input type="password" class="form-control password-input" placeholder="Create Password" id="password">
                                <span class="toggle-password" toggle="#password">
                                    <img src="<?=base_url() ?>images/show-svgrepo-com.svg" alt="Show" class="eye-icon">
                                </span>
                            </div>
                        </div>                       

                        <div class="col-md-6" style="display: none;">
                            <div class="single-input-wrap" style="position: relative;">
                                <label>
                                    <img src="<?=base_url() ?>assets/img/icon/password.svg" alt="img">
                                </label>
                                <input type="password" class="form-control password-input" placeholder="Confirm Password" id="con_password">
                                <span class="toggle-password" toggle="#con_password">
                                    <img src="<?=base_url() ?>images/show-svgrepo-com.svg" alt="Show" class="eye-icon">
                                </span>
                            </div>
                        </div>

                         <div class="col-md-6" >
                            <div class="single-input-wrap">
                                <select class="form-control selectmultiple" id="state_id">
                                    <option disabled selected>--Select City--</option>
                                    <?php
                                    $state = $this->db->get_where('city')->result_object();
                                    foreach($state as $data)
                                        { ?>
                                    <option value="<?=$data->id ?>"><?=$data->name ?></option>
                                <?php } ?>
                                </select>
                                
                            </div>
                        </div>

                         <div class="col-md-6" >
                            <div class="single-input-wrap">
                                <label><img src="<?=base_url() ?>assets/img/icon/profile.svg" alt="img"></label>
                                <input type="text" class="form-control" placeholder="Refreal Code (Optional)" id="referal_code">
                            </div>
                        </div>


                    </div>
                    <a class="btn btn-base w-100 register-btn" href="javascript:void(0);" >Register Now</a>
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

    $(document).ready(function() {
        $('#state_id').select2({
            placeholder: "--Select City--",
            allowClear: true
        });
    });

    


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


    $(document).on("click", ".register-btn",(function(e) {
      login_distibuter();
    }));

    function login_distibuter()
    {
        var device_id = $("#device_id").val();
        var firebase_token = $("#firebase_token").val();

        var name = $("#name").val();
        var email = $("#email").val();
        var mobile = $("#mobile").val();
        var password = $("#password").val();
        var con_password = $("#con_password").val();
        var referal_code = $("#referal_code").val();
        var state_id = $("#state_id").val();

        if(name=="")
        {
            toaster("Enter Your Name.", 'error');
            return false;
        }
        // if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        //     toaster("Invalid Email Address.", 'error');
        //     return false;
        // }
        if(mobile=="")
        {
            toaster("Enter Mobile No.", 'error');
            return false;
        }
        if(password=="")
        {
            toaster("Enter Your Password.", 'error');
            return false;
        }
        if(state_id=="")
        {
            toaster("Select State.", 'error');
            return false;
        }
        // if(password!=con_password)
        // {
        //     toaster("Confirm Password Not Match.", 'error');
        //     return false;
        // }

        var form = new FormData();
        form.append("name", name);
        form.append("email", email);
        form.append("mobile", mobile);
        form.append("password", password);
        form.append("firebase_token", firebase_token);
        form.append("device_id", device_id);
        form.append("referal_code", referal_code);
        form.append("state_id", state_id);

        var settings = {
          "url": "<?=base_url() ?>api/auth/registration",
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
          if(response.status == 200) {
                toaster(response.message, 'success');
                setTimeout(function(){
                    window.location.href = response.url;
                }, 1000);
            }
        });
    }



        // toaster('This is an error message!', 'error');
</script>




</body>

</html>