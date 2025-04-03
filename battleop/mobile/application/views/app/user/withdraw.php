
<!DOCTYPE html>
<html lang="zxx">
<head>
     <?php include('include/allcss.php'); ?>
</head>
<body class='sc5 dark'>
    <!-- preloader area start -->
    <?php include('include/loader.php'); ?>
     <style>
        .single-page-area .title-area {
            padding: 14px 20px 14px;
        }
        .single-page-area {
            padding-top: 60px;
        }
         .money-btn {
        position: inherit !important;
        background: white !important;
        color: black !important;
        border-radius: 7px;
        padding: 0px 20px;
        height: 35px;
        line-height: 1;
        margin: 0 0 5px 0;
    }
    .money-btn:after {
        content: inherit;
    }
    </style>
    
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>

    
    <div class="single-page-area">
        <div class="title-area">
            <a class="btn back-page-btn" href=""><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4">Withdrawal </h3>
        </div>
        <div class="container">
            
            <div class="amount-wrap mt-5">
                <div class="title-wrap">
                    <h6>Amount To Withdrawal </h6>
                    <!-- <span>500 - 10,000</span> -->
                </div>
                <div class="single-input-wrap pb-3">
                    <input type="text" class="form-control" placeholder="Enter Your UPI Id's" id="upi_id">
                </div>
                <div class="single-input-wrap pb-3">
                    <input type="text" class="form-control" placeholder="Enter Account Holder Name" id="account_holder_id">
                </div>
                <div class="single-input-wrap pb-3">
                    <input type="text" class="form-control" placeholder="Enter Amount" id="w_amount" readonly>
                </div>
                
                <?php  
                    $buttons = explode(",", $sitesetting[0]->withdraw);
                    foreach ($buttons as $key => $value) {
                    ?>
                        <button type="button" class="btn btn-default money-btn" data-amt="<?=$value ?>"><?=$value ?></button>
                    <?php } ?>
            </div>
            <button class="btn btn-base w-100 wallet-withdraw-btn" >Continue</button>
        </div>
        <?php include('include/menubar.php'); ?>               
    </div>  


     <?php include('include/allscript.php'); ?>

<script>
 var amount = 0;
    $(document).on("click", ".money-btn",(function(e) {
        amount = $(this).data('amt');    
        $("#w_amount").val(amount);
    }));


    $(document).on("click", ".wallet-withdraw-btn",(function(e) {
      user_withdraw();
    })); 

    function user_withdraw()
    {
        var amount = $("#w_amount").val();
        var upi_no = $("#upi_id").val();
        var account_holder_id = $("#account_holder_id").val();

        if(upi_no=='')
        {
            print_toast('Please Enter Your UPI No');
            return false;
        }
        if(amount=='')
        {
            print_toast('Please Select Amount');
            return false;
        }
        if(account_holder_id=='')
        {
            print_toast('Please Enter Account Holder Name');
            return false;
        }



        var form = new FormData();
        form.append("amount", amount);
        form.append("upi_no", upi_no);
        form.append("account_holder_id", account_holder_id);

        var settings = {
          "url": "<?=base_url() ?>api/user/new_withdraw_request",
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
          print_toast(response.message);
        });
    }
</script>



</body>
</html>