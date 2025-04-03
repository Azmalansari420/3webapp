<?php
$this->load->view('app/include/header');
$id = $this->input->get('id');

$get_details = $this->crud->selectDataByMultipleWhere('users',array('id'=>$id));
if(!empty($get_details))
{
    $get_details = $get_details[0];
}

?>
<style>
    .group-input>label {
    color: black;
    font-size: 13px;
}
select, textarea, input[type=text], input[type=password], input[type=datetime], input[type=datetime-local], input[type=date], input[type=month], input[type=time], input[type=week], input[type=number], input[type=email], input[type=url], input[type=search], input[type=tel], input[type=color]
{
    border: 1px solid #000000;
    background: #ffffff;
    padding: 15px 14px;
}
</style>


    <div class="header">
        <div class="tf-container">
            <div class="tf-statusbar d-flex justify-content-center align-items-center">
                <a href="#" class="back-btn"> <i class="icon-left"></i> </a>
                <h3>Update Details</h3>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <div class="tf-container">
            <form class="tf-form" method="post" id="main-form">
                
                <input type="hidden" class="firebase_token" value="<?=$this->session->userdata('firebase_token') ?>">
                <input type="hidden" class="device_id" value="<?=$this->session->userdata("device_id") ?>">

                <div class="group-input">
                    <label>Name</label>
                    <input type="text" placeholder="Name" class="name_val" value="<?=$get_details->name ?>">
                </div>
                
                <div class="group-input">
                    <label>Mobile</label>
                    <input type="number" placeholder="Mobile" class="mobile" value="<?=$get_details->mobile ?>">
                </div>
                <div class="group-input">
                    <label>Email</label>
                    <input type="email" placeholder="Email" class="email" value="<?=$get_details->email ?>">
                </div>                
                <div class="group-input">
                    <label>Password</label>
                    <input type="email" placeholder="Password" class="password" value="<?=$get_details->password ?>">
                </div>
            
                <div class="group-input">
                    <label>Address</label>
                    <input type="text" placeholder="Address" class="address" value="<?=$get_details->address ?>">
                </div>

                <div class="group-input">
                    <label>State:</label>
                    <select name="state" required class="state-id">
                        <option value="" selected>Select State</option>
                        <?php
                        $state = $this->crud->selectDataByMultipleWhere('state',array('status'=>1));
                        foreach($state as $data)
                            { ?>
                        <option <?php if(!empty($get_details->state)) if($get_details->state==$data->id) echo 'selected'; ?> value="<?=$data->id ?>"><?=$data->name ?></option>
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
                        <option <?php if(!empty($get_details->city)) if($get_details->city==$data->id) echo 'selected'; ?> value="<?=$data->id ?>"><?=$data->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <?php
                // print_r($get_details->status);
                // die;
                ?>
                <div class="group-input">
                    <label>Status:</label>
                    <select class="status" name="status">
                        <option value="1" <?php if(!empty($get_details->status)) if($get_details->status==1) echo 'selected'; ?>>Active</option>
                        <option value="0" <?php if(!empty($get_details->status)) if($get_details->status==0) echo 'selected'; ?>>In-Active</option>
                    </select>
                </div>

                <div class="group-btn-change-name">
                    <button type="button" class="tf-btn accent large submit-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
  
  
    


<?php $this->load->view('app/include/sidebar'); ?>
<?php $this->load->view('app/include/notification'); ?>
<?php $this->load->view('app/include/footer'); ?>

<script>
     $(document).on("click", ".submit-btn",(function(e) {
      add_distibuter();
    }));

    function add_distibuter()
    {
        var firebase_token = $(".firebase_token").val();
        var device_id = $(".device_id").val();

        var name = $(".name_val").val();
        var mobile = $(".mobile").val();
        var email = $(".email").val();
        var password = $(".password").val();
        var address = $(".address").val();
        var state = $(".state-id").val();
        var city = $(".city-list").val();
        var status = $(".status").val();

        var user_id = '<?=$id ?>';

        if(name=='')
        {
            toaster('Enter Name', 'success');
            return false;
        }
        if(mobile=='')
        {
            toaster('Enter Contact', 'success');
            return false;
        }
        if(email=='')
        {
            toaster('Enter Email', 'success');
            return false;
        }
        if(password=='')
        {
            toaster('Enter Password', 'success');
            return false;
        }

        var form = new FormData();
        form.append("user_id", user_id);
        form.append("firebase_token", firebase_token);
        form.append("device_id", device_id);
        form.append("name", name);
        form.append("mobile", mobile);
        form.append("email", email);
        form.append("password", password);
        form.append("address", address);
        form.append("state", state);
        form.append("city", city);
        form.append("status", status);

        var settings = {
          "url": "<?=base_url() ?>api/asm/update_salesofficer",
          "method": "POST",
          "dataType": "json",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": form
        };

        $.ajax(settings).done(function (response) {
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

</script>