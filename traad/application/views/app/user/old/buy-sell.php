<?php
$instrument_key = $this->input->get('instrument_key');

$matchinstument = $this->db->get_where('instruments',array('instrument_key'=>$instrument_key))->result_object();

$bid_quantity = $matchinstument[0]->quantity;


$ltp_price = $this->input->get('ltp_price');

$callputtype = $this->input->get('type');
$strike_price = $this->input->get('strike_price');
$clickable_instumentkey = $this->input->get('clickable_instumentkey');
$expiry = $this->input->get('expiry');

$tomorrow = date('Y-m-d', strtotime('+1 day'));

include('include/allcss.php'); ?>

<style>
    .form-control {
        padding-left: 15px !important;
    }
    .form-control:focus {
        color: black;
    }
    label.form-label {
        color: white;
        margin-top: 12px;
    }
</style>

  <!-- loader start-->
  <?php include('include/loader.php'); ?>

  <?php include('include/sidebar.php'); ?>
  <!-- loader end -->

  <!-- header start -->
  <header class="section-t-space">
    <div class="custom-container">
      <div class="header-panel">
        <button class="sidebar-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft">
          <i class="ri-menu-line"></i>
        </button>
        <h3 class="middle-title text-white"><?=$instrument_key ?></h3>
        <a href="notification.php">
          <i class="ri-notification-2-line"></i>
        </a>
      </div>
    </div>
  </header>






  <section class="mt-4" >
    <div class="custom-container">
        <form class="create-form" action="order-placed" method="post">

            <input type="hidden" value="<?=$instrument_key ?>" id="instrument_key">
            <input type="hidden" value="<?=$strike_price ?>" id="strike_price">
            <input type="hidden" value="<?=$expiry ?>" id="expiry">
                    
            <div class="row">
                <div class="col-6">
                    <label type="button" class="btn btn-success w-100">Buy &nbsp;&nbsp;<input type="radio" value="1" name="buysell" checked id="type"></label>
                </div>
                <div class="col-6">
                    <label type="button" class="btn btn-danger w-100">Sell &nbsp;&nbsp;<input type="radio" value="2" name="buysell" id="type"/></label>
                </div>
                <div class="col-6">
                    <div class="form-group mb-3">
                      <label  class="form-label">Quantity</label>
                      <div class="form-input">

                            <div class="input-group mb-3 input-group-sm">
                                 <div class="input-group-prepend">
                                    <button type="button" class="devide input-group-text" data-type="1">-</button>
                                </div>
                                <input type="number" class="form-control" id="quantity" readonly value="<?php if(!empty($bid_quantity)) echo $bid_quantity; ?>" />
                                <div class="input-group-prepend">
                                    <button type="button" class="plus input-group-text" data-type="2">+</button>
                                </div>
                            </div>

                      </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group mb-3">
                      <label  class="form-label">Entry Price/Limit Order</label>
                      <div class="form-input">
                        <input type="number" class="form-control" value="0" id="price_optional" />
                      </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group mb-3">
                      <label  class="form-label">Target Price (Optional)</label>
                      <div class="form-input">
                        <input type="number" class="form-control"  id="target_price" />
                      </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group mb-3">
                      <label  class="form-label">Stoploss (Optional)</label>
                      <div class="form-input">
                        <input type="number" class="form-control"  id="stoploss_price" />
                      </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group mb-3">
                      <label  class="form-label">Time Frame</label>
                      <div class="form-input">
                        <select class="form-select" id="time_frame">
                            <option value="1" selected>Auto Cut-Off Today(3:20 PM)</option>
                            <option value="2">Tommorrow [<?=$tomorrow ?>]</option>
                            <option value="3">Expiry [Trade Close at:- <?=$expiry ?>]</option>
                        </select>
                      </div>
                    </div>
                </div>
                <div class="submit-btn mb-0">
                  <button type="button" class="btn theme-btn w-100 buy-sell-btn">Submit</button>
                </div>
            </div>

        </form>
    </div>
  </section>



 

  <!-- panel-space start -->
  <section class="panel-space"></section>
  <!-- panel-space end -->

  <!-- bottom navbar start -->
 <?php include('include/bootom-menu.php'); ?>
  <!-- bottom navbar end -->

  <!-- bootstrap js -->
 <?php include('include/allscipt.php'); ?>

 <script>


    // $(document).ready(function () {
    //     $("#quantity").on("input", function () {
    //         var initialValue = parseInt($(this).attr("data-initial")); // Default multiplier 5
    //         var enteredValue = parseInt($(this).val());

    //         if (enteredValue % initialValue !== 0) {
    //             $(this).val(Math.floor(enteredValue / initialValue) * initialValue); 
    //             toaster("Quantity must be a multiple of " + initialValue, 'error');
    //             // alert();
    //         }
    //     });
    // });





    $(document).on("click", ".buy-sell-btn", function (e) {
    buysell();
});

function buysell() {
    var instrument_key = $("#instrument_key").val();
    var strike_price = $("#strike_price").val();

    var target_price = $("#target_price").val();
    var stoploss_price = $("#stoploss_price").val();

    var type = $("input[name='buysell']:checked").val();;
    var quantity = $("#quantity").val();
    var price_optional = $("#price_optional").val();
    var time_frame = $("#time_frame").val();
    var callputtype = "<?=$callputtype ?>";
    var clickable_instumentkey = "<?=$clickable_instumentkey ?>";
    var expiry = "<?=$expiry ?>";
    var ltp_price = "<?=$ltp_price ?>";

    if (quantity == "") 
    {
        toaster("Enter Your Quantity", 'error');
        return false;
    }
   

    var form = new FormData();
    form.append("instrument_key", instrument_key);
    form.append("strike_price", strike_price);
    form.append("type", type);
    form.append("quantity", quantity);
    form.append("price_optional", price_optional);
    form.append("time_frame", time_frame);
    form.append("callputtype", callputtype);
    form.append("clickable_instumentkey", clickable_instumentkey);
    form.append("expiry", expiry);
    form.append("ltp_price", ltp_price);
    form.append("target_price", target_price);
    form.append("stoploss_price", stoploss_price);

    var settings = {
        "url": "<?=base_url()?>api/wallet/buy_sell",
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
        console.log(response);
        if (response.status == 200) 
        {
            toaster(response.message, 'success');
            setTimeout(() => {
                    window.location.href = response.url;
                }, 2000);

            // $('#subject').val("");
            // $('#message').val("");
            
        } else {
            toaster(response.message, 'error');
        }
    });
}

$(document).on("click", ".plus, .devide",(function(e) {
    var bid_quantity = parseInt("<?=$bid_quantity ?>");
    var type = $(this).data("type");
    var quantity = parseInt($("#quantity").val()) || 0;

    
        if (type == '2') {
            if(bid_quantity<=quantity)
                $("#quantity").val(quantity * 2);
        } else if (type == '1') {
            if(bid_quantity<quantity)
                $("#quantity").val(quantity / 2);
            else
                $("#quantity").val(bid_quantity);
        }
    

}));



 </script>




