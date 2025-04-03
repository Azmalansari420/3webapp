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
    .card-secton {
        position: relative;
        margin-top: -75px;
    }
    a.recharge-btn {
        background: #5f94bf;
        color: white;
        padding: 9px 25px;
        font-size: 17px;
        border-radius: 10px;
    }
    .card-secton {
        position: relative;
        margin-top: -75px;
        padding-bottom: 80px;
    }
</style>
    <!-- /preload -->
    

    <div class="app-header st1">
        <div class="tf-container">
            <div class="tf-topbar d-flex justify-content-center align-items-center">
               <a href="#" class="back-btn"><i class="icon-left white_color"></i></a> 
                <h3 class="white_color">Wallet</h3>
            </div>
        </div>
    </div>

    <div class="card-secton transfer-section">
        <div class="tf-container">

            <div class="tf-balance-box transfer-amount">
                <div class="top">
                    <i class="icon-group-dollar"></i>
                    <h1>₹ <?=number_format($full_detail->wallet,2) ?></h1>
                </div>  

            </div>    
            <div class="mt-5 text-center">
                <a href="wallet-recharge.php" class="recharge-btn">Click to Recharge Wallet</a>           
            </div>


            <div class="trading-month mt-5">
                <h4 class="fw_5 mb-3">History</h4>
                <div class="group-trading-history mb-5 load-more"></div>

                <button class="btn btn-primary load-more-btn ">Load More</button>
            </div>

        </div>
    </div>




<?php $this->load->view('app/include/bottom-menus'); ?>
<?php $this->load->view('app/include/sidebar'); ?>
<?php $this->load->view('app/include/notification'); ?>
<?php $this->load->view('app/include/footer'); ?>


<script>
    var page = 0;
    function load_more()
    {
        var click_btn = '.load-more-btn';

        $(click_btn).text('Wait..');
        $(click_btn).attr('disabled',true);

        var form = new FormData();
        form.append("user_id", <?=$full_detail->id ?>);
        form.append("page", page); 

        var settings = {
          "url": "<?=base_url() ?>api/Distributor/wallet_history",
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
            if(response.status==200)
            {
              if(page==0)
                    $('.load-more').html(response.data);
                else
                    $(".load-more").append(response.data);
                page++;
                $(click_btn).show();
            }
            else
          {
            $(click_btn).hide();
            toaster(response.message, 'success');
          }
          $(click_btn).text('Load More');
          $(click_btn).attr('disabled',false);


        });
    }

    load_more();

    $(document).on("click", ".load-more-btn",(function(e) {
        click_btn = $(this);
      load_more();
    }));
</script>


