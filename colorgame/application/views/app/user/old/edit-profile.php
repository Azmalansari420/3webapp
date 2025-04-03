<?php 
$count_cart = count_cart();
include('include/allcss.php'); ?>
    <!-- Preloader end-->
<style>
	.profile-image{
		display: flex;
    	justify-content: center;
	}
	.icon-edit-2{
	    position: relative;
	    top: 24px;
	    left: -10px;
	}
</style>
	
	<!-- Header -->
	<header class="header header-fixed">
			<div class="container">
				<div class="header-content">
					<div class="left-content">
						<a href="javascript:void(0);" class="menu-toggler">
							<i class="icon feather icon-menu"></i>
						</a>
						<h6 class="title font-14">Edit Profile</h6>
					</div>
					<div class="mid-content header-logo">
					</div>
					<div class="right-content dz-meta">
						<a href="search.php" class="icon">
							<i class="icon feather icon-search"></i>
						</a>
						<a href="wishlist.php" class="icon">
							<i class="icon feather icon-heart"></i>
						</a>
						<a href="cart.php" class="icon shopping-cart">
							<i class="icon feather icon-shopping-cart"></i>
							<span class="badge badge-primary"><?=$count_cart ?></span>
						</a>
					</div>
				</div>
			</div>
		</header>

		
	<!-- Header -->
	<?php include('include/sidebar.php'); ?>
	<!-- Page Content Start -->
	<div class="page-content space-top" style="padding-bottom: 56px;">
		<div class="container">
			<div class="main-profile profile-image">
				<label class="media media-60 me-3 rounded-circle mb-3 ">
					<input type="file" name="image" accept="image/*" class="upload_image" data-target=".user_profile_image" style="display: none;">
					<img src="<?=base_url() ?>media/uploads/users/<?=$full_detail->profile_image ?>" alt="image" onerror="this.src='<?=base_url() ?>assets/images/user-profile.jpg'" class="user-image">
					<i class="icon feather icon-edit-2"></i>
				</label>
			</div>

			<div class="mb-3">
				<label class="form-label" for="email">Email</label>
				<input type="email" id="email" class="form-control" value="<?=$full_detail->email ?>" required >
			</div>

			<div class="mb-3">
				<label class="form-label" for="name">Full Name</label>
				<input type="text" id="name" class="form-control" value="<?=$full_detail->name ?>" required>
			</div>

			<div class="mb-3">
				<label class="form-label" for="phone">Mobile Number</label>
				<input type="tel" id="mobile" class="form-control" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" value="<?=$full_detail->mobile ?>">
			</div>

			<h6 class="title border-bottom pb-2 mb-3 text-center">Address Info</h6>
			<div class="mb-3">
				<label class="form-label" for="address">Address</label>
				<input type="text" id="address" class="form-control" placeholder="Address" value="<?=$full_detail->address ?>">
			</div>
			<div class="mb-3">
				<label class="form-label" for="locality">Locality/Town</label>
				<input type="text" id="locality" class="form-control" placeholder="Locality/Town" value="<?=$full_detail->locality ?>">
			</div>			
			<div class="row gx-3">
				<div class="col-6">
					<div class="mb-3">
						<label class="form-label" for="state">State</label>
						<select name="state" id="state" required class="form-control state-id">
                            <option value="" selected>Select State</option>
                            <?php
                            $state = $this->crud->selectDataByMultipleWhere('state',array('status'=>1));
                            foreach($state as $data)
                                { ?>
                            <option <?php if(!empty($full_detail->state)) if($full_detail->state==$data->id) echo 'selected'; ?> value="<?=$data->id ?>"><?=$data->name ?></option>
                            <?php } ?>
                        </select>

					</div>
				</div>
				<div class="col-6">
					<div class="mb-3">
						<label class="form-label" for="city">City/District</label>
						<select class="city-list form-control" name="city" id="city">
                            <?php
                            $city = $this->crud->selectDataByMultipleWhere('city',array('status'=>1));
                            foreach($city as $data)
                                { ?>
                            <option <?php if(!empty($full_detail->city)) if($full_detail->city==$data->id) echo 'selected'; ?> value="<?=$data->id ?>"><?=$data->name ?></option>
                            <?php } ?>
                        </select>
					</div>
				</div>				
			</div>
			<div class="mb-3">
				<label class="form-label" for="pin">Pin Code</label>
				<input type="text" id="pin" class="form-control" placeholder="Pin Code" value="<?=$full_detail->pin ?>">
			</div>
			
		</div>
	</div>
	<!-- Page Content End -->
	<!-- Footer Start -->
	<div class="footer fixed">
		<div class="container">
			<a href="#!" class="btn btn-primary w-100 submit-btn">Save</a>
		</div>
	</div>
	<!-- Footer End -->
	<?php include('include/multycolor.php'); ?>
</div>  

<?php include('include/allscript.php'); ?>

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

/*---*/
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



  /*----*/

   $(document).on("click", ".submit-btn",(function(e) {
      update_profile();
    }));

    function update_profile()
    {
        var name = $("#name").val();
        var mobile = $("#mobile").val();
        var email = $("#email").val();
        var pin = $("#pin").val();
        var address = $("#address").val();
        var locality = $("#locality").val();
        var state = $("#state").val();
        var city = $("#city").val();

        
        var form = new FormData();
        form.append("user_id", user_id);        
        form.append("name", name);
        form.append("mobile", mobile);
        form.append("email", email);
        form.append("pin", pin);
        form.append("address", address);
        form.append("locality", locality);
        form.append("state", state);
        form.append("city", city);

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

        $.ajax(settings).done(function (response) {
          // console.log(response);
          toaster(response.message, 'success');
        });
    }

</script>