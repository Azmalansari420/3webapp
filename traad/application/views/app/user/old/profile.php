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
        <h3 class="middle-title text-white">Profile</h3>
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
  <section class="section-lg-t-space">
    <div class="custom-container">
      <div class="wallet-profile">
        <label class="thumb">
          <img class="img-fluid profile-pic user-image" src="<?=base_url() ?>media/uploads/users/<?=$full_detail->profile_image ?>" alt="Profile" />
          <div class="icon">
            <input type="file" name="image" accept="image/*" class="upload_image" data-target=".user_profile_image" style="display: none;">
            <i class="ri-edit-box-line ri-notification-2-line222"></i>
        </div>
        </label>
        
      </div>
    </div>
  </section>

  
  <section class="section-t-space section-lg-b-space">
    <div class="custom-container">
      <form class="auth-form create-form" target="_blank">
        <div class="form-group mb-3">
          <label for="inputusername" class="form-label">User Name</label>
          <div class="form-input">
            <input type="text" class="form-control" id="inputusername" placeholder="Enter User Name" value="<?=$full_detail->name ?>" />
            <i class="ri-user-line user"></i>
          </div>
        </div>

        <div class="form-group mb-3">
          <label for="inputusername" class="form-label">Email</label>
          <div class="form-input">
            <input type="email" class="form-control" id="inputemail" placeholder="Enter User Email" value="<?=$full_detail->email ?>" />
            <i class="ri-user-line user"></i>
          </div>
        </div>

        <div class="form-group mb-3">
          <label for="inputMobile" class="form-label">Mobile</label>
          <div class="form-input">
            <input type="number" class="form-control" id="inputMobile" placeholder="Enter Mobile" value="<?=$full_detail->mobile ?>" />
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
          <a href="javascript:void(0);" class="btn theme-btn submit-btn">Update</a>
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
    const user_id = '<?=$full_detail->id ?>';

    $(".upload_image").on('change', function(){
         var files = [];
         var j=1;      
         for (var i = 0; i < this.files.length; i++)
         {
           if (this.files && this.files[i]) 
           {
               var reader = new FileReader();
               reader.onload = function (e) {                
               update_profile_image(e.target.result);
                   j++;
               }
               reader.readAsDataURL(this.files[i]);
           }
         }
      });

    function  update_profile_image(image)
      {
           var form = new FormData();
           form.append("user_id", user_id);
           form.append("image", image);
           var settings = {
             "url": "<?=base_url() ?>api/user/update_image",
             "method": "POST",
             "processData": false,
             "mimeType": "multipart/form-data",
             "contentType": false,
             "dataType": "json",
             "data": form
           };
           $.ajax(settings).done(function (response) {
            toaster(response.message, 'success');
            if(response.status==200)
            {
                 $(".user_profile_image").attr('src',image);
                 $(".user-image").attr('src',image);
            }
           });
      }


      /**/

      $(document).on("click", ".submit-btn",(function(e) {
          update_profile();
        }));

        function update_profile()
        {
            var name = $("#inputusername").val();
            var mobile = $("#inputMobile").val();
            var email = $("#inputemail").val();

            if(name=="")
            {
              toaster("Enter Your Name", 'error');
              return false;
            }
            if(email=="")
            {
              toaster("Enter Your Email", 'error');
              return false;
            }
            if(mobile=="")
            {
              toaster("Enter Your Mobile", 'error');
              return false;
            }

            
            var form = new FormData();
            form.append("user_id", user_id);        
            form.append("name", name);
            form.append("mobile", mobile);
            form.append("email", email);

            var settings = {
              "url": "<?=base_url() ?>api/user/update_profile",
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
              console.log(response.data.name);
              toaster(response.message, 'success');
              $('.profile-name').html(response.data.name)
              $('.profile-mail').html(response.data.email)
            });
        }
</script>

