<?php include('include/allcss.php'); ?>

  <!-- loader start-->
<?php include('include/loader.php'); ?>

  <!-- side bar start -->
<?php include('include/sidebar.php'); ?>

  <!-- header start -->
  <header class="section-t-space">
    <div class="custom-container">
      <div class="header-panel">
        <button class="sidebar-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft">
          <i class="ri-menu-line"></i>
        </button>
        <h3 class="middle-title text-white">Upadate Password</h3>
        <a href="notification.php">
          <i class="ri-notification-2-line"></i>
        </a>
      </div>
    </div>
  </header>
  <!-- header end -->
<style>
  i.ri-notification-2-line222 {
    color: white;
    position: relative;
    left: 29px;
    bottom: 17px;
    background: black;
    padding: 5px;
    border-radius: 50%;
}
</style>



  <!-- setting section start -->
  <span id="copyResult"></span>

  
  <section class="section-t-space section-lg-b-space mt-4">
    <div class="custom-container">
      <form class="auth-form create-form" target="_blank">
        <div class="form-group mb-3">
          <label for="inputusername" class="form-label">Enter old Password</label>
          <div class="form-input">
            <input type="text" class="form-control oldpassword" id="inputusername" placeholder="Enter User Name"  />
            <i class="ri-user-line user"></i>
          </div>
        </div>

        <div class="form-group mb-3">
          <label for="inputusername" class="form-label">Enter New Password</label>
          <div class="form-input">
            <input type="email" class="form-control npassword" id="inputemail" placeholder="Enter User Email"  />
            <i class="ri-user-line user"></i>
          </div>
        </div>

        <div class="form-group mb-3">
          <label for="inputMobile" class="form-label">Enter Confirm Password</label>
          <div class="form-input">
            <input type="number" class="form-control cpassword" id="inputMobile" placeholder="Enter Mobile"  />
            <i class="ri-phone-line user"></i>
          </div>
        </div>

       <!--  <div class="form-group mb-3">
          <label for="inputPassword" class="form-label">Password</label>
          <div class="form-input">
            <input type="password" class="form-control" id="inputPassword" placeholder="Enter Your Password" />
            <i class="ri-door-lock-line"></i>
          </div>
        </div> -->

        

        <div class="submit-btn mb-0">
          <a href="javascript:void(0);" class="btn theme-btn update-btn">Update</a>
        </div>
      </form>
    </div>
  </section>

  <!-- panel-space start -->
  <section class="panel-space"></section>
  <!-- panel-space end -->

  <!-- bottom navbar start -->
 <?php include('include/bootom-menu.php'); ?>
  <!-- bottom navbar end -->

  <!-- bootstrap js -->
 <?php include('include/allscipt.php'); ?>
 
 <script>
     $(document).on("click", ".update-btn",(function(e) {
      change_password();
    }));

    function change_password()
    {
        var oldpassword = $(".oldpassword").val();
        var npassword = $(".npassword").val();
        var cpassword = $(".cpassword").val();

        if(oldpassword=="")
        {
            toaster("Enter Old Password.", 'error');
            return false;
        }
        if(npassword=="")
        {
            toaster("Enter New Password.", 'error');
            return false;
        }
        if(cpassword=="")
        {
            toaster("Enter Confirm Password.", 'error');
            return false;
        }

        var form = new FormData();
        form.append("oldpassword", oldpassword);
        form.append("npassword", npassword);
        form.append("cpassword", cpassword);

        var settings = {
          "url": "<?=base_url() ?>api/user/password_update",
          "method": "POST",
          "dataType": "json",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": form
        };

        $.ajax(settings).done(function (response) 
        {
          // console.log(response);
            if(response.status==200)
            {
                $(".oldpassword").val();
                $(".npassword").val();
                $(".cpassword").val();
              toaster(response.message, 'success');
            }
            else
            {
            toaster(response.message, 'error');

            }
        });
    }
</script>

