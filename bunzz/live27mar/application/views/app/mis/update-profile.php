<?php
$url = current_url();
// print_r($full_detail->id);


$this->load->view('app/include/header'); 

?>

<style>
    .group-input>label {
        font-size: 14px;
        font-weight: 600;
        color: black;
    }
    .group-input {
        margin-bottom: 30px;
    }
</style>
    <!-- /preload -->
    <div class="header">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center">
                <a href="javascript:;" class="back-btn"> <i class="icon-left"></i> </a>
                <h3>Update Profile</h3>
            </div>
        </div>
    </div>
    <div class="mt-5" style="padding-bottom: 70px;">
        <div class="tf-container">
            <div class="box-user">
                <div class="inner d-flex flex-column align-items-center justify-content-center mb-4">
                    <label class="box-avatar">
                        <input type="file" name="image" accept="image/*" class="upload_image" data-target=".user_profile_image" style="display: none;">
                        <img src="<?=base_url() ?>media/uploads/distributor/<?=$full_detail->profile_image ?>" alt="image" onerror="this.src='<?=base_url() ?>media/uploads/1725100321.jpg'" class="user-image">
                        <span class="icon-camera-to-take-photos"></span>
                    </label>
                    <div class="info">
                        <h2 class="fw_8 mt-3 text-center"><?=$full_detail->name ?></h2>
                    </div>
                </div>                  
            </div>

            <form class="tf-form mt-5" action="">
                
                <div class="group-input">
                    <label>Name</label>
                    <input type="text" placeholder="Name" class="name" value="<?=$full_detail->name ?>">
                </div>
                <div class="group-input">
                    <label>Mobile</label>
                    <input type="text" placeholder="Mobile" class="mobile" value="<?=$full_detail->mobile ?>">
                </div>
                <div class="group-input">
                    <label>Address</label>
                    <textarea class="address"><?=$full_detail->address ?></textarea>
                </div>
                <div class="group-input">
                    <label>State</label>
                    <select name="state" required class="state-id">
                        <option value="" selected>Select State</option>
                        <?php
                        $state = $this->crud->selectDataByMultipleWhere('state',array('status'=>1));
                        foreach($state as $data)
                            { ?>
                        <option <?php if(!empty($full_detail->state)) if($full_detail->state==$data->id) echo 'selected'; ?> value="<?=$data->id ?>"><?=$data->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="group-input">
                    <label>City:</label>
                    <select class="city-list" name="city">
                        <?php
                        $city = $this->crud->selectDataByMultipleWhere('city',array('status'=>1));
                        foreach($city as $data)
                            { ?>
                        <option <?php if(!empty($full_detail->city)) if($full_detail->city==$data->id) echo 'selected'; ?> value="<?=$data->id ?>"><?=$data->name ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="bottom-navigatio4n-bar bottom-btn-fix4ed st2 mt-5">
                    <button type="button" class="tf-btn accent large submit-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>


<?php $this->load->view('app/include/bottom-menus'); ?>
<?php $this->load->view('app/include/sidebar'); ?>
<?php $this->load->view('app/include/notification'); ?>
<?php $this->load->view('app/include/footer'); ?>


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
         "headers": {
            "token": sessionStorage.getItem("token")
          },
         "contentType": false,
         "dataType": "json",
         "data": form
       };
       $.ajax(settings).done(function (response) {
        // console.log(response);
        toaster(response.message, 'success');
        if(response.status==200)
        {
             $(".user_profile_image").attr('src',image);
             $(".user-image").attr('src',image);
        }
       });
  }




























    $(document).on("click", ".submit-btn",(function(e) {
      update_profile();
    }));

    function update_profile()
    {
        var name = $(".name").val();
        var mobile = $(".mobile").val();
        var address = $(".address").val();
        var state = $(".state-id").val();
        var city = $(".city-list").val();

        
        var form = new FormData();
        form.append("user_id", user_id);
        
        form.append("name", name);
        form.append("mobile", mobile);
        form.append("address", address);
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
          console.log(response);
          toaster(response.message, 'success');
        });
    }

    
        // toaster('This is an error message!', 'error');
</script>