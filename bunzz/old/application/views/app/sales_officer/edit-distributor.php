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
                <h3>Update Distributor</h3>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <div class="tf-container">
            <form class="tf-form" method="post" id="main-form">
                
                <input type="hidden" class="firebase_token" value="<?=$this->session->userdata('firebase_token') ?>">
                <input type="hidden" class="device_id" value="<?=$this->session->userdata("device_id") ?>">

                <div class="group-input">
                    <label>Distrubutor Name</label>
                    <input type="text" placeholder="Distrubutor Name" class="name_val" value="<?=$get_details->name ?>">
                </div>
                <div class="group-input">
                    <label>Distrubutor Firm Name</label>
                    <input type="text" placeholder="Distrubutor Firm Name" class="firm_name" value="<?=$get_details->firm_name ?>">
                </div>
                <div class="group-input">
                    <label>Distributor Contact Person</label>
                    <input type="number" placeholder="Distributor Contact Person" class="mobile" value="<?=$get_details->mobile ?>">
                </div>
                <div class="group-input">
                    <label>Distributor Email</label>
                    <input type="email" placeholder="Distributor Email" class="email" value="<?=$get_details->email ?>">
                </div>                
                <div class="group-input">
                    <label>Distributor Password (Auto Genrated)</label>
                    <input type="email" placeholder="Distributor Password" class="password" value="<?=$get_details->password ?>">
                </div>
                
                <div class="group-input">
                    <label>GSTIN Number</label>
                    <input type="text" placeholder="GSTIN Number" class="gst_no" value="<?=$get_details->gst_no ?>">
                </div>
                <div class="group-input">
                    <label>Distributor Address</label>
                    <input type="text" placeholder="Distributor Address" class="address" value="<?=$get_details->address ?>">
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
        var firm_name = $(".firm_name").val();
        var mobile = $(".mobile").val();
        var email = $(".email").val();
        var gst_no = $(".gst_no").val();
        var address = $(".address").val();
        var password = $(".password").val();

        var user_id = '<?=$id ?>';

        if(name=='')
        {
            toaster('Enter Distrubutor Name', 'success');
            return false;
        }
        if(firm_name=='')
        {
            toaster('Enter Distrubutor Firm Name', 'success');
            return false;
        }
        if(mobile=='')
        {
            toaster('Enter Distrubutor Contact', 'success');
            return false;
        }
        if(email=='')
        {
            toaster('Enter Distrubutor Email', 'success');
            return false;
        }
        if(password=='')
        {
            toaster('Enter Distrubutor Password', 'success');
            return false;
        }

        var form = new FormData();
        form.append("user_id", user_id);
        form.append("firebase_token", firebase_token);
        form.append("device_id", device_id);
        form.append("name", name);
        form.append("firm_name", firm_name);
        form.append("mobile", mobile);
        form.append("email", email);
        form.append("gst_no", gst_no);
        form.append("address", address);
        form.append("password", password);

        var settings = {
          "url": "<?=base_url() ?>api/Distributor/update_distributor",
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