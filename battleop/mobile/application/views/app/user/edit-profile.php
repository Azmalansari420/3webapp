<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php include('include/allcss.php'); ?>

</head>
<body class='sc5 dark'>
    <!-- preloader area start -->
    <?php include('include/loader.php'); ?>
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>
    <style>
    .single-page-area .title-area {
        padding: 16px 20px 12px;
    }
    .single-page-area {
        padding-top: 60px;
    }
</style>
    
    <div class="single-page-area">
        <div class="title-area">
            <a class="btn back-page-btn" href=""><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4">Edit Profile</h3>
        </div>
        <div class="container">
            <div class="my-profile-wrap">
                <div class="media">
                    <div class="thumb">
                        <img src="<?=$get_user['image'] ?>" alt="img">
                        <div class="icon">
                            <label class="input-group-text edit-profile" >
                                <input type="file" name="image" accept="image/*" class="upload_image" data-target=".user_profile_image" style="display: none;">
                                <i class="fa fa-camera"></i> 
                            </label>
                        </div>
                    </div>
                    <div class="media-body">
                        <h6 class="profile-name"><?=$full_detail->fname.' '.$full_detail->lname ?></h6>
                        <p class="profile-mail"><?=$full_detail->email ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="my-profile-detail">
                <h6 class="title">User Information</h6>
                
                <form class="edit-form-wrap front_form_data" id="SignupForm1" method="post" action="<?=base_url('api/user/update_profile') ?>" novalidate >
                    <div class="single-input-wrap">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="" name="fname" required value="<?=$full_detail->fname ?>">
                    </div>
                    <div class="single-input-wrap">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="" name="lname" required value="<?=$full_detail->lname ?>">
                    </div>
                    <div class="single-input-wrap">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="" required value="<?=$full_detail->email ?>" readonly>
                    </div>
                    <div class="single-input-wrap">
                        <label>Mobile</label>
                        <input type="number" class="form-control" placeholder="" required value="<?=$full_detail->mobile ?>" readonly>
                    </div>
                    <div class="single-input-wrap">
                        <label>Date Of Birth</label>
                        <input type="date" class="form-control" name="dob" required value="<?=$full_detail->dob ?>">
                    </div>
                    <div class="single-input-wrap">
                        <label>Gender</label>
                        <select class="form-control" name="gender">
                            <option value="" <?php if($full_detail->gender==NULL)echo 'selected'; ?>>Select Gender</option>
                            <option value="1" <?php if($full_detail->gender==1)echo 'selected'; ?> >Male</option>
                            <option value="0" <?php if($full_detail->gender==0)echo 'selected'; ?>>Female</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-base w-100 mt-4">Update</button>
                </form>
            </div>
        </div>
        <?php include('include/menubar.php'); ?>
    </div>     

    <?php include('include/allscript.php'); ?>
<script>

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
               // console.log(e.target.result);
               }
               reader.readAsDataURL(this.files[i]);
           }
     }
  });


  function  update_profile_image(image)
  {
       var form = new FormData();
       form.append("user_id", 0);
       form.append("image", image);
       var settings = {
         "url": "<?=base_url() ?>api/user/update_image",
         "method": "POST",
         "processData": false,
         "mimeType": "multipart/form-data",
         "headers": {
            "token": sessionStorage.getItem("token")
          },
         "contentType": false,
         "dataType": "json",
         "data": form
       };
       $.ajax(settings).done(function (response) {
        // console.log(response);
        print_toast(response.message);
        if(response.status==200)
        {
             $(".user_profile_image").attr('src',image);
             $(".user-image").attr('src',image);
        }
       });
  }
</script>
</body>
</html>