<?php
$sitesetting = $this->crud->fetchdatabyid('1','site_setting');
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php include('include/allcss.php'); ?>
<style>
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
</head>
<body class='sc5 dark'>
    <!-- preloader area start -->
    <?php include('include/loader.php'); ?>
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>
    <style>
    	.single-page-area .title-area {
		    padding: 14px 20px 14px;
		}
		.single-page-area {
		    padding-top: 25px;
		}
    </style>
    
    <div class="single-page-area">
        <div class="title-area">
            <a class="btn back-page-btn" href=""><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4">Deposit</h3>
        </div>
        <div class="container">
           <!--  <div class="payment-method-card">
                <h6>Select Payment Method</h6>
                <div class="payment-method-select">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1"><img src="<?=base_url() ?>assets/img/card/2.png" alt="img"></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2"><img src="<?=base_url() ?>assets/img/card/3.png" alt="img"></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                        <label class="form-check-label" for="inlineRadio3"><img src="<?=base_url() ?>assets/img/card/4.png" alt="img"></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4">
                        <label class="form-check-label" for="inlineRadio4"><img src="<?=base_url() ?>assets/img/card/5.png" alt="img"></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option5">
                        <label class="form-check-label" for="inlineRadio5"><img src="<?=base_url() ?>assets/img/card/6.png" alt="img"></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio6" value="option6">
                        <label class="form-check-label" for="inlineRadio6"><img src="<?=base_url() ?>assets/img/card/7.png" alt="img"></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio7" value="option7">
                        <label class="form-check-label" for="inlineRadio7"><img src="<?=base_url() ?>assets/img/card/8.png" alt="img"></label>
                    </div>
                </div>
            </div> -->

            <div class="amount-wrap mt-5">
                <div class="title-wrap" >
                    <h6>Amount To Deposit</h6>
                </div>
<style>
    span.show-small {
        font-size: x-small;
        position: relative;
        left: 10px;
        top: -4px;
    }
</style>
                    <span class="show-small" style="display:none;">click to select other Option</span>
                <div class="single-input-wrap" style="display:none;">
                    <select class="form-control" name="type" id="w_type" required style="border: 1px solid #ffffff !important;">
                        <option value="1">Gpay <i class="ri-arrow-left-s-line"></i></option>
                        <option selected value="2">Phone Pay</option>
                        <option value="3">PayTM</option>
                    </select>
                </div>
                <div class="single-input-wrap mb-2">
                    <input type="text" class="form-control" placeholder="Enter Your Amount" id="w_amount" readonly required>
                </div>

                    <?php  
                    $buttons = explode(",", $sitesetting[0]->buttons);
                    foreach ($buttons as $key => $value) {
                    ?>
                        <button type="button" class="btn btn-default money-btn" data-amt="<?=$value ?>"><?=$value ?></button>
                    <?php } ?>
                <!-- </div> -->

                
            </div>
            <button class="btn btn-base w-100 wallet-add-btn" >Continue</button>
        </div>

        <div class="loader-class" id="loader" style="display:none;position: relative; bottom: 311px;text-align: center;background: #c3adada3;padding: 15px 0 !important;">
            <img src="<?=base_url() ?>media/uploads/site_setting/<?=$sitesetting[0]->logo ?>" class="img-fluid" style="height: 126px;">
            <h2 style="    color: black;">Loading</h2>
        </div>
         <?php include('include/menubar.php'); ?>        
    </div>  

    

    <div class="modal fade filter-modal-popup" id="deposit-success-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="modal-card-wrap text-center">
                        <div class="icon">
                            <i class="ri-check-line"></i>
                        </div>
                        <h3 class="title"> Deposit Success!</h3>
                        <p>You have successfully deposited funds in your wallet!</p>
                        <a class="btn btn-base w-100" href="">Got It</a>               
                    </div>
                </div>              
            </div>            
        </div>
    </div>


    

    <?php include('include/allscript.php'); ?>




<script type="text/javascript">
    var amount = 0;

    $(document).on("click", ".money-btn",(function(e) {
        amount = $(this).data('amt');    
        $("#w_amount").val(amount);
    }));

    $(document).on("click", ".wallet-add-btn",(function(e) {
        qr_recharge();
        click_btn = $(this);
        $(click_btn).attr('disabled', true);
    }));


    function qr_recharge()
    {
        if(amount<1)
        {
            print_toast("Please Select Amount");
            return false;
        }

        var form = new FormData();
        form.append("amount", amount);

        var settings = {
          "url": "<?=base_url() ?>Create_qr/recharge_request",
          "method": "POST",
          "dataType": "Json",
          "timeout": 0,
          "processData": false,
          "mimeType": "multipart/form-data",
          "contentType": false,
          "data": form
        };

        $.ajax(settings).done(function (response) {
          console.log(response);
          $(click_btn).attr('disabled', false);
          if(response.url!='')
          {
            window.location.href=response.url;
          }
          else
          {
            print_toast("Error")
          }
        });
    }














   //  $(document).on("click", ".money-btn",(function(e) {
   //      amount = $(this).data('amt');    
   //      $("#w_amount").val(amount);
   //  }));


   //  $(document).on("click", ".wallet-add-btn",(function(e) {
        
   //      wallet_recharge();
   //      click_btn = $(this);
   //      $(click_btn).attr('disabled', true);
   //      // upi_firbase();
   //  })); 

   //  function wallet_recharge()
   //  {
   //      type = $("#w_type").val();


   //      if(type=='')
   //      {
   //          print_toast('Select type');
   //          return false;
   //      }

   //      if(amount<1)
   //      {
   //          print_toast("Please Select Amount");
   //          return false;
   //      }


   //      $('#loader').show();

   //      var form = new FormData();
   //      form.append("type", type);
   //      form.append("amount", amount);

   //      var settings = {
   //        "url": "<?=base_url() ?>api/user/user_wallet_recharge",
   //        "method": "POST",
   //        "dataType": "Json",
   //        "timeout": 0,
   //        "processData": false,
   //        "mimeType": "multipart/form-data",
   //        "contentType": false,
   //        "data": form
   //      };

   //      $.ajax(settings).done(function (response) {
   //        console.log(response);

   //         upi_firbase();
   //         if(response.status==400)
   //        print_toast(response.message);
   //      });
   //  }

   //     function delete_firbase()
   // {
   //      var form = new FormData();
   //      form.append("user_id", 0);
   //      var settings = {
   //        "url": "<?=base_url('api/user/delete_firbase') ?>",
   //        "method": "POST",
   //        "processData": false,
   //        "mimeType": "multipart/form-data",
   //        "headers": {
   //              "token": sessionStorage.getItem("token")
   //            },
   //        "contentType": false,
   //        // "dataType":"json",
   //        "data": form
   //      };
   //      $.ajax(settings).done(function (response) {
   //        // console.log(response);
   //        // $(".preload").hide(); 
   //      }); 
   // }




   //  var type = 0;
   //  var click_btn = '';
   //  $(document).on("click", ".pay-svg",(function(e) {
   //      type = $(this).data('type');
   //      click_btn = $(this);
   //      add_point_request();
   //  }));

    
   //  function upi_firbase() 
   //  {
   //      event.preventDefault();
   //      $(".preload").show();   
   //      type = $("#w_type").val();
   //      // var amount = $("#amount").val();
   //      var form = new FormData();
   //      form.append("user_id", 0);
   //      form.append("amount", amount);
   //      form.append("type", type);
   //      var settings = {
   //        "url": "<?=base_url('api/user/make_upi') ?>",
   //        "method": "POST",
   //        "processData": false,
   //        "mimeType": "multipart/form-data",
   //        "headers": {
   //              "token": sessionStorage.getItem("token")
   //            },
   //        "contentType": false,
   //        // "dataType":"json",
   //        "data": form
   //      };
   //      $.ajax(settings).done(function (response) {
   //      //   console.log(response);

   //      delete_firbase();
   //      $('#loader').hide();
   //      $(click_btn).attr('disabled', false);
   //          // $(".ajax-loader").removeClass("show");
   //        $(".preload").hide(); 
   //      });
   //  }
















</script>














</body>
</html>