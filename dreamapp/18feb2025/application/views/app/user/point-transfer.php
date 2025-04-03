<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php include('include/allcss.php'); ?>
</head>
<body class='sc5'>
    <!-- preloader area start -->
    <?php include('include/loader.php'); ?>
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>
    <style>
   
    .single-page-area {
        padding-top: 50px;
    }
    .profile-details {
        margin-top: 24px;
        border-radius: 0;
    }
    .profile-list-inner li .single-profile-wrap 
    {
        background: #5b0100;
    }
</style>
    
    <div class="single-page-area">
        <div class="title-area justify-content-between">
            <a class="btn back-page-btn" href="home.php"><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4 text-white"><?=lang("Amount Transfer") ?></h3>
            <div class="balance"><?=$full_detail->wallet ?> <span><img src="<?=base_url() ?>assets/coin.png" alt="img"></span></div> 
        </div>

        

                
        <div class="container">
            <div class="my-profile-detail">
                <h6 class="title">User Information</h6>
                <form class="edit-form-wrap">
                    <div class="single-input-wrap">
                        <label><?=lang("Enter User ID") ?></label>
                        <input type="text" class="form-control" placeholder="<?=lang("Enter User ID") ?>" id="user_id" >
                    </div>

                    <div class="single-input-wrap">
                        <label><?=lang("Amount") ?></label>
                        <input type="number" class="form-control" placeholder="<?=lang('Amount') ?>" id="amount" >
                    </div>
                                      
                    <a class="btn btn-base w-100 mt-4 submit-btn" href="javascript:void(0);"><?=lang("Transfer") ?></a>
                </form>
            </div>
        </div>
          <?php include('include/menubar.php'); ?>
    </div>     

   <?php include('include/allscript.php'); ?>



<script>
    const user_id = '<?=$full_detail->id ?>';

   

      $(document).on("click", ".submit-btn",(function(e) {
          transfer_amt();
        }));

        function transfer_amt()
        {
            var user_id = $("#user_id").val();
            var amount = $("#amount").val();

            if(user_id=="")
            {
                toaster("Enter User ID", 'error');
                return false;
            }
            if(amount=="")
            {
                toaster("Enter Amount", 'error');
                return false;
            }
            
            var form = new FormData();
            form.append("user_id", user_id);        
            form.append("amount", amount);

            var settings = {
              "url": "<?=base_url() ?>api/wallet/point_transfer",
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
              console.log(response.update_wallet_amount);
              if(response.status==200)
              {
                  toaster(response.message, 'success');
                  $('#user_id').val("");
                  $('#amount').val("");
                  $('.balance').html(response.update_wallet_amount);
              }
              else
              {
                  toaster(response.message, 'error');

              }
            });
        }
</script>





</body>
</html>