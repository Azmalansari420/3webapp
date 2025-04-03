<?php
$url = current_url();

$this->load->view('app/include/header');
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
                <h3>Add Distributor</h3>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <div class="tf-container">
            <form class="tf-form" method="post" id="main-form">
                <input type="hidden" class="nsm_id" value="<?=$full_detail->nsm_id ?>">
                <input type="hidden" class="rsm_id" value="<?=$full_detail->rsm_id ?>">
                <input type="hidden" class="asm_id" value="<?=$full_detail->asm_id ?>">
                <input type="hidden" class="sales_office_id" value="<?=$full_detail->id ?>">
                <input type="hidden" class="firebase_token" value="<?=$this->session->userdata('firebase_token') ?>">
                <input type="hidden" class="device_id" value="<?=$this->session->userdata("device_id") ?>">

                <div class="group-input">
                    <label>Distrubutor Name</label>
                    <input type="text" placeholder="Distrubutor Name" class="name_val">
                </div>
                <div class="group-input">
                    <label>Distrubutor Firm Name</label>
                    <input type="text" placeholder="Distrubutor Firm Name" class="firm_name">
                </div>
                <div class="group-input">
                    <label>Distributor Contact Person</label>
                    <input type="number" placeholder="Distributor Contact Person" class="mobile">
                </div>
                <div class="group-input">
                    <label>Distributor Email</label>
                    <input type="email" placeholder="Distributor Email" class="email">
                </div>
                <div class="group-input">
                    <label>GSTIN Number</label>
                    <input type="text" placeholder="GSTIN Number" class="gst_no">
                </div>
                <div class="group-input">
                    <label>Distributor Address</label>
                    <input type="text" placeholder="Distributor Address" class="address">
                </div>

                <div class="group-btn-change-name">
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
     $(document).on("click", ".submit-btn",(function(e) {
      add_distibuter();
    }));

    function add_distibuter()
    {
        var firebase_token = $(".firebase_token").val();
        var device_id = $(".device_id").val();

        var nsm_id = $(".nsm_id").val();
        var rsm_id = $(".rsm_id").val();
        var asm_id = $(".asm_id").val();
        var sales_office_id = $(".sales_office_id").val();

        var name = $(".name_val").val();
        var firm_name = $(".firm_name").val();
        var mobile = $(".mobile").val();
        var email = $(".email").val();
        var gst_no = $(".gst_no").val();
        var address = $(".address").val();

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

        var form = new FormData();
        form.append("firebase_token", firebase_token);
        form.append("device_id", device_id);
        form.append("nsm_id", nsm_id);
        form.append("rsm_id", rsm_id);
        form.append("asm_id", asm_id);
        form.append("sales_office_id", sales_office_id);
        form.append("name", name);
        form.append("firm_name", firm_name);
        form.append("mobile", mobile);
        form.append("email", email);
        form.append("gst_no", gst_no);
        form.append("address", address);

        var settings = {
          "url": "<?=base_url() ?>api/Distributor/add_distributor",
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
              $('#main-form').trigger('reset');
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