<?php
$url = current_url();
// print_r($full_detail->id);


$this->load->view('app/include/header'); 

?>

<style>
    .card-secton {
        position: relative;
        margin-top: -75px;
    }
    .input-field .icon-clear {
        display: none;
        position: absolute;
        top: 14px;
        font-size: 18px;
        right: 14px;
        color: #c5c5c5;
    }
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
    <div class="app-header st1">
        <div class="tf-container">
            <div class="tf-topbar d-flex justify-content-center align-items-center">
               <a href="#" class="back-btn"><i class="icon-left white_color"></i></a> 
                <h3 class="white_color">Recharge Wallet</h3>
            </div>
        </div>
    </div>
    <div class="card-secton topup-content">
        <div class="tf-container">
            <div class="tf-balance-box">
                <div class="d-flex justify-content-between align-items-center">
                    <p>Your Balance:</p>
                    <h3 class="wallet">₹ <?=number_format($full_detail->wallet,2) ?></h3>
                </div>
                <div class="tf-spacing-16"></div>
                <div class="tf-form">
                    <div class="group-input input-field input-money">
                        <label for="">Amount Of Money</label>
                        <input type="text" value="10" required class="search-field value_input st1 amount-val" type="text">
                        <span class="icon-clear"></span>
                    </div>
                </div>
               
            </div>           
        </div>     
    </div>
   
    <div class="amount-money mt-0">
        <div class="tf-container">
            <h3>Amount Money</h3>
            <ul class="money list-money">
                <li><a class="tag-money" href="#!">50</a> </li>
                <li><a class="tag-money" href="#!">100</a> </li>
                <li><a class="tag-money" href="#!">200</a> </li>
                <li><a class="tag-money" href="#!">500</a> </li>
                <li><a class="tag-money" href="#!">1000</a> </li>
                <li><a class="tag-money" href="#!">2000</a> </li>
             </ul>
        </div>
    </div>

    <div class="tf-container mt-5">
        <a href="#!"  class="tf-btn accent large submit-btn">Continue</a>
    </div>
   
  
   

<?php $this->load->view('app/include/bottom-menus'); ?>
<?php $this->load->view('app/include/sidebar'); ?>
<?php $this->load->view('app/include/notification'); ?>
<?php $this->load->view('app/include/footer'); ?>


<script>
    const user_id = "<?=$full_detail->id ?>";

    $(document).on("click", ".submit-btn",(function(e) {
      add_money();
    }));

    function add_money()
    {
        var amount = $(".amount-val").val();

        var form = new FormData();
        form.append("user_id", user_id);
        form.append("amount", amount);

        var settings = {
          "url": "<?=base_url() ?>api/Distributor/add_money",
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
          if(response.status=200)
          {
            $(".wallet").html(response.data.wallet_amount)
              toaster(response.message, 'success');
          }
        });
    }
</script>


