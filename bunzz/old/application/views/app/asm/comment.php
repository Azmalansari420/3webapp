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
                <h3>Comment & Feedback</h3>
            </div>
        </div>
    </div>
    <div class="mt-5" style="padding-bottom: 70px;">
        <div class="tf-container">
            
            <form class="tf-form mt-5" action="" id="form-data">                
                <div class="group-input">
                    <label>Name</label>
                    <input type="text" placeholder="Name" class="name" value="<?=$full_detail->name ?>">
                </div>
                <div class="group-input">
                    <label>Mobile</label>
                    <input type="text" placeholder="Mobile" class="mobile" value="<?=$full_detail->mobile ?>">
                </div>
                <div class="group-input">
                    <label>Email</label>
                    <input type="text" placeholder="Email" class="email" value="<?=$full_detail->email ?>">
                </div>

                <div class="group-input">
                    <label>Subject</label>
                    <input type="text" placeholder="Subject" class="subject">
                </div>


                <div class="group-input">
                    <label>Message</label>
                    <textarea class="message"></textarea>
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



    $(document).on("click", ".submit-btn",(function(e) {
      update_profile();
    }));

    function update_profile()
    {
        var name = $(".name").val();
        var mobile = $(".mobile").val();
        var email = $(".email").val();
        var subject = $(".subject").val();
        var message = $(".message").val();

        if(message=='')
        {
            toaster('Enter Message', 'success');
            return false;
        }

        
        var form = new FormData();
        form.append("user_id", user_id);        
        form.append("name", name);
        form.append("mobile", mobile);
        form.append("email", email);
        form.append("subject", subject);
        form.append("message", message);

        var settings = {
          "url": "<?=base_url() ?>api/asm/commentfeedback",
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
          if(response.status==200)
          {
            $('.message').val('');
            $('.subject').val('');
          }
        });
    }

    
        // toaster('This is an error message!', 'error');
</script>