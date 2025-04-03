<?php include('include/header.php'); ?>
	
	
	<!-- Header -->
		<header class="header shadow header-fixed border-0">
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

	<style type="text/css">
		img.user-image {
		    width: 100px;
		}
		.media {
	    display: flex;
	    align-items: center;
	    justify-content: center;
	}

	.icon-update {
	    position: relative;
	    top: -14px;
	    left: 25px;
	}
	</style>
	
	<!-- Page Content Start -->
	<div class="page-content space-top">
		<div class="container">

			<div class="my-profile-wrap text-center">
                <div class="media">
                    <label class="thumb">
                        <img src="<?=base_url() ?>media/uploads/users/<?=$full_detail->profile_image ?>" alt="img" class="user-image" width="100px">
                        <div class="icon icon-update">
                            <input type="file" name="image" accept="image/*" class="upload_image" data-target=".user_profile_image" style="display: none;">
                            <i class="fa fa-camera" style="color: #e3b706;"></i>
                        </div>
                    </label>
                </div>
            </div>

            <div class="mb-3">
				<label class="form-label" for="name">Username</label>
				<input type="text" id="name" value="<?=$full_detail->name ?>" class="form-control" >
			</div>

			
			
			<div class="mb-3">
				<label class="form-label" for="email">Email</label>
				<input type="email" id="email" class="form-control" value="<?=$full_detail->email ?>">
			</div>
			<div class="mb-3">
				<label class="form-label" for="mobile">Mobile</label>
				<input type="text" id="mobile" class="form-control"  value="<?=$full_detail->mobile ?>">
			</div>
		</div>
	</div>
	<!-- Page Content End -->
	<!-- Footer Start -->
	<div class="footer fixed">
		<div class="container">
			<a href="javascript:void(0);" class="btn btn-primary w-100 submit-btn">Update</a>
		</div>
	</div>
	<!-- Footer End -->
</div>  


<?php include('include/footer.php'); ?>

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
            var name = $("#name").val();
            var mobile = $("#mobile").val();
            var email = $("#email").val();

            
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
              if(response.status==200)
              {
	              toaster(response.message, 'success');
	              $('.profile-name').html(response.data.name)
	              $('.profile-mail').html(response.data.email)
              }
              else
              {
	             toaster(response.message, 'error');

              }
            });
        }
</script>

