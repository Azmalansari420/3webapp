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

include('include/allcss.php'); ?>

  <!-- loader start-->
<?php include('include/loader.php'); ?>

  <!-- header start-->
  <header>
    <div class="custom-container">
      <div class="auth-title">
        <h1 style="color:white;">Create an Account</h1>
      </div>
    </div>
  </header>
  <!-- header start-->

  <!-- Sign Form start-->
  <div class="custom-container">
    <form class="auth-form" target="_blank">
      <div class="form-group mb-3">
        <label for="inputusername" class="form-label">User Name</label>
        <div class="form-input">
          <input type="text" class="form-control"  placeholder="Enter your Name" id="name"/>
          <i class="ri-user-line user"></i>
        </div>
      </div>

      <div class="form-group mb-3">
        <label for="inputusername" class="form-label">Email</label>
        <div class="form-input">
          <input type="email" class="form-control" id="email" placeholder="Enter User Email" />
          <i class="ri-user-line user"></i>
        </div>
      </div>

      <div class="form-group mb-3">
        <label for="inputusername" class="form-label">Mobile</label>
        <div class="form-input">
          <input type="email" class="form-control" id="mobile" placeholder="Enter User Mobile" />
          <i class="ri-user-line user"></i>
        </div>
      </div>

      <div class="form-group mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="form-input">
          <input type="password" class="form-control" id="password" placeholder="Enter Your Password" />
          <i class="ri-door-lock-line"></i>
        </div>
      </div>

      <div class="submit-btn">
        <a href="javascript:void(0);" class="btn theme-btn register-btn">Register Now</a>
      </div>

      <div class="division">
        <span>OR</span>
      </div>


      <h5 class="signup">Already have an account ?<a href="login.php"> Sign in now</a></h5>
    </form>
    <!-- Sign Form end -->
  </div>

<?php include('include/allscipt.php'); ?>


<script type="text/javascript">
  
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
        

        if(name=="")
        {
            toaster("Enter Your Name.", 'error');
            return false;
        }
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            toaster("Invalid Email Address.", 'error');
            return false;
        }
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
      

        var form = new FormData();
        form.append("name", name);
        form.append("email", email);
        form.append("mobile", mobile);
        form.append("password", password);
        form.append("firebase_token", firebase_token);
        form.append("device_id", device_id);

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



</script>