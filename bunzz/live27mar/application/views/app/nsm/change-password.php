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
                <h3>Change Password</h3>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <div class="tf-container">
            <form class="tf-form" action="">
                <input type="hidden" class="user_id" value="<?=$full_detail->id ?>">
                <div class="group-input">
                    <label>Enter Old Password</label>
                    <input type="text" placeholder="6-20 characters" class="oldpassword">
                </div>
                <div class="group-input">
                    <label>Create New Password</label>
                    <input type="text" placeholder="6-20 characters" class="npassword">
                </div>
                <div class="group-input last">
                    <label>Comfirm Password</label>
                    <input type="text" placeholder="6-20 characters" class="cpassword">
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

    $(document).on("click", ".submit-btn",(function(e) {
      login_distibuter();
    }));

    function login_distibuter()
    {
        var user_id = $(".user_id").val();
        var oldpassword = $(".oldpassword").val();
        var npassword = $(".npassword").val();
        var cpassword = $(".cpassword").val();

        if(oldpassword=="")
        {
            toaster("Enter Old Password.", 'success');
            return false;
        }
        if(npassword=="")
        {
            toaster("Enter New Password.", 'success');
            return false;
        }
        if(cpassword=="")
        {
            toaster("Enter Confirm Password.", 'success');
            return false;
        }

        var form = new FormData();
        form.append("user_id", user_id);
        form.append("oldpassword", oldpassword);
        form.append("npassword", npassword);
        form.append("cpassword", cpassword);

        var settings = {
          "url": "<?=base_url() ?>api/user/password_update",
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