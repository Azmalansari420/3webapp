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
                <h3>Add Sales Officers</h3>
            </div>
        </div>
    </div>
    <div class="mt-5" style="padding-bottom: 70px;">
        <div class="tf-container">
            
            <form class="tf-form mt-5" action="" id="form-data">
                <div class="group-input">
                    <label>Enter Name</label>
                    <input type="text" placeholder="Enter Name.." class="name">
                </div>
                <div class="group-input">
                    <label>Enter Mobile</label>
                    <input type="text" placeholder="Enter Mobile.." class="mobile">
                </div>                
                
                <div class="group-input">
                    <label>Address</label>
                    <textarea class="address" rows="5" placeholder="Enter Address.."></textarea>
                </div>

                <div class="group-input">
                    <label>State:</label>
                    <select name="state" required class="state-id">
                        <option value="" selected>Select State</option>
                        <?php
                        $state = $this->crud->selectDataByMultipleWhere('state',array('status'=>1));
                        foreach($state as $data)
                            { ?>
                        <option  value="<?=$data->id ?>"><?=$data->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="group-input">
                    <label>City:</label>
                    <select class="city-list" name="city">
                        <option value="" selected>Select City</option>
                        <?php
                        $city = $this->crud->selectDataByMultipleWhere('city',array('status'=>1));
                        foreach($city as $data)
                            { ?>
                        <option value="<?=$data->id ?>"><?=$data->name ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="group-input">
                    <label>Enter Email</label>
                    <input type="text" placeholder="Enter Email.." class="email">
                </div> 
                <div class="group-input">
                    <label>Enter Password</label>
                    <input type="text" placeholder="Enter Password.." class="password">
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

const rsm_id = '<?=$full_detail->id ?>';
const nsm_id = '<?=$full_detail->nsm_id ?>';



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
        var email = $(".email").val();
        var password = $(".password").val();

        if(name=='')
        {
            toaster('Enter Name..', 'success');
            return false;
        }
        if(email=='')
        {
            toaster('Enter Email.', 'success');
            return false;
        }
        if(password=='')
        {
            toaster('Enter Password.', 'success');
            return false;
        }

        
        var form = new FormData();
       
        form.append("nsm_id", nsm_id);
        form.append("rsm_id", rsm_id);
        form.append("name", name);
        form.append("mobile", mobile);
        form.append("address", address);
        form.append("state", state);
        form.append("city", city);
        form.append("email", email);
        form.append("password", password);

        var settings = {
          "url": "<?=base_url() ?>api/rsm/add_asm",
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
          if(response.status == 200) 
            {
              toaster(response.message, 'success');
              setTimeout(function() {
                window.location.href = response.url;
              }, 2000); // Redirect after 2 seconds
            } 
            else 
            {
              toaster(response.message, 'success');
            }
        });
    }

    
        // toaster('This is an error message!', 'error');
</script>