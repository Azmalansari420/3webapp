<?php
$user = getuserdata();
include('include/header.php'); ?>
 
<body>
<div class="page-wrapper">
    
	<!-- Preloader -->
	<?php include('include/loader.php'); ?>

    <!-- Preloader end-->
<style>
	.page-content.space-top {
	    padding-bottom: 75px;
	}
	.form-label {
	 color: black;
	}
</style>
	
	<!-- Header -->
		<header class="header header-fixed">
			<div class="container">
				<div class="header-content">
					<div class="left-content">
						<a href="javascript:void(0);" class="back-btn">
							<i class="icon feather icon-chevron-left"></i>
						</a>
						<h6 class="title">Edit Profile</h6>
					</div>
					<div class="mid-content">
					</div>
					<div class="right-content">
					</div>
				</div>
			</div>
		</header>
	<!-- Header -->
<style>
	i.icon.feather.icon-edit {
    font-size: 21px;
    position: relative;
    left: -9%;
    top: 45px;
    color: black;
}
</style>
	
	<!-- Page Content Start -->
	<div class="page-content space-top">
		<div class="container">


			<label class="box-avatar text-center">
          <input type="file" name="image" accept="image/*" class="upload_image" data-target=".user_profile_image" style="display: none;">
          <img src="<?=base_url() ?>media/uploads/<?=$user[0]->image ?>" alt="image" onerror="this.src='<?=base_url() ?>media/uploads/1725100321.jpg'" class="user-image" style="width: 36%;">
          <i class="icon feather icon-edit"></i>
      </label>




			<div class="mb-3">
				<label class="form-label" for="name">Name</label>
				<input type="text" id="name" class="form-control" value="<?=$user[0]->name ?>" required>
			</div>
			<div class="mb-3">
				<label class="form-label" for="email">Email</label>
				<input type="email" id="email" class="form-control" value="<?=$user[0]->email ?>" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="mobile">Mobile Number</label>
				<input type="tel" id="mobile" class="form-control" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" value="<?=$user[0]->mobile ?>" >
			</div>
			<?php
				if($user[0]->role==1)
					{ ?>
			<div class="mb-3">
				<label class="form-label" for="qualification">Qualification</label>
				<input type="text" id="qualification" class="form-control"  value="<?=$user[0]->qualification ?>" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="adhar">Aadhar card no</label>
				<input type="text" id="adhar" class="form-control"  value="<?=$user[0]->adhar ?>" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="dob">D.O.B</label>
				<input type="text" id="dob" class="form-control"  value="<?=$user[0]->dob ?>" required>
			</div>
		<?php }
		
					 ?>
			<div>
				<label class="form-label te1xt-white" for="password">Password</label>
				<div class="mb-3 input-group input-group-icon">
					<input type="password" id="password" class="form-control dz-password" placeholder="Type Password Here" value="<?=$user[0]->password ?>">
					<span class="input-group-text show-pass"> 
						<i class="icon feather icon-eye-off eye-close"></i>
						<i class="icon feather icon-eye eye-open"></i>
					</span>
				</div>
			</div>
		<?php if($user[0]->role==1)
					{ ?>

			<div class="mb-3">
				<label class="form-label" for="address">Gender</label>
			</div>
			<div class="d-flex align-items-center " style="justify-content: space-between;">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="radioNoLabel" id="gender" value="1" aria-label="..." <?php if($user[0]->gender==1) echo 'checked' ?>>
					Male
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="radioNoLabel" id="gender" value="2" aria-label="..." <?php if($user[0]->gender==2) echo 'checked' ?>>
					FeMale
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="radioNoLabel" id="gender" value="3" aria-label="..." <?php if($user[0]->gender==3) echo 'checked' ?>>
					Other
				</div>
			</div>
		<?php } ?>
		</div>
		<div class="container pt-0">
			<button type="button" class="btn btn-primary w-100 update-btn">Save</button>
		</div>
	</div>
	<!-- Page Content End -->

<?php include('include/menu-bar.php'); ?>
	
</div> 

<?php include('include/footer.php'); ?>
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
               }
               reader.readAsDataURL(this.files[i]);
           }
     }
  });


  function  update_profile_image(image)
  {
       var form = new FormData();
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
        toast_print(1,response.message);
        if(response.status==200)
        {
             $(".user_profile_image").attr('src',image);
             $(".user-image").attr('src',image);
        }
       });
  }








      $(document).on("click", ".update-btn",(function(e) {
        register();
      }));
      
      function register()
      {
        var name = $("#name").val();
        var email = $("#email").val();
        var qualification = $("#qualification").val();
        var adhar = $("#adhar").val();
        var dob = $("#dob").val();
        var mobile = $("#mobile").val();
        var password = $("#password").val();
        var gender = $("#gender:checked").val();

        
        $(".loader-wrapper").addClass("show");

        var form = new FormData();        
        form.append("name", name);
        form.append("email", email);
        form.append("qualification", qualification);
        form.append("adhar", adhar);
        form.append("dob", dob);
        form.append("mobile", mobile);
        form.append("password", password);
        form.append("gender", gender);


        var settings = {
          "url": "<?php echo base_url('api/user/user_profile_update'); ?>",
          "dataType":"json",
          "method": "POST",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": form
        };

        $.ajax(settings).done(function (response) {
          console.log(response);
          $(".loader-wrapper").removeClass("show");
          toast_print(1,response.message);
        });
      }
    </script>
